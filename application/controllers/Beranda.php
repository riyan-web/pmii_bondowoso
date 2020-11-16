<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profile PMII Bondowoso';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar');
        $this->load->view('profile_pmii/index');
        $this->load->view('template/frontend/footer');
    }

    public function about()
    {
        $data['title'] = 'Tentang Kami';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/about');
        $this->load->view('template/frontend/footer', $data);
    }

    public function artikel()
    {
        $data['title'] = 'Artikel';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/artikel');
        $this->load->view('template/frontend/footer', $data);
    }

    public function berita()
    {
        $data['title'] = 'Berita';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/berita');
        $this->load->view('template/frontend/footer', $data);
    }

    public function struktur()
    {
        $data['title'] = 'Struktur Pengurus';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/struktur');
        $this->load->view('template/frontend/footer', $data);
    }
}
