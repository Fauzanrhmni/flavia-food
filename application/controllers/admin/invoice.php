<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller 
{
	public function __construct()
  {
    parent::__construct();
		is_logged_in();
  }

  public function index(){
		$data['title'] = 'Invoices';
    $data['admin'] = 'Admin';
    $data['invoice'] = $this->model_invoice->tampil_data();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('template_admin/footer');
  }

	public function detail_invoice($id_invoice)
	{
		$data['title'] = 'Invoices';
    $data['admin'] = 'Admin';
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('template_admin/footer');
	}

	public function deleteSubMenu($id) {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', '<div class="activation-success">Deleted Sub Menu!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="activation-failed">Failed Delete Submenu!</div>');
    } 
    redirect('menu/submenu');
  }

	public function deleteinvoice($id)
  {
    $where = array('id' => $id);
    $this->model_invoice->deleted($where, 'tb_invoice');
    $this->session->set_flashdata('message', '<div class="activation-success">Deleted Invoice!</div>');
    redirect('admin/invoice');
  }
}

