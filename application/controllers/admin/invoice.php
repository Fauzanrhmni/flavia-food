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
    $data['invoice'] = $this->model_invoice->tampil_data_admin();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['pesanan'] = $this->model_invoice->get_all_pesanan();

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
		// $data['pesanan'] = $this->model_invoice->get_all_pesanan();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('template_admin/footer');
	}

	public function deleteinvoice($id_invoice)
  {
    // $where = array('id' => $id);
    // $this->model_invoice->deleted($where, 'tb_invoice');
    $this->model_invoice->deleted($id_invoice);
    $this->session->set_flashdata('message', '<div class="activation-success">Deleted Invoice!</div>');
    redirect('admin/invoice');
  }

	public function pengiriman(){
		$data['title'] = 'Pengiriman';
    $data['admin'] = 'Admin';
    $data['invoice'] = $this->model_invoice->tampil_data();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pesanan'] = $this->model_invoice->get_all_pesanan();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/pengiriman', $data);
		$this->load->view('template_admin/footer');
  }

	public function update_status($id_invoice, $status) {
		// Lakukan validasi admin di sini
		// Pastikan hanya admin yang berhak untuk melakukan update status

		// Lakukan update status pesanan menggunakan model_invoice
		$this->model_invoice->update_status_pesanan($id_invoice, $status);

		// Redirect kembali ke halaman status pesanan
		redirect('admin/invoice');
	}

	public function hapus_pesanan($id_pesanan) {
			// Lakukan validasi admin di sini
			// Pastikan hanya admin yang berhak untuk menghapus pesanan

			// Panggil model untuk melakukan penghapusan pesanan
			$this->model_invoice->hapus_pesanan($id_pesanan);

			// Redirect kembali ke halaman status pesanan
			redirect('admin/invoice');
	}
}

