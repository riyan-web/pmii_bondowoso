<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()

    {

        if ($this->session->userdata('username') and $this->session->userdata('jenis') == 4) {
            redirect('admin/profile_cabang');
        } else if ($this->session->userdata('username') and $this->session->userdata('jenis') == 3) {
            redirect('admin/profile_komisariat');
        } else if ($this->session->userdata('username') and $this->session->userdata('jenis') == 2) {
            redirect('admin/profile_rayon');
        } else if ($this->session->userdata('username') and $this->session->userdata('jenis') == 1) {
            redirect('admin/profile_anggota');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('admin/login', $data);
        } else {
            //validasinya sukses
            $this->_masuk();
        }
    }
    private function _masuk()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        //jika usernya ada
        if ($user) {
            //cek password
            if ($password == $user['password']) {
                $komisariat_id = $user['komisariat_id'];
                $nama_komcab = $this->db->get_where('tb_komisariat', ['id' => $komisariat_id])->row_array();
                $data = [
                    'username' => $user['username'],
                    'jenis' => $user['jenis'],
                    'nama_komcab' => $nama_komcab['nama'],
                    'id_komisariat' => $nama_komcab['id'],
                    'user_id' => $user['id'],
                    'kader_id' => $user['kader_id']
                ];
                $this->session->set_userdata($data);

                if ($user['jenis'] == 1) {
                    redirect('admin/profile_anggota');
                } else if ($user['jenis'] == 2) {
                    redirect('admin/profile_rayon');
                } else if ($user['jenis'] == 3) {
                    redirect('admin/profile_komisariat');
                } else {
                    redirect('admin/profile_cabang');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Password anda salah</div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Akun anda tidak ditemukan!</div>'
            );
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('jenis');
        $this->session->unset_userdata('nama_komcab');
        $this->session->unset_userdata('id_komisariat');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('kader_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Anda telah Logout</div>'
        );
        redirect('login');
    }

    public function blocked()
    {

        $this->load->view('template/not_found');
    }
}
