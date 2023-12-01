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
    redirect('admin/data_barang/');
  }

  public function edit($id) 
  {
    $data['title'] = 'Edit Barang';
    $data['admin'] = 'Admin';
    $where = array('id' => $id);
    $data['barang'] = $this->model_brg->edit_barang($where, 'tb_barang')->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    

    $this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('template_admin/footer');
  }

  public function update()
  {
    $id = $this->input->post('id');
    $nama_brg = $this->input->post('nama_brg');
    $keterangan = $this->input->post('keterangan');
    $kategori = $this->input->post('kategori');
    $harga = $this->input->post('harga');
    $stok = $this->input->post('stok');

    $data = array(
      'nama_brg' => $nama_brg,
      'keterangan' => $keterangan,
      'kategori' => $kategori,
      'harga' => $harga,
      'stok' => $stok
    );

    $where = array(
      'id' => $id
    );

    $this->model_brg->update_data($where, $data, 'tb_barang');
    redirect('admin/data_barang');
  }
  
  public function delete($id)
  {
    $where = array('id' => $id);
    $this->model_brg->deleted($where, 'tb_barang');
    redirect('admin/data_barang');
  }
}