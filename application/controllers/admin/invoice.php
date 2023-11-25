<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
  public function index(){
		$data['title'] = 'Invoice Pesanan';
    $data['admin'] = 'Admin';
    $data['invoice'] = $this->model_invoice->tampil_data();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('template_admin/footer');
  }

	public function detail_invoice($id_invoice)
	{
		$data['title'] = 'Invoice Pesanan';
    $data['admin'] = 'Admin';
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('template_admin/footer');
	}
}

