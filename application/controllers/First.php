<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First extends CI_Controller
{
  public function index()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
		$data['barang'] = $this->model_brg->tampil_data()->result();
		
		$this->load->view('first/first_page', $data);
	}

  public function start()
  {
    $data['title'] = 'Login Page';
    $this->load->view('first/first_page_start', $data);
  }

  public function detail_product($id)
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Product';
		$data['biaya'] = 3000;

		$data['barang'] = $this->model_brg->detail_brg($id);

		$this->load->view('first/detailproduct', $data);

	}
}