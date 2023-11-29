<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Login Page';
    $this->load->view('first/first_page', $data);
  }
}