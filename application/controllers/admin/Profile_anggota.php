<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile Kader PMII';
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('anggota/profile_anggota', $data);
        $this->load->view('template/backend/footer', $data);
    }
    public function ubah_nama_foto()
    {
        $nama = $this->input->post('nama');
        $id_kader = $this->input->post('kader_id');
        $data['kader'] = $this->db->get_where('tb_kader', ['id' => $id_kader])->row_array();

        //cek jika da gambar yang diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path']          = 'upload/kader';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000; //set max size allowed in Kilobyte
            $config['max_width']            = 10000; // set max width image allowed
            $config['max_height']           = 10000; // set max height allowed
            $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique session_name()
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['kader']['foto'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH . './upload/kader/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nama', $nama);
        $this->db->where('id', $id_kader);
        $this->db->update('tb_kader');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Profil Anda Telah Diubah!</div>'
        );
        redirect('admin/profile_anggota');
    }
    public function ubah_alamat()
    {
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == true) {
            $alamat = $this->input->post('alamat');
            $id_kader = $this->input->post('kader_id');

            $this->db->set('alamat', $alamat);
            $this->db->where('id', $id_kader);
            $this->db->update('tb_kader');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
            );
            redirect('admin/profile_anggota');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Data Profile Gagal Dihapus, Data Dilarang Kosong</div>'
            );
            redirect('admin/profile_anggota');
        }
    }

    public function ubah_noTelp()
    {
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
        if ($this->form_validation->run() == true) {
            $no_telp = $this->input->post('no_telp');
            $id_kader = $this->input->post('kader_id');

            $this->db->set('no_hp', $no_telp);
            $this->db->where('id', $id_kader);
            $this->db->update('tb_kader');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
            );
            redirect('admin/profile_anggota');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Data Profile Gagal Dihapus, Data Dilarang Kosong</div>'
            );
            redirect('admin/profile_anggota');
        }
    }

    public function ubah_tmp_lahir()
    {
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        if ($this->form_validation->run() == true) {
            $tmp_lahir = $this->input->post('tmp_lahir');
            $id_kader = $this->input->post('kader_id');

            $this->db->set('tmp_lahir', $tmp_lahir);
            $this->db->where('id', $id_kader);
            $this->db->update('tb_kader');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
            );
            redirect('admin/profile_anggota');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Data Profile Gagal Dihapus, Data Dilarang Kosong</div>'
            );
            redirect('admin/profile_anggota');
        }
    }
    public function ubah_tgl_lahir()
    {
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        if ($this->form_validation->run() == true) {
            $tgl_lahir = $this->input->post('tgl_lahir');
            $id_kader = $this->input->post('kader_id');

            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->where('id', $id_kader);
            $this->db->update('tb_kader');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
            );
            redirect('admin/profile_anggota');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Data Profile Gagal Dihapus, Data Dilarang Kosong</div>'
            );
            redirect('admin/profile_anggota');
        }
    }

    public function ubah_thnMapaba()
    {
        $this->form_validation->set_rules('thn_mapaba', 'Tahun Mapaba', 'required|trim');
        if ($this->form_validation->run() == true) {
            $thn_mapaba = $this->input->post('thn_mapaba');
            $id_kader = $this->input->post('kader_id');

            $this->db->set('tahun_mapaba', $thn_mapaba);
            $this->db->where('id', $id_kader);
            $this->db->update('tb_kader');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
            );
            redirect('admin/profile_anggota');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Data Profile Gagal Dihapus, Data Dilarang Kosong</div>'
            );
            redirect('admin/profile_anggota');
        }
    }

    public function ubah_thnPKD()
    {
        $thn_pkd = $this->input->post('thn_pkd');
        $id_kader = $this->input->post('kader_id');

        $this->db->set('tahun_pkd', $thn_pkd);
        $this->db->where('id', $id_kader);
        $this->db->update('tb_kader');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
        );
        redirect('admin/profile_anggota');
    }

    public function ubah_thnPKL()
    {
        $thn_pkl = $this->input->post('thn_pkl');
        $id_kader = $this->input->post('kader_id');

        $this->db->set('tahun_pkl', $thn_pkl);
        $this->db->where('id', $id_kader);
        $this->db->update('tb_kader');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data anda berhasil diubah</div>'
        );
        redirect('admin/profile_anggota');
    }
}
