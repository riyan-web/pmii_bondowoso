<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('m_struktur');
        $this->load->helper('myadmin');
    }
    public function index()
    {
        $id_kom = $this->session->userdata['id_komisariat'];
        $data['title'] = 'Dashboard';
        $data['sub_judul']     = "Komisariat";
        $data['sub2_judul'] = "";
        $data['deskripsi']     = "Dashboard";
        $data['pagae']        = "";
        $data['struktur'] = $this->m_struktur->getStrukturKomisariat($id_kom)->result();
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/backend/footer', $data);
    }
}
