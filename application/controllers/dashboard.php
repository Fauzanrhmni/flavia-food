<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
  {
    parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
  }

	public function index()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';
		$data['barang'] = $this->model_brg->tampil_data()->result();
		// $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function search()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Dashboard';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$keyword = $this->input->post('keyword');
		$data['barang'] = $this->model_brg->get_keyword($keyword);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function addkeranjang($id)
	{
		$barang = $this->model_brg->find($id);
		
		$data = array(
			'id' => $barang->id,
			'qty' => 1,
			'price' => $barang->harga,
			'name' => $barang->nama_brg,
			'options' => array('img' => $barang->gambar)
		);

		$this->cart->insert($data);
		redirect('dashboard');
	}
	
	public function detail_keranjang()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Keranjang Belanja';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/keranjang', $data);
		$this->load->view('template/footer');
	}

	public function detail_transaksi()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Transaksi';
    $data['invoice'] = $this->model_invoice->tampil_data();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/detail_transaksi', $data);
		$this->load->view('template/footer');
	}

	public function detail_pesanan($id_invoice)
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Pesanan';
    // $data['invoice'] = $this->model_invoice->tampil_data();
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/detail_pesanan', $data);
		$this->load->view('template/footer');
	}
	
	public function delete_cart()
	{
		$this->cart->destroy();
		redirect('dashboard/detail_keranjang');
	}

	public function delete_item($rowid)
	{
		$data = array(
			'rowid' => $rowid,
			'qty' => 0
		);
		$this->cart->update($data);
		redirect('dashboard/detail_keranjang');
	}

	public function checkout()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Order';
		$data['biaya'] = 3000;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/pembayaran', $data);
		$this->load->view('template/footer');
	}

	public function order_process()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Transaction Status';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$is_processed = $this->model_invoice->index();
		if($is_processed) {
			$this->cart->destroy();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/ordered', $data);
			$this->load->view('template/footer');
		} else {
			echo '<div class="validation-failed">Masukkan Input Alamat Terlebih Dahulu!!</div>';
		}
	}

	public function detail_product($id)
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'Detail Product';
		$data['biaya'] = 3000;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['barang'] = $this->model_brg->detail_brg($id);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/detail_product', $data);
		$this->load->view('template/footer');
	}

	public function myprofile()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/myprofile', $data);
			$this->load->view('template/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '2048';
				$config['upload_path'] 	 = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="activation-success" style="margin-bottom: 0;">Your Profile has been updated!</div>');
			if ($this->session->userdata('email')) {
				$role_id = $this->session->userdata('role_id');
				if ($role_id == 1) {
					redirect('admin/myprofile');
				} elseif ($role_id == 2) {
					redirect('dashboard/myprofile');
				}
			}
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Flavia Food';
		$data['title2'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/myprofile', $data);
			$this->load->view('template/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="activation-failed">Wrong current password!</div>');
        redirect('dashboard/changepassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="activation-failed">New password cannot be the same as current password!</div>');
          redirect('dashboard/changepassword');
        } else {
          // password sudah ok
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');
          
          $this->session->set_flashdata('message', '<div class="activation-success">Password changed!</div>');
          redirect('dashboard/changepassword');
        }
      }
    }
	}

}
