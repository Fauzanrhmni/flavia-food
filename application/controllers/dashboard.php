<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
		$data['barang'] = $this->model_brg->tampil_data()->result();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('dashboard', $data);
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
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('keranjang', $data);
		$this->load->view('template/footer');
	}
	
	public function delete_cart()
	{
		$this->cart->destroy();
		redirect('dashboard/detail_keranjang');
	}

	public function checkout()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Order';
		$data['biaya'] = 3000;
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('pembayaran', $data);
		$this->load->view('template/footer');
	}

	public function order_process()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Transaction Status';
		

		$is_processed = $this->model_invoice->index();
		if($is_processed) {
			$this->cart->destroy();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('ordered', $data);
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

		$data['barang'] = $this->model_brg->detail_brg($id);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('detail_product', $data);
		$this->load->view('template/footer');
	}
}
