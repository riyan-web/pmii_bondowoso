<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_password extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_akses();
	}

	public function index()
	{
		$data['title'] = 'Ganti Password';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', [
			'required' 	 => 'Silahkan masukkan Password anda',
		]);
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru2]', [
			'min_length' => 'Password harus memiliki minimal 8 karakter',
			'required' 	 => 'Silahkan masukkan Password baru anda',
			'matches'	 => 'Password anda tidak sesuai dengan konfirmasi password'
		]);
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password_baru1]', [
			'min_length' => 'Password harus memiliki minimal 8 karakter',
			'required' 	 => 'Silahkan masukkan konfirmasi password baru anda',
			'matches'	 => 'Konfirmasi password anda tidak sesuai dengan password baru'
		]);



		if ($this->form_validation->run() == false) {
			$this->load->view('template/backend/header', $data);
			$this->load->view('template/backend/sidebar', $data);
			$this->load->view('admin/V_gantipassword', $data);
			$this->load->view('template/backend/footer', $data);
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if (!password_verify($password_lama, $data['user']['password'])) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">Kesalahan Memasukkan Password Anda</div>'
				);
				redirect('admin/Ganti_password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama</div>'
					);
					redirect('admin/Ganti_password');
				} else {
					//Jikka Password sudah mantap
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('tb_user');

					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-success" role="alert">Password Anda Telah Diubah!</div>'
					);
					redirect('admin/Ganti_password');
				}
			}
		}
	}
}
