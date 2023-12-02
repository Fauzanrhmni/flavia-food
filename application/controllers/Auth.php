<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      $role_id = $this->session->userdata('role_id');
      if ($role_id == 1) {
        redirect('admin/dashboard_admin');
      } elseif ($role_id == 2) {
        redirect('dashboard');
      }
    }

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login Page';

      $this->load->view('template_auth/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('template_auth/auth_footer');
    } else {
      // validasinya success
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    // jika usernya ada
    if ($user) {
      // usernya ada
      if($user['is_active'] == 1){
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('admin/dashboard_admin');
          } else {
            redirect('dashboard');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="activation-failed">Wrong password!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="activation-failed">This email has not been activated!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="activation-failed">Email is not registered!</div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    if ($this->session->userdata('email')) {
      $role_id = $this->session->userdata('role_id');
      if ($role_id == 1) {
        redirect('admin/dashboard_admin');
      } elseif ($role_id == 2) {
        redirect('dashboard');
      }
    } else {
      redirect('auth/blocked');
    }

    $this->form_validation->set_rules('name', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    
    if ($this->form_validation->run() == false) {
      $data['title'] = "Flavia User Registration";
      $this->load->view('template_auth/auth_sign_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('template_auth/auth_sign_footer');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="activation-success" >Congratulation your account has been created. Please Login</div>');
      redirect('auth');
    }
  }

  public function logout() 
  {
    $this->session->unset_userdata('email');  
    $this->session->unset_userdata('role_id');  

    $this->session->set_flashdata('message', '<div class="activation-success">You have been logged out!</div>');
    redirect('auth');
  }

  public function blocked()
  {
    $data['title'] = 'Access Blocked';

    $this->load->view('auth/blocked', $data);
  }
}