<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unej_bondowoso extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profile Komisariat Universitas Jember - Kampus Bondowoso';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_unej');
        $this->load->view('template/frontend/footer', $data);
    }
}
