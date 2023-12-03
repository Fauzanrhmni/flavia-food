<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
		is_logged_in();
  }

  public function index() 
  {
    $data['title'] = 'Menu';
    $data['admin'] = 'Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('template_admin/footer');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="activation-success">New menu added!</div>');
      redirect('menu');
    }
  }

  public function deleteMenu($id) {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->db->where('id', $id);
    $this->db->delete('user_menu');

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', '<div class="activation-success">Deleted Sub Menu!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="activation-failed">Failed Delete Submenu!</div>');
    } 
    redirect('menu');
  }

  public function editMenu($id) {
    $data['title'] = 'Menu';
    $data['admin'] = 'Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Menu_model', 'menu');

    // $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['menu'] = $this->menu->menuByid($id);

    $this->form_validation->set_rules('menu', 'Menu', 'required');


    if($this->form_validation->run() == false){
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('menu/editmenu', $data);
      $this->load->view('template_admin/footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'menu' => $this->input->post('menu')
      ];

      $this->menu->updateMenu($id, $data);
      $this->session->set_flashdata('message', '<div class="activation-success">Successfully edited the menu!</div>');
      redirect('menu');
    }
  }

  public function subMenu() {
    $data['title'] = 'Sub Menu';
    $data['admin'] = 'Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('template_admin/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="activation-success">New sub menu added!</div>');
      redirect('menu/submenu');
    }
  }

  public function deleteSubMenu($id) {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message', '<div class="activation-success">Deleted Sub Menu!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="activation-failed">Failed Delete Submenu!</div>');
    } 
    redirect('menu/submenu');
  }

  public function editSubmenu($id) {
    $data['title'] = 'Edit Submenu';
    $data['admin'] = 'Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Menu_model', 'submenu');

    $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['submenu'] = $this->submenu->getByid($id);

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar', $data);
      $this->load->view('template_admin/topbar', $data);
      $this->load->view('menu/editsubmenu', $data);
      $this->load->view('template_admin/footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->submenu->updateSubmenu($id, $data);
      $this->session->set_flashdata('message', '<div class="activation-success">Successfully edited the submenu!</div>');
      redirect('menu/submenu');
    }
  }
}