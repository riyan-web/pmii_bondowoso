<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_kerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function index()
    {
        $data['title'] = 'Program Kerja ';
        $data['sub_judul'] 			= "program kerja";
        $data['sub2_judul'] 			= "Data Program kerja";
		$data['deskripsi'] 		= "Program Kerja";
		$data['pagae']		= "program_kerja";
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_program_kerja');
        $this->load->view('template/backend/footer', $data);
    }
}
