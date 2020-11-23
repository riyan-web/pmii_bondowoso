<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_anggota', 'data_anggota');
        $this->load->model('admin/M_komisariat', 'data_komisariat');
        $this->load->helper('myadmin');
    }
    public function index() {
        
        if($this->session->userdata['jenis'] == 4) {
            // $data['dataAnggota'] = $this->data_anggota->anggota_all();
            $data['jumlah_kader'] = $this->data_anggota->jumlah('tb_kader');
            $data['dataKomisariat'] = $this->data_komisariat->komisariat_all();
            $data['namaController'] = 'anggota_list';
        }

        if($this->session->userdata['jenis'] == 3) {
            $id_komisariat = $this->session->userdata['id_komisariat'];
            $data['namaController'] = 'anggotaKom_list';
            $data['jumlah_kader'] = $this->data_anggota->jumlah_by_id('tb_kader', 'komisariat_id', $id_komisariat);
            // $data['dataAnggota'] = $this->data_anggota->anggota_by_kom($id_komisariat);
            // $data['dataKomisariat'] = $this->data_komisariat->komisariat_by_id($id_komisariat);
        }
        $data['title'] = 'Data anggota';
        $data['sub_judul'] 			= "Anggota";
        $data['sub2_judul'] 			= "Data Anggota";
		$data['deskripsi'] 		= "Anggota";
        $data['pagae']		= "data_anggota";
        $data['modal_anggota'] = show_my_modal_besar('admin/modal/mdl_anggota', 'anggota', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right', $data);
        $this->load->view('admin/V_dataanggota', $data);
        $this->load->view('template/backend/footer', $data);

    }

    // buka cabang
    public function anggota_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->data_anggota->anggota_all_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama'];
			$datanya[]	= $row['alamat'];
			$datanya[]	= $row['no_hp'];
 			$datanya[]	= [$row['tmp_lahir'],$row['tgl_lahir']];
            if($this->session->userdata['jenis'] == 4 ){
                $datanya[]	= $row['nama_komisariat'];
            }
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>';

			$data[] = $datanya;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
		);

		echo json_encode($json_data);
    }
    // tutup cabang

    // buka komisariat
    public function anggotaKom_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->data_anggota->anggota_by_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama'];
			$datanya[]	= $row['alamat'];
			$datanya[]	= $row['no_hp'];
 			$datanya[]	= [$row['tmp_lahir'],$row['tgl_lahir']];
            if($this->session->userdata['jenis'] == 4 ){
                $datanya[]	= $row['nama_komisariat'];
            }
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>';

			$data[] = $datanya;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
		);

		echo json_encode($json_data);
	}
    // tutup komisariat

}