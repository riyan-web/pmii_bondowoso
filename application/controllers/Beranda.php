<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load libary pagination
        $this->load->helper('download');
        $this->load->library('pagination', 'encrypt');

        //load the department_model

        $this->load->model('m_artikel');
        $this->load->model('m_materi');
        $this->load->model('m_proker');
        $this->load->model('m_berita');
        $this->load->model('m_produk');
        $this->load->model('m_struktur');
    }

    public function index()
    {
        $data['berita'] = $this->m_berita->get_berita_beranda()->row_array();
        $data['struktur'] = $this->m_struktur->getStrukturCabang()->result();
        $data['title'] = 'Profile PMII Bondowoso';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar');
        $this->load->view('profile_pmii/index', $data);
        $this->load->view('template/frontend/footer');
    }

    public function about()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Anda Harus Diisi']);
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[pesan_pengunjung.email]',
            ['required' => 'Email Anda Harus Diisi'],
            ['valid_email' => 'Email Anda Tidak Valid'],
            ['is_unique' => 'Email Anda Telah Digunakan Sebelumnya']
        );
        $this->form_validation->set_rules('subject', 'Subjek', 'required|trim', ['required' => 'Subjek anda Harus Diisi']);
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', ['required' => 'Silahkan Isikan Pesan Anda']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tentang Kami';
            $this->load->view('template/frontend/header', $data);
            $this->load->view('template/frontend/navbar', $data);
            $this->load->view('profile_pmii/about');
            $this->load->view('template/frontend/footer', $data);
        } else {
            $data = [
                'nama'      => htmlspecialchars($this->input->post('nama', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'subject'   => htmlspecialchars($this->input->post('subject', true)),
                'pesan'     => htmlspecialchars($this->input->post('pesan', true)),
                'tanggal'   => date("Y-m-d"),
                'status'    => '0'

            ];

            $this->db->insert('pesan_pengunjung', $data);
            echo "<script>alert('Pesan Anda Dikirimkan');window.location='about';</script>";
        }
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
        $count = $this->m_proker->get_count_proker_cabang();
        $config['total_rows'] = $count['jumlah_proker']; //total row
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

    public function search_berita()
    {
        $keyword = $this->input->post('keyword');
        $data['berita'] = $this->m_berita->get_keyword($keyword);
        $data['pagination'] = '';
        $data['title'] = 'Berita';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/berita', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function materi_pmii()
    {
        $data['materi_pmii'] = $this->m_materi->getMateriPmii()->result();

        $data['title'] = 'Materi PMII';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/materi_pmii', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function download_materi($link)
    {
        force_download('upload/materi_pmii/' . $link, NULL);
    }

    public function produk_pmii()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('beranda/produk_pmii'); //site url
        $count = $this->m_produk->get_count();
        $config['total_rows'] = $count['jumlah_produk']; //total row
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
        $data['produk'] = $this->m_produk->get_produk_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        //load view artikel
        $data['title'] = 'PMII Business';
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/produk_pmii', $data);
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

    public function lakukan_download()
    {
        force_download('upload/materi_pmii/', NULL);
    }
}
