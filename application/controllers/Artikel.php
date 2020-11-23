<?php 

class Artikel extends CI_Controller{
    public function index()
    {
        $data['konten'] = $this->artikel_model->tampil_data()->result();
        $this->load->view('template/backend/header');
        $this->load->view('template/backend/sidebar');
        $this->load->view('komisariat/artikel_komisariat', $data);
        $this->load->view('template/backend/footer');
    }
}
