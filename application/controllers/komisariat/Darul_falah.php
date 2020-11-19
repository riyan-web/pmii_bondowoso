<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Darul_falah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Profile Komisariat Darul Falah - STIS Darul Falah';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 7])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 9])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
