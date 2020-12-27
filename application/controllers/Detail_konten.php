<?php

class Detail_konten extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //load the department_model
        $this->load->model('m_artikel');
        $this->load->model('m_berita');
    }

    public function artikel($id_konten)
    {
        $data['artikel'] = $this->m_artikel->detail_artikel($id_konten);
        $data['title'] = "Baca Artikel";
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/detail_artikel', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function berita($id_konten)
    {
        $data['berita'] = $this->m_berita->detail_berita($id_konten);
        $data['title'] = "Baca Berita";
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/detail_berita', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
