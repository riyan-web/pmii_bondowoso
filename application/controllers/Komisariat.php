<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komisariat  extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');

        //load the department_model

        $this->load->model('m_artikel');
        $this->load->model('m_berita');
        $this->load->model('m_struktur');
    }

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
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => 5])->row_array();
        $id_kom = 5;
        //konfigurasi pagination
        $config['base_url'] = site_url('komisariat/wahid_hasyim'); //site url
        $count = $this->m_artikel->get_count_by_komisariat($id_kom);
        $config['total_rows'] = $count['jumlah_artikel']; //total row
        $config['per_page'] = 2;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada model m_artikel . 
        $data['artikel'] = $this->m_artikel->get_artikel_list_by_komisariat($config["per_page"], $data['page'], $id_kom);

        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Profile Komisariat Politeknik Jember - Kampus Bondowoso';
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


