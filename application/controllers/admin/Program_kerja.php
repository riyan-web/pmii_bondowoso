<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_kerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }
    public function index()
    {
        $data['title'] = 'Program Kerja ';
        $data['sub_judul'] 			= "program kerja";
        $data['sub2_judul'] 			= "Data Program kerja";
		$data['deskripsi'] 		= "Program Kerja";
        $data['pagae']		= "program_kerja";

        // if($this->session->userdata['jenis'] == 4) {
        //     $data['jumlah_proker'] = $this->model_proker->jumlah('tb_proker');
        //     $data['dataProker'] = $this->model_proker->komisariat_all();
        //     $data['namaController'] = 'proker_list';
        // }

        // if($this->session->userdata['jenis'] == 3) {
        //     $id_user = $this->session->userdata['id_user'];
        //     $data['namaController'] = 'prokerKom_list';
        //     $data['jumlah_kader'] = $this->model_proker->jumlah_by_id('tb_proker', 'id', $id_user);
        // }
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_program_kerja');
        $this->load->view('template/backend/footer', $data);
    }
}
