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
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time()
      ];

      // siapkan token
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];
      
      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('message', '<div class="activation-success" style="text-align: start;">Congratulation your account has been created. Please activate your account</div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => '12220865@bsi.ac.id',
      'smtp_pass' => '2004-01-24',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $this->email->initialize($config);

    $this->email->from('12220865@bsi.ac.id', 'Fauzan Rahmani Ahdan');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Account Verification');
      $this->email->message('Click this link to verify your account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
    } elseif ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Click this link to reset your password : <a href="'. base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }

    if ($this->email->send()) {
      return true;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time() - $user_token['date_created'] < (60*60*24)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', '<div class="activation-success">'. $email .' has been activated!</div>');
          redirect('auth');
        } else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="activation-failed">Account activation failed! Token expired!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="activation-failed">Account activation failed! Token invalid!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="activation-failed">Account activation failed! Wrong email!</div>');
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

  public function forgotpassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Forgot Password';
      $this->load->view('template_auth/auth_header', $data);
      $this->load->view('auth/forgot-password');
      $this->load->view('template_auth/auth_footer');
    } else {
      $email = $this->input->post('email');
      $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('message', '<div class="activation-success">Please check your email to reset your password!</div>');
        redirect('auth/forgotpassword');
      } else {
        $this->session->set_flashdata('message', '<div class="activation-failed">Email is not registered!</div>');
        redirect('auth/forgotpassword');
      }
    }
  }

  public function resetpassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
        
      } else {
        $this->session->set_flashdata('message', '<div class="activation-failed">Reset password failed! Wrong token!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="activation-failed">Reset password failed! Wrong email!</div>');
      redirect('auth');
    }
  }
  
  public function changePassword()
  {
    
    if(!$this->session->userdata('reset_email')){
      redirect('auth');
    }
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[3]|matches[password1]');

    if($this->form_validation->run() == false) {
      $data['title'] = 'Change Password';
      $this->load->view('template_auth/auth_header', $data);
      $this->load->view('auth/change-password');
      $this->load->view('template_auth/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');

      $this->session->set_flashdata('message', '<div class="activation-success">Password has been changed! Please login!</div>');
      redirect('auth');
    }
  }
}