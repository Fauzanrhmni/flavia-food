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
    $data['barang'] = $this->model_brg->jumlah_brg();
    $data['invoice'] = $this->model_invoice->jumlah_invoice();
    $data['menu'] = $this->menu_model->jumlah_menu();
    $data['submenu'] = $this->menu_model->jumlah_submenu();
		
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

  public function editRole($id) {
    $data['title'] = 'Role';
    $data['admin'] = 'Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Menu_model', 'role');

    // $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['role'] = $this->role->roleByid($id);

    $this->form_validation->set_rules('role', 'Role', 'required');


    if($this->form_validation->run() == false){
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('admin/editrole', $data);
      $this->load->view('template_admin/footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'role' => $this->input->post('role')
      ];

      $this->role->updateRole($id, $data);
      $this->session->set_flashdata('message', '<div class="activation-success">Successfully edited the menu!</div>');
      redirect('admin/dashboard_admin/role');
    }
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

  public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['admin'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
    
    if ($this->form_validation->run() == false) {
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('admin/changepassword', $data);
      $this->load->view('template_admin/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="activation-failed">Wrong current password!</div>');
        redirect('admin/dashboard_admin/changepassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="activation-failed">New password cannot be the same as current password!</div>');
          redirect('admin/dashboard_admin/changepassword');
        } else {
          // password sudah ok
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');
          
          $this->session->set_flashdata('message', '<div class="activation-success">Password changed!</div>');
          redirect('admin/dashboard_admin/changepassword');
        }
      }
    }
	}
}
