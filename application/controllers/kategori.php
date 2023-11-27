<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

  public function junkfood() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
    $data['junkfood'] = $this->model_kategori->junkfood_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('junkfood', $data);
		$this->load->view('template/footer');
  }

  public function addkeranjangjunkfood($id)
	{
		$barang = $this->model_brg->find($id);
		
		$data = array(
				'id' => $barang->id,
				'qty' => 1,
				'price' => $barang->harga,
				'name' => $barang->nama_brg
			);

		$this->cart->insert($data);
		redirect('kategori/junkfood');
	}
  
  public function pizza() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
    $data['pizza'] = $this->model_kategori->pizza_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('pizza', $data);
		$this->load->view('template/footer');
  }

  public function addkeranjangpizza($id)
	{
		$barang = $this->model_brg->find($id);
		
		$data = array(
				'id' => $barang->id,
				'qty' => 1,
				'price' => $barang->harga,
				'name' => $barang->nama_brg
			);

		$this->cart->insert($data);
		redirect('kategori/pizza');
	}
  
  public function mie() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
    $data['mie'] = $this->model_kategori->mie_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('mie', $data);
		$this->load->view('template/footer');
  }

  public function addkeranjangmie($id)
  {
    $barang = $this->model_brg->find($id);
    
    $data = array(
        'id' => $barang->id,
        'qty' => 1,
        'price' => $barang->harga,
        'name' => $barang->nama_brg
      );

    $this->cart->insert($data);
    redirect('kategori/mie');
  }

  public function drink() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
    $data['drink'] = $this->model_kategori->drink_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('drink', $data);
		$this->load->view('template/footer');
  }

  public function addkeranjangdrink($id)
  {
    $barang = $this->model_brg->find($id);
    
    $data = array(
        'id' => $barang->id,
        'qty' => 1,
        'price' => $barang->harga,
        'name' => $barang->nama_brg
      );

    $this->cart->insert($data);
    redirect('kategori/drink');
  }

  public function icecream() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
    $data['icecream'] = $this->model_kategori->icecream_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('icecream', $data);
		$this->load->view('template/footer');
  }

  public function addkeranjangicecream($id)
  {
    $barang = $this->model_brg->find($id);
    
    $data = array(
        'id' => $barang->id,
        'qty' => 1,
        'price' => $barang->harga,
        'name' => $barang->nama_brg
      );

    $this->cart->insert($data);
    redirect('kategori/icecream');
  }
}