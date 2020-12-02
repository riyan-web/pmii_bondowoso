<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
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
        $data['title'] = 'Artikel ';
        $data['sub_judul']             = "artikel";
        $data['sub2_judul']             = "Data Artikel";
        $data['deskripsi']         = "Artikel";
        $data['pagae']        = "artikel";
        $data['konten'] = $this->artikel_model->tampil_data();
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_artikel', $data);
        $this->load->view('template/backend/footer', $data);
    }
}
