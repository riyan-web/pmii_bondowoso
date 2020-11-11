<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_rayon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function index()
    {
        $data['title'] = 'Profile Rayon';
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('rayon/profile_rayon');
        $this->load->view('template/backend/footer', $data);
    }
}
