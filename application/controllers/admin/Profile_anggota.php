<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile Kader PMII';
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('anggota/profile_anggota', $data);
        $this->load->view('template/backend/footer', $data);
    }
    public function ubah_alamat()
    {
        $alamat = $this->input->post('alamat');
        $id_kader = $this->input->post('kader_id');

        $this->db->set('alamat', $alamat);
        $this->db->where('id', $id_kader);
        $this->db->update('tb_kader');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
        );
        redirect('admin/profile_anggota');
    }
}
