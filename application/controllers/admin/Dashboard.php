<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('m_struktur');
        $this->load->helper('myadmin');
    }
    public function index()
    {
        $id_kom = $this->session->userdata['id_komisariat'];
        $data['title'] = 'Dashboard';
        $data['sub_judul']     = "Komisariat";
        $data['sub2_judul'] = "";
        $data['deskripsi']     = "Dashboard";
        $data['pagae']        = "";
        $data['struktur'] = $this->m_struktur->getStrukturKomisariat($id_kom)->result();
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/backend/footer', $data);
    }

    public function ubah_struktur()
    {
        $this->form_validation->set_rules('tipe', 'Posisi', 'required|trim');
        $this->form_validation->set_rules('id_kader', 'Nama Kader', 'required|trim');
        if ($this->form_validation->run() == true) {
            $id_struk = $this->input->post('id_struk');
            $tipe = htmlspecialchars($this->input->post('tipe'));
            $id_kader = htmlspecialchars($this->input->post('id_kader'));

            $this->db->set('tipe', $tipe);
            $this->db->set('kader_id', $id_kader);
            $this->db->where('id', $id_struk);
            $this->db->update('tb_strukturkom');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Data Struktur Berhasil Diubah</div>'
            );
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Data Struktur Gagal Diubah, Data Dilarang Kosong</div>'
            );
            redirect('admin/dashboard');
        }
    }
    public function tambah_struktur()
    {
        $this->form_validation->set_rules('tipe', 'Posisi', 'required|trim');
        $this->form_validation->set_rules('id_kader', 'Nama Kader', 'required|trim');
        if ($this->form_validation->run() == true) {
            $id_kom = $this->session->userdata['id_komisariat'];

            $this->db->insert(
                'tb_strukturkom',
                [
                    'tipe' =>  htmlspecialchars($this->input->post('tipe', true)),
                    'kader_id' =>  htmlspecialchars($this->input->post('id_kader', true)),
                    'komisariat_id' => $id_kom
                ]
            );
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Data Struktur Berhasil Ditambahkan</div>'
            );
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Data Struktur Gagal Ditambahkan, Data Dilarang Kosong</div>'
            );
            redirect('admin/dashboard');
        }
    }
    function hapus_struktur()
    {
        $id_struk = $this->input->post('id_struk');
        $this->db->query("DELETE FROM tb_strukturkom WHERE id = $id_struk");
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Struktur Berhasil Dihapus</div>'
        );
        redirect('admin/dashboard');
    }
}
