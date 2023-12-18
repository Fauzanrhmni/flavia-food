<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_invoice extends CI_Model {
  public function index()
  {
    date_default_timezone_set('Asia/Jakarta');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $notes = $this->input->post('notes');
    $email = $this->input->post('email');
    // $contact = $this->input->post('contact');
    // $pembayaran = $this->input->post('pembayaran');

    $invoice = array(
      'nama' => $nama,
      'alamat' => $alamat,
      'notes' => $notes,
      'email' => $email,
      'tgl_pesan' => date('Y-m-d H:i:s'),
      'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')))
    );
    $this->db->insert('tb_invoice', $invoice);
    $id_invoice = $this->db->insert_id();

    foreach ($this->cart->contents() as $item){
      $data = array(
        'id_invoice' => $id_invoice,
        'id_brg' => $item['id'],
        'nama_brg' => $item['name'],
        'jumlah' => $item['qty'],
        'harga' => $item['price'],
      );

      $this->db->insert('tb_pesanan', $data);
    }
    return TRUE;
  }

  public function jumlah_invoice(){
		return $this->db->get('tb_invoice')->num_rows();
	}

  public function tampil_data()
  {
    $result = $this->db->get('tb_invoice');
    if($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }

  public function ambil_id_invoice($id_invoice)
  {
    $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
    if($result->num_rows() > 0){
      return $result->row();
    } else {
      return false;
    }
  }

  // public function ambil_id_invoice()
  // {
  //   $this->db->select('tb_pesanan.*, tb_invoice.nama, tb_invoice.tgl_pesan, tb_invoice.batas_bayar');
  //   $this->db->from('tb_pesanan');
  //   $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
  //   return $this->db->get()->result();
  // }
  
  public function ambil_id_pesanan($id_invoice)
  {
    $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
    if($result->num_rows() > 0){
      return $result->result();
    } else {
      return false;
    }
  }

  public function deleted($id_invoice)
  {
    // Hapus data dari tabel tb_pesanan
    $this->db->where('id_invoice', $id_invoice);
    $this->db->delete('tb_pesanan');
    
    // Hapus data dari tabel tb_invoice
    $this->db->where('id', $id_invoice);
    $this->db->delete('tb_invoice');
  }

  public function get_all_pesanan()
  {
    $this->db->select('tb_pesanan.*, tb_invoice.nama AS nama_pemesan, tb_invoice.alamat');
    $this->db->from('tb_pesanan');
    $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
    return $this->db->get()->result();
  }

  public function update_status_pesanan($id_invoice, $new_status)
  {
    $data = array('status' => $new_status);
    $this->db->where('id', $id_invoice);
    $this->db->update('tb_invoice', $data);
  }

  public function get_all_pesanan_user($email)
  {
    $this->db->select('tb_pesanan.*, tb_invoice.email');
    $this->db->from('tb_pesanan');
    $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
    $this->db->where('tb_invoice.email', $email);

    return $this->db->get()->result();
  }

  public function hapus_pesanan($id_pesanan) {
    // Hapus pesanan dari tabel tb_pesanan berdasarkan ID
    $this->db->where('id', $id_pesanan);
    $this->db->delete('tb_pesanan');
    // Pastikan fungsi ini menghapus pesanan dengan benar berdasarkan ID yang diberikan
  }
}
