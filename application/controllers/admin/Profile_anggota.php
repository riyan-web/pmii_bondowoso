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
}
