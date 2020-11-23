<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function index()
    {
        $data['title'] = 'Profile ';
        $data['sub_judul'] 			= "profile";
        $data['sub2_judul'] 			= "Profile Cabang";
		$data['deskripsi'] 		= "Profile";
		$data['pagae']		= "profile_cabang";
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('cabang/profile_cabang');
        $this->load->view('template/backend/footer', $data);
    }
}
