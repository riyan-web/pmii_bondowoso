<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');

        //load the department_model

        $this->load->model('m_artikel');
        $this->load->model('m_proker'); 
        $this->load->model('m_berita');
        $this->load->model('m_struktur'); 
    }

    public function index()
    {
        $data['struktur'] = $this->m_struktur->getStrukturCabang()->result();
        $data['title'] = 'Profile PMII Bondowoso';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar');
        $this->load->view('profile_pmii/index', $data);
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
        //konfigurasi pagination
        $config['base_url'] = site_url('beranda/artikel'); //site url
        $count = $this->m_artikel->get_count();
        $config['total_rows'] = $count['jumlah_artikel']; //total row
        $config['per_page'] = 6;  //show record per halaman
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
        $data['artikel'] = $this->m_artikel->get_artikel_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        //load view artikel
        $data['title'] = 'Artikel';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/artikel', $data); 
        $this->load->view('template/frontend/footer', $data);
    }

    public function proker()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('beranda/proker'); //site url
        $config['total_rows'] = $this->db->count_all('tb_proker'); //total row
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

        //panggil function get_mahasiswa_list yang ada pada model m_proker
        $data['proker'] = $this->m_proker->get_proker_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();


        $data['title'] = 'Program Kerja';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/proker', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function berita()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('beranda/berita'); //site url
        $count = $this->m_berita->get_count();
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

        //panggil function get_mahasiswa_list yang ada pada model m_artikel . 
        $data['berita'] = $this->m_berita->get_berita_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();
        //load view berita
        $data['title'] = 'Berita';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/berita', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function struktur()
    {
        $data['struktur'] = $this->m_struktur->getStrukturCabang()->result();
        $data['title'] = 'Struktur Pengurus';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/struktur', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}
