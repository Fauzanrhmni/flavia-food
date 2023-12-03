<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
  public function getSubmenu()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            ";
    return $this->db->query($query)->result_array();
  }

  public function menuByid($id) {
    return $this->db->get_where('user_menu', ['id'=>$id])->row_array();
  }

  public function updateMenu($id, $data) {
    $this->db->where(['id'=>$id]);
    $this->db->update('user_menu', $data);
  }

  public function getByid($id) {
    return $this->db->get_where('user_sub_menu', ['id'=>$id])->row_array();
  }

  public function updateSubmenu($id, $data) {
    $this->db->where(['id'=>$id]);
    $this->db->update('user_sub_menu', $data);
  }

  public function roleByid($id) {
    return $this->db->get_where('user_role', ['id'=>$id])->row_array();
  }

  public function updateRole($id, $data) {
    $this->db->where(['id'=>$id]);
    $this->db->update('user_role', $data);
  }
}