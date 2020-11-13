<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profile PMII Bondowoso';
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/index');
        $this->load->view('template/frontend/footer', $data);
    }

    public function artikel()
    {
        $data['title'] = 'Artikel';
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/artikel');
        $this->load->view('template/frontend/footer', $data);
    }

    public function berita()
    {
        $data['title'] = 'Berita';
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/artikel');
        $this->load->view('template/frontend/footer', $data);
    }
}
