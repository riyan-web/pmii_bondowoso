<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_komisariat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function index()
    {
        $data['title'] = 'Profile Komisariat';
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('komisariat/profile_komisariat');
        $this->load->view('template/backend/footer', $data);
    }
}
