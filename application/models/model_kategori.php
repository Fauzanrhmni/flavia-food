<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {
  public function junkfood_product()
  {
    return $this->db->get_where('tb_barang', array('kategori' => 'junkfood'));
  }

  public function pizza_product()
  {
    return $this->db->get_where('tb_barang', array('kategori' => 'pizza'));
  }

  public function mie_product()
  {
    return $this->db->get_where('tb_barang', array('kategori' => 'mie'));
  }

  public function drink_product()
  {
    return $this->db->get_where('tb_barang', array('kategori' => 'drink'));
  }

  public function icecream_product()
  {
    return $this->db->get_where('tb_barang', array('kategori' => 'icecream'));
  }
}