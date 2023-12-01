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
}
