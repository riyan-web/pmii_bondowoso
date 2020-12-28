<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_pengunjung extends CI_Controller
{
    public function __construct()
    {    
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_pesan', 'model_pesan');
        $this->load->helper('myadmin');
    }

    public function index()
    {
        $data['title'] = 'Pesan Pengunjung ';
        $data['sub_judul']             = "pesan pengunjung";
        $data['sub2_judul']             = "Data pesan pengunjung";
        $data['deskripsi']         = "Pesan Pengunjung";
        $data['pagae']        = "pesan_pengunjung";
     
        
        // $data['modal_pesan'] = show_my_modal_kustom('admin/modal/mdl_pesan', 'pesan', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_pesan_pengunjung', $data);
        $this->load->view('template/backend/footer', $data);
    }

    public function pesan_list()
    {
        $requestData    = $_REQUEST;
        $fetch            = $this->model_pesan->pesan_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
        $totalData        = $fetch['totalData'];
        $totalFiltered    = $fetch['totalFiltered'];
        $query            = $fetch['query'];

        $data    = array();
        foreach ($query->result_array() as $row) {
            $datanya = array();
            $datanya[]    = $row['nomora'];
            $datanya[]    = $row['nama'];
            $datanya[]    = $row['subject'];
            $datanya[]    = $row['tanggal'];
            $datanya[] = '
                <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Detail Pesan Pengunjung" onclick="detail_pesan('."'".$row['id']."'".')"><i class="fa fa-info"></i></a>
                <button class="btn btn-danger btn-sm konfirmasiHapus-pesan" title="Hapus Data" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
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

    public function pesan_hapus()
    {
        $id = $_POST['id'];
        $result = $this->model_pesan->pesan_hapus($id);

        if ($result > 0) {
            //delete file

            echo show_succ_msg('Pesan Pengunjung Berhasil dihapus', '20px');
        } else {
            echo show_err_msg('Pesan Pengunjung Gagal dihapus', '20px');
        }
    }

}