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
        $data['namaController'] = 'artikel_list';
        $data['sub_judul']             = "artikel";
        $data['sub2_judul']             = "Data Artikel";
        $data['deskripsi']         = "Artikel";
        $data['pagae']        = "artikel";
        $data['konten2'] = $this->db->get_where('tb_konten', ['user_id' =>
        $this->session->userdata('user_id')])->result();
        $data['modal_artikel'] = show_my_modal_kustom('admin/modal/mdl_artikel', 'artikel', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_artikel', $data);
        $this->load->view('template/backend/footer', $data);
    }

    public function artikel_list()
    {
        $requestData    = $_REQUEST;
        $fetch            = $this->artikel_model->artikel_all_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
        $totalData        = $fetch['totalData'];
        $totalFiltered    = $fetch['totalFiltered'];
        $query            = $fetch['query'];

        $data    = array();
        foreach ($query->result_array() as $row) {
            $datanya = array();
            $datanya[]    = $row['nomora'];
            $datanya[]    = $row['judul'];
            $datanya[]    = $row['isi_konten'];
            $datanya[]    = $row['nama_jenis'];
            $datanya[]    = $row['tmp_lahir'];
            $datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" title="Hapus Data" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
			  <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Detail Username" onclick="detail_username(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-user"></i></a>
			  <a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Reset Password" onclick="reset_anggota(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-key"></i></a>  
			  <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail lengkap Anggota" onclick="detail_anggota(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-info-circle"></i></a>
			  ';
            $data[] = $datanya;
        }

        $json_data = array(
            "draw"            => intval($requestData['draw']),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
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
    public function artikel_ubah($id)
    {
        // ini function untuk menampilkan kedalam form field 
        $data = $this->model_komisariat->komisariat_by_id($id);
        echo json_encode($data);
    }


    public function artikel_proses_ubah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('singkatan', 'singkatan', 'required');
        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'isi' => $this->input->post('isi'),
                'foto' => $this->input->post('img')
            );
            if ($this->input->post('remove_photo')) // jika remove photo di centang
            {
                if (file_exists('upload/komisariat/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo' && $data['remove_photo'] != "default.jpg")) {
                    unlink('upload/komisariat/' . $this->input->post('remove_photo'));
                    $data['foto'] = '';
                }
            }

            if (!empty($_FILES['img']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $komisariat = $this->model_komisariat->komisariat_by_id($this->input->post('id'));
                if (file_exists('upload/komisariat/' . $komisariat->foto) && $komisariat->foto)
                    unlink('upload/komisariat/' . $komisariat->foto);

                $data['foto'] = $upload;
            } else {
                $data['foto'] = $this->input->post('foto_lama');
            }
            $id = $this->input->post('id');
            $result = $this->model_komisariat->komisariat_ubah($data, $id);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Komisariat Berhasil diubah', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Komisariat Gagal diubah', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
    public function artikel_hapus()
    {
        $id = $_POST['id'];
        $ray = $this->model_komisariat->komisariat_by_id($_POST['id']);
        $data = array('foto' => $ray->foto);
        if (file_exists('upload/komisariat/' . $data['foto']) && $data['foto'] && $data['foto'] != "default.jpg") {
            unlink('upload/komisariat/' . $data['foto']);
        }
        $result = $this->model_komisariat->komisariat_hapus($id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Data Komisariat Berhasil dihapus', '20px');
        } else {
            echo show_err_msg($id . 'Data Komisariat Gagal dihapus', '20px');
        }
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
