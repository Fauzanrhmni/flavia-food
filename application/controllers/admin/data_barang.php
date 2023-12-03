<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
		is_logged_in();
  }

	public function index()
	{
    $data['title'] = 'Data Barang';
    $data['admin'] = 'Admin';
    $data['barang'] = $this->model_brg->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/data_barang', $data);
		$this->load->view('template_admin/footer');
	}

  public function tambah_aksi()
  {
    $nama_brg = $this->input->post('nama_brg');
    $keterangan = $this->input->post('keterangan');
    $kategori = $this->input->post('kategori');
    $harga = $this->input->post('harga');
    $stok = $this->input->post('stok');
    $gambar = $_FILES['gambar']['name'];
    if ($gambar = '') {
      # code...
    } else {
      $config ['upload_path'] = './upload';
      $config ['allowed_types'] = 'jpg|jpeg|png|gif';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        echo "Gambar Gagal diupload!";
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }
    
    $data = array(
      'nama_brg' => $nama_brg,
      'keterangan' => $keterangan,
      'kategori' => $kategori,
      'harga' => $harga,
      'stok' => $stok,
      'gambar' => $gambar
    );

    $this->model_brg->tambah_barang($data, 'tb_barang');
    $this->session->set_flashdata('message', '<div class="activation-success">New items have been added!</div>');
    redirect('admin/data_barang/');
  }


  public function editBarang($id) {
    $data['title'] = 'Role';
    $data['admin'] = 'Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Model_brg', 'barang');

    $data['barang'] = $this->barang->barangByid($id);
    $data['tb_barang'] = $this->db->get('tb_barang')->result_array();

		$this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');


    if($this->form_validation->run() == false){
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('admin/edit_barang', $data);
      $this->load->view('template_admin/footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'nama_brg' => $this->input->post('nama_brg'),
        'keterangan' => $this->input->post('keterangan'),
        'kategori' => $this->input->post('kategori'),
        'harga' => $this->input->post('harga'),
        'stok' => $this->input->post('stok'),
      ];

      $this->barang->updateBarang($id, $data);
      $this->session->set_flashdata('message', '<div class="activation-success">The item has been successfully edited!</div>');
      redirect('admin/data_barang');
    }
  }
  
  public function delete($id)
  {
    $where = array('id' => $id);
    $this->model_brg->deleted($where, 'tb_barang');
    $this->session->set_flashdata('message', '<div class="activation-success">Deleted Item!</div>');
    redirect('admin/data_barang');
  }
}