<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_brg extends CI_Model
{

	public function tampil_data()
	{
		return $this->db->get('tb_barang');
	}

	// public function get_keyword($keyword)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tb_barang');
	// 	$this->db->like('nama_brg', $keyword);
	// 	return $this->db->get()->result();
	// }

	public function jumlah_brg()
	{
		return $this->db->get('tb_barang')->num_rows();
	}

	public function tambah_barang($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_barang($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function barangByid($id)
	{
		return $this->db->get_where('tb_barang', ['id' => $id])->row_array();
	}

	public function updateBarang($id, $data)
	{
		$this->db->where(['id' => $id]);
		$this->db->update('tb_barang', $data);
	}

	public function deleted($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id', $id)
			->limit(1)
			->get('tb_barang');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false; // Mengembalikan false jika data tidak ditemukan
		}
	}

	public function detail_brg($id)
	{
		$result = $this->db->where('id', $id)->get('tb_barang');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->like('nama_brg', $keyword);
		return $this->db->get()->result();
	}
}
