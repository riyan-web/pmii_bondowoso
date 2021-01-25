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
        $this->load->model('m_proker');
    }

    public function unej_bondowoso()
    {
        $id_kom = 2;
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Komisariat Universitas Jember - Kampus Bondowoso';

        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat');
        $this->load->view('template/frontend/footer', $data);
    }
    public function unibo()
    {
        $id_kom = 3;
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Komisariat Universitas Bondowoso';

        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function unibo_nurut_taqwa()
    {
        $id_kom = 3;
        $data['komisariat'] = $this->db->get_where('tb_rayon', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Rayon Nurut Taqwa Universitas Bondowoso';
        $data['struktur'] = $this->m_struktur->getStrukturRayon($id_kom)->result();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_rayon', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function attaqwa()
    {
        $id_kom = 4;
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Komisariat Raden Bagus Asra - STAI At-taqwa';

        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function attaqwa_avicenna()
    {
        $id_kom = 4;
        $data['komisariat'] = $this->db->get_where('tb_rayon', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Rayon Avicenna STAI At-Taqwa';
        $data['struktur'] = $this->m_struktur->getStrukturRayon($id_kom)->result();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_rayon', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function attaqwa_averoes()
    {
        $id_kom = 5;
        $data['komisariat'] = $this->db->get_where('tb_rayon', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Rayon Averoes STAI At-Taqwa';
        $data['struktur'] = $this->m_struktur->getStrukturRayon($id_kom)->result();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_rayon', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function wahid_hasyim()
    {
        $id_kom = 5;
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Komisariat Politeknik Jember Kampus II';

        $data['struktur'] = $this->m_struktur->getStrukturKomisariat($id_kom)->result();
        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function togo_ambarsari()
    {
        $id_kom = 6;
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Komisariat Togo Ambarsari - STITA';

        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }
    public function darul_falah()
    {
        $id_kom = 7;
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();

        $data['title'] = 'Profile Komisariat Darul Falah - STIS Darul Falah';

        $this->load->view('template/frontend/header', $data);
        $this->load->view('komisariat/beranda_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function berita()
    {
        $id_kom = $this->input->post('id_komisariat', true);
        //konfigurasi pagination
        $config['base_url'] = site_url('komisariat/berita'); //site url
        $count = $this->m_berita->get_count_komisariat($id_kom);
        $config['total_rows'] = $count['jumlah_berita']; //total row
        $config['per_page'] = 3;  //show record per halaman
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

        //panggil function get_proker_list_komisariat yang ada pada model m_proker . 
        $data['berita'] = $this->m_berita->get_berita_list_komisariat($config["per_page"], $data['page'], $id_kom);
        $data['id_kom'] = $id_kom;

        $data['pagination'] = $this->pagination->create_links();
        //load view berita
        $data['title'] = 'berita';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('komisariat/berita_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function proker()
    {
        $id_kom = $this->input->post('id_komisariat', true);
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();
        //konfigurasi pagination
        $config['base_url'] = site_url('komisariat/proker'); //site url
        $count = $this->m_proker->get_count_by_komisariat($id_kom);
        $config['total_rows'] = $count['jumlah_proker']; //total row
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

        //panggil function get_proker_list_komisariat yang ada pada model m_proker . 
        $data['proker'] = $this->m_proker->get_proker_list_komisariat($config["per_page"], $data['page'], $id_kom);

        $data['pagination'] = $this->pagination->create_links();
        //load view berita
        $data['title'] = 'Program Kerja Komisariat';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('komisariat/proker_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function artikel()
    {
        $id_kom = $this->input->post('id_komisariat', true);
        $data['komisariat'] = $this->db->get_where('tb_komisariat', ['id' => $id_kom])->row_array();
        //konfigurasi pagination
        $config['base_url'] = site_url('komisariat/artikel'); //site url
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

        //panggil function get_proker_list_komisariat yang ada pada model m_proker . 
        $data['artikel'] = $this->m_artikel->get_artikel_list_by_komisariat($config["per_page"], $data['page'], $id_kom);


        $data['pagination'] = $this->pagination->create_links();
        //load view berita
        $data['title'] = 'artikel';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('komisariat/artikel_komisariat', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function detail_artikel($slug)
    {
        $data['artikel'] = $this->m_artikel->detail_artikel($slug);
        $data['title'] = "Baca Artikel";
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('komisariat/detail_artikel', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function detail_berita($slug)
    {
        $data['berita'] = $this->m_berita->detail_berita($slug);
        $data['title'] = "Baca Berita";
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('komisariat/detail_berita', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
