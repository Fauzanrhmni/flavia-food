<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller 
{
	public function __construct()
  {
    parent::__construct();
		is_logged_in();
  }

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['admin'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template_admin/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['admin'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('template_admin/footer');
    } else {
      $this->db->insert('user_role', ['role' => $this->input->post('role')]);
      $this->session->set_flashdata('message', '<div class="activation-success">New role added!</div>');
      redirect('admin/dashboard_admin/role');
    }
	}

	public function deleteRole($id) {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->db->where('id', $id);
    $this->db->delete('user_role');

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', '<div class="activation-success">Deleted Role!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="activation-failed">Failed Delete Role!</div>');
    } 
    redirect('admin/dashboard_admin/role');
  }

  public function roleAccess($role_id)
	{
		$data['title'] = 'Role';
		$data['admin'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    $this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar', $data);
    $this->load->view('template_admin/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('template_admin/footer');
	}

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'roleId' => $role_id,
      'menuId' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="activation-success">Access Changed!</div>');
  }
}
