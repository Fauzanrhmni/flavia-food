<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofile extends CI_Controller 
{
	public function __construct()
  {
    parent::__construct();
		is_logged_in();
  }

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['admin'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/myprofile', $data);
		$this->load->view('template_admin/footer');
	}

	public function editprofile()
	{
		$data['title'] = 'Edit Profile';
		$data['admin'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/editprofile', $data);
		$this->load->view('template_admin/footer');
	}
}