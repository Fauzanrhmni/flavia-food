<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller 
{
	public function __construct()
  {
    parent::__construct();
		is_logged_in();
  }

	public function index()
	{
		$data['title'] = 'Role';
		$data['admin'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('template_admin/footer');
	}
}