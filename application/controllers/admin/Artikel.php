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
        $data['title'] = 'Arikel ';
        $data['sub_judul'] 			= "artikel";
        $data['sub2_judul'] 			= "Data Artikel";
		$data['deskripsi'] 		= "Artikel";
		$data['pagae']		= "artikel";
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_artikel');
        $this->load->view('template/backend/footer', $data);
    }
}
