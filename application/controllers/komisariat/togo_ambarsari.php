<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Togo_ambarsari extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Profile Komisariat Togo Ambarsari - STITA';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 6])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 9])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
