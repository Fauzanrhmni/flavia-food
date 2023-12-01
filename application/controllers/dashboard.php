<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
  {
    parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
  }

	public function index()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
		$data['barang'] = $this->model_brg->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function addkeranjang($id)
	{
		$barang = $this->model_brg->find($id);
		
		$data = array(
			'id' => $barang->id,
			'qty' => 1,
			'price' => $barang->harga,
			'name' => $barang->nama_brg,
			'options' => array('img' => $barang->gambar)
		);

		$this->cart->insert($data);
		redirect('dashboard');
	}
	
	public function detail_keranjang()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Keranjang Belanja';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/keranjang', $data);
		$this->load->view('template/footer');
	}
	
	public function delete_cart()
	{
		$this->cart->destroy();
		redirect('dashboard/detail_keranjang');
	}

	public function delete_item($rowid)
	{
		$data = array(
			'rowid' => $rowid,
			'qty' => 0
		);
		$this->cart->update($data);
		redirect('dashboard/detail_keranjang');
	}

	public function checkout()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Order';
		$data['biaya'] = 3000;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/pembayaran', $data);
		$this->load->view('template/footer');
	}

	public function order_process()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Transaction Status';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$is_processed = $this->model_invoice->index();
		if($is_processed) {
			$this->cart->destroy();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/ordered', $data);
			$this->load->view('template/footer');
		} else {
			echo '<div class="validation-failed">Masukkan Input Alamat Terlebih Dahulu!!</div>';
		}
	}

	public function detail_product($id)
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Product';
		$data['biaya'] = 3000;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['barang'] = $this->model_brg->detail_brg($id);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/detail_product', $data);
		$this->load->view('template/footer');
	}

	public function myprofile()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/myprofile', $data);
		$this->load->view('template/footer');
	}
}
