<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('artikel_model');
        $this->load->helper('myadmin');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Artikel ';
        $data['sub_judul']             = "artikel";
        $data['sub2_judul']             = "Data Artikel";
        $data['deskripsi']         = "Artikel";
        $data['pagae']        = "artikel";
        $data['konten'] = $this->artikel_model->tampil_data();
        $data['konten2'] = $this->db->get_where('tb_konten', ['user_id' =>
        $this->session->userdata('user_id')])->result();
        $data['modal_artikel'] = show_my_modal_kustom('admin/modal/mdl_artikel', 'artikel', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_artikel', $data);
        $this->load->view('template/backend/footer', $data);
    }

    public function artikel_tambah()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('jenis', 'jenis', 'required');


        if ($this->session->userdata['jenis'] == 1) {
            $status = 1;
        } else {
            $status = 2;
        }
        if ($this->form_validation->run() == TRUE) {
            // cek nim ada atau tidak
            $cek = $this->artikel_model->nama_cek($this->input->post('judul'));
            if ($cek > 0) {
                $out['status'] = 'form';
                $out['msg'] = show_err_msg('Judul Artikel tersebut sudah terdaftar');
            } else {
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'isi_konten' => $this->input->post('isi'),
                    'jeniskonten_id' => $this->input->post('jenis'),
                    'foto_artikel' => $this->input->post('img'),
                    'tgl_buat' => date("Y-m-d h:i:s"),
                    'status' => $status,
                    'user_id' => $this->session->userdata['user_id'],
                    'kader_id' => $this->session->userdata['kader_id']

                );
                // upload gambar
                if (!empty($_FILES['img']['name'])) {
                    $upload = $this->_do_upload();
                    $data['foto_artikel'] = $upload;
                } else {
                    $data['foto_artikel'] = "default.jpg";
                }

                $result = $this->artikel_model->artikel_tambah($data);
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = show_succ_msg('Artikel Berhasil ditambahkan, Untuk selanjutnya tunggu persetujuan admin', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = show_err_msg('Artikel Gagal ditambahkan', '20px');
                }
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
    private function _do_upload()
    {
        $config['upload_path']          = 'upload/artikel';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique session_name()

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) //upload and validate
        {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg('Upload Gagal: ' . $this->upload->display_errors('', ''));
            echo json_encode($out);
            exit();
        }
        return $this->upload->data('file_name');
    }
}
