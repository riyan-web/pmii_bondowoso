<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_berita', 'model_berita');
        $this->load->helper('myadmin');
    }
    public function index()
    {
        $data['title'] = 'Berita ';
        // if($this->session->userdata['jenis'] == 4) {
        //     $user = $this->session->userdata['jenis'];
        //     $data['jumlah_berita'] = $this->data_anggota->jumlah_by_id('tb_konten', 'user_id', $user);
        //     $data['namaController'] = 'berita_list';
        // }

        // if($this->session->userdata['jenis'] == 3) {
        //     $data['namaController'] = 'beritaKom_list';
        //     $user = $this->session->userdata['jenis'];
        //     $data['jumlah_berita'] = $this->data_anggota->jumlah_by_id('tb_konten', 'user_id', $user);
        //     // $data['dataAnggota'] = $this->data_anggota->anggota_by_kom($id_komisariat);
        //     // $data['dataKomisariat'] = $this->data_komisariat->komisariat_by_id($id_komisariat);
        // }
        $data['namaController'] = 'berita_list';
        $data['sub_judul']             = "berita";
        $data['sub2_judul']             = "Data Berita";
        $data['deskripsi']         = "Berita";
        $data['pagae']        = "berita";
        $data['modal_berita'] = show_my_modal_kustom('admin/modal/mdl_berita', 'berita', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_berita');
        $this->load->view('template/backend/footer', $data);
    }

    public function berita_list()
    {
        $requestData    = $_REQUEST;
        $fetch            = $this->model_berita->berita_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
        $totalData        = $fetch['totalData'];
        $totalFiltered    = $fetch['totalFiltered'];
        $query            = $fetch['query'];

        $data    = array();
        foreach ($query->result_array() as $row) {
            $datanya = array();
            $datanya[]    = $row['nomora'];
            $datanya[]    = $row['judul'];
            $datanya[]    = $row['nama_jenis'];

            if ($row['status'] == 2)
                $datanya[]    = '<label class="badge badge-success">Aktif</label>';
            else
                $datanya[]    = '<label class="badge badge-danger">Tidak Aktif</label>';

            if ($row['status'] == 2)
                $datanya[] = '
                    <a class="btn btn-secondary btn-sm" href="javascript:void(0)" title="List Komentar berita" onclick="listKomen(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-comments"></i></a>
                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Detail Berita" onclick="detail_berita(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-info"></i></a>
                    <a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="berita_ubah(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger btn-sm konfirmasiNonaktif-berita" title="Nonaktifkan Data" data-id="' . $row['id_konten'] . '" data-toggle="modal" data-target="#konfirmasiNonaktif"><i class="fa fa-times-circle"></i></button>
                ';
            else
                $datanya[] = '
                    <a class="btn btn-secondary btn-sm" href="javascript:void(0)" title="List Komentar berita" onclick="listKomen(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-comments"></i></a>
                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Detail Berita" onclick="detail_berita(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-info"></i></a>
                    <a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="berita_ubah(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-success btn-sm konfirmasiAktif-berita" title="Aktif Data" data-id="' . $row['id_konten'] . '" data-toggle="modal" data-target="#konfirmasiAktif"><i class="fa fa-check-circle"></i></button>
                    <button class="btn btn-danger btn-sm konfirmasiHapus-berita" title="Hapus Data" data-id="' . $row['id_konten'] . '" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
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

    public function berita_tambah()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('jenis', 'jenis', 'required');


        if ($this->session->userdata['jenis'] == 1) {
            $status = '1';
        } else {
            $status = '2';
        }
        if ($this->form_validation->run() == TRUE) {
            // cek nim ada atau tidak
            $cek = $this->model_berita->nama_cek($this->input->post('judul'));
            if ($cek > 0) {
                $out['status'] = 'form';
                $out['msg'] = show_err_msg('Judul Berita tersebut sudah terdaftar');
            } else {
                $slug = $this->input->post('judul');
                $data = array(
                    'judul' => $slug,
                    'slug' => str_replace(" ", "-", "$slug"),
                    'isi_konten' => $this->input->post('isi'),
                    'jeniskonten_id' => $this->input->post('jenis'),
                    'foto_artikel' => $this->input->post('img'),
                    'tgl_buat' => date("Y-m-d h:i:s"),
                    'status' => '2',
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

                $result = $this->model_berita->berita_tambah($data);
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = show_succ_msg('Berita Berhasil ditambahkan, Untuk selanjutnya tunggu persetujuan admin', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = show_err_msg('Berita Gagal ditambahkan', '20px');
                }
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
    public function berita_ubah($id)
    {
        // ini function untuk menampilkan kedalam form field 
        $data = $this->model_berita->berita_by_id($id);
        echo json_encode($data);
    }

    public function berita_proses_ubah()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('jenis', 'jenis', 'required');
        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $slug = $this->input->post('judul');
            $data = array(
                'judul' => $slug,
                'slug' => str_replace(" ", "-", "$slug"),
                'isi_konten' => $this->input->post('isi'),
                'jeniskonten_id' => $this->input->post('jenis'),
                'foto_artikel' => $this->input->post('img'),
                'status' => '2'
            );
            $remove_photo = $this->input->post('remove_photo');
            if ($this->input->post('remove_photo')) // jika remove photo di centang
            {
                if (file_exists('upload/artikel/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo' && $remove_photo != "default.jpg")) {
                    unlink('upload/artikel/' . $this->input->post('remove_photo'));
                    $data['foto_artikel'] = '';
                }
            }

            if (!empty($_FILES['img']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $artikel = $this->model_berita->berita_by_id($this->input->post('id'));
                if (file_exists('upload/artikel/' . $artikel->foto_artikel) && $artikel->foto_artikel)
                    unlink('upload/artikel/' . $artikel->foto_artikel);

                $data['foto_artikel'] = $upload;
            } else {
                $data['foto_artikel'] = $this->input->post('foto_lama');
            }
            $id = $this->input->post('id');
            $result = $this->model_berita->berita_ubah($data, $id);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('artikel usulan berhasil ditambahkan', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data artikel usulan Gagal diubah', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function berita_hapus()
    {
        $id = $_POST['id'];
        $ray = $this->model_berita->berita_by_id($_POST['id']);
        $data = array('foto' => $ray->foto_artikel);
        if (file_exists('upload/artikel/' . $data['foto']) && $data['foto'] && $data['foto'] != "default.jpg") {
            unlink('upload/artikel/' . $data['foto']);
        }
        $result = $this->model_berita->berita_hapus($id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Berita Berhasil dihapus', '20px');
        } else {
            echo show_err_msg('Berita Gagal dihapus', '20px');
        }
    }

    public function nonaktifkan_berita()
    {
        $id = $_POST['id'];
        $status = '3';
        $result = $this->model_berita->change_status($status, $id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Data Berita berhasil Dinonaktifkan!', '20px');
        } else {
            echo show_err_msg('Data Berita Gagal Dinonaktifkan!', '20px');
        }
    }
    public function aktifkan_berita()
    {
        $id = $_POST['id'];
        $status = '2';
        $result = $this->model_berita->change_status($status, $id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Data Berita berhasil Diaktifkan!', '20px');
        } else {
            echo show_err_msg('Data Berita Gagal Diaktifkan!', '20px');
        }
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'upload/berita';
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
