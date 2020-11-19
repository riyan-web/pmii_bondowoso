<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attaqwa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Profile Komisariat Raden Bagus Asra - STAI At-taqwa';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 4])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 7])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
