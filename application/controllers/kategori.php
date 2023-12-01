<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
		is_logged_in();
  }

  public function junkfood() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Junkfood';
    $data['junkfood'] = $this->model_kategori->junkfood_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/junkfood', $data);
		$this->load->view('template/footer');
  }
  
  public function pizza() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Pizza';
    $data['pizza'] = $this->model_kategori->pizza_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/pizza', $data);
		$this->load->view('template/footer');
  }

  public function mie() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Mie';
    $data['mie'] = $this->model_kategori->mie_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/mie', $data);
		$this->load->view('template/footer');
  }

  public function drink() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Drink';
    $data['drink'] = $this->model_kategori->drink_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/drink', $data);
		$this->load->view('template/footer');
  }

  public function icecream() 
  {
    $data['title'] = 'Flavia Food';
		$data['title2'] = 'Ice Cream';
    $data['icecream'] = $this->model_kategori->icecream_product()->result();

    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/icecream', $data);
		$this->load->view('template/footer');
  }
}