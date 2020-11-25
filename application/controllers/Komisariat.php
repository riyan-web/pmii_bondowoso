<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komisariat  extends CI_Controller
{
    public function unej_bondowoso()
    {
        $data['title'] = 'Profile Komisariat Universitas Jember - Kampus Bondowoso';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 2])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 5])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat');
        $this->load->view('template/frontend/footer', $data);
    }
    public function unibo()
    {
        $data['title'] = 'Profile Komisariat Universitas Bondowoso';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 3])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 6])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function attaqwa()
    {
        $data['title'] = 'Profile Komisariat Raden Bagus Asra - STAI At-taqwa';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 4])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 7])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function wahid_hasyim()
    {
        $data['title'] = 'Profile Komisariat Politeknik Jember - Kampus Bondowoso';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 5])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 2])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function togo_ambarsari()
    {
        $data['title'] = 'Profile Komisariat Togo Ambarsari - STITA';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 6])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 9])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function darul_falah()
    {
        $data['title'] = 'Profile Komisariat Darul Falah - STIS Darul Falah';
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 7])->row_array();
        $data['proker'] = $this->db->get_where('tb_proker', ['user_id' => 9])->row_array();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
