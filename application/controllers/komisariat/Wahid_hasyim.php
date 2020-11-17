<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wahid_hasyim extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Profile Komisariat Universitas Jember - Kampus Bondowoso';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 4])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 2])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_polije', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
