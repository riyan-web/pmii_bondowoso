<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_usulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_artikelUsul', 'model_artikelUsul');
        $this->load->helper('myadmin');
    }

    public function index()
    {
        $data['title'] = 'Artikel Usulan';
        $data['sub_judul']             = "artikel usulan";
        $data['sub2_judul']             = "Data Artikel Usulan";
        $data['deskripsi']         = "Artikel Usulan Kader";
        $data['pagae']        = "artikel_usulan";
        $data['modal_artikel'] = show_my_modal_kustom('admin/modal/mdl_artikel', 'artikel', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_artikelUsul', $data);
        $this->load->view('template/backend/footer', $data);
    }

    public function artikelSul_list()
    {
        $requestData    = $_REQUEST;
        $fetch            = $this->model_artikelUsul->artikel_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
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
            else if ($row['status'] == 3)
                $datanya[]    = '<label class="badge badge-info">Tidak Aktif</label>';
            else if ($row['status'] == 1)
                $datanya[]    = '<label class="badge badge-secondary">Menunggu</label>';
            else
                $datanya[]    = '<label class="badge badge-danger">Tidak Diterima</label>';

            if ($row['status'] == 2)
                $datanya[] = '
                <a class="btn btn-secondary btn-sm" href="javascript:void(0)" title="List Komentar artikel" onclick="listKomen(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-comments"></i></a>
            <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Detail Artikel" onclick="detail_artikel(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-align-justify"></i></a>
                <a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Edit " onclick="artikelSul_edit(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-edit"></i></a>
                <button class="btn btn-danger btn-sm konfirmasiNonaktif-artikelSul" title="NonAktifkan!" data-id="' . $row['id_konten'] . '" data-toggle="modal" data-target="#konfirmasiNonaktif"><i class="fa fa-times-circle"></i></button>
                ';
            else if ($row['status'] == 3)
                $datanya[] = '
                <a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Edit " onclick="artikelSul_edit(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-edit"></i></a>
                <button class="btn btn-success btn-sm konfirmasiAktif-artikelSul" title="Aktifkan!" data-id="' . $row['id_konten'] . '" data-toggle="modal" data-target="#konfirmasiAktif"><i class="fa fa-check-circle"></i></button>
                ';
            else if ($row['status'] == 1)
                $datanya[] = '
                <a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Koreksi " onclick="artikelSul_koresi(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-edit"></i></a>
                <button class="btn btn-danger btn-sm konfirmasiTolak-artikelSul" title="Tolak!" data-id="' . $row['id_konten'] . '" data-toggle="modal" data-target="#konfirmasiTolak"><i class="fa fa-times-circle"></i></button>
                ';
            else
                $datanya[] = '
                <a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Koreksi " onclick="artikelSul_koresi(' . "'" . $row['id_konten'] . "'" . ')"><i class="fa fa-edit"></i></a>
                <button class="btn btn-danger btn-sm konfirmasiHapus-artikelSul" title="Hapus Artikel Ini!" data-id="' . $row['id_konten'] . '" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
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

    public function artikelSul_koresi($id)
    {

        // ini function untuk menampilkan kedalam form field 
        $data = $this->model_artikelUsul->artikelSul_by_id($id);
        echo json_encode($data);
    }

    public function artikelSul_terima()
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
                $artikelSul = $this->model_artikelUsul->artikelSul_by_id($this->input->post('id'));
                if (file_exists('upload/artikel/' . $artikelSul->foto_artikel) && $artikelSul->foto_artikel)
                    unlink('upload/artikel/' . $artikelSul->foto_artikel);

                $data['foto_artikel'] = $upload;
            } else {
                $data['foto_artikel'] = $this->input->post('foto_lama');
            }
            $id = $this->input->post('id');
            $result = $this->model_artikelUsul->artikelSul_simpan($data, $id);

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

    public function artikelSul_tolak()
    {
        $this->form_validation->set_rules('isi_tolak', 'Pesan', 'required');
        $data = $this->input->post();

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'pesan_ditolak' => $this->input->post('isi_tolak'),
                'status' => '0'
            );
            $id = $this->input->post('id');
            $result = $this->model_artikelUsul->artikelSul_simpan($data, $id);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('artikel usulan berhasil ditolak', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data artikel usulan Gagal ditolak', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function tolak_artikelUsul()
    {
        $id = $_POST['id'];
        $status = '0';
        $result = $this->model_artikelUsul->change_status($status, $id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Data Artikel berhasil ditolak!', '20px');
        } else {
            echo show_err_msg('Data Artikel Gagal ditolak!', '20px');
        }
    }

    public function nonaktifkan_artikelUsul()
    {
        $id = $_POST['id'];
        $status = '3';
        $result = $this->model_artikelUsul->change_status($status, $id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Data Artikel berhasil Dinonaktifkan!', '20px');
        } else {
            echo show_err_msg('Data Artikel Gagal Dinonaktifkan!', '20px');
        }
    }
    public function aktifkan_artikelUsul()
    {
        $id = $_POST['id'];
        $status = '2';
        $result = $this->model_artikelUsul->change_status($status, $id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Data Artikel berhasil Diaktifkan!', '20px');
        } else {
            echo show_err_msg('Data Artikel Gagal Diaktifkan!', '20px');
        }
    }

    public function hapus_artikelUsul()
    {
        $id = $_POST['id'];
        $ray = $this->model_artikelUsul->artikelSul_by_id($_POST['id']);
        $data = array('foto' => $ray->foto_artikel);
        if (file_exists('upload/artikel/' . $data['foto']) && $data['foto'] && $data['foto'] != "default.jpg") {
            unlink('upload/artikel/' . $data['foto']);
        }
        $result = $this->model_artikelUsul->artikelSul_hapus($id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Artikel Berhasil dihapus', '20px');
        } else {
            echo show_err_msg('Artikel Gagal dihapus', '20px');
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
