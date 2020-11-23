<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_komisariat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_komisariat', 'data_komisariat');
        $this->load->helper('myadmin');
    }

    public function index() {
        $data['title'] = 'Data Komisariat';
        $data['sub_judul'] 			= "Komisariat";
        $data['sub2_judul'] 			= "Data Komisariat";
		$data['deskripsi'] 		= "Komisariat";
        $data['pagae']		= "data_komisariat";
        $data['jumlah_komisariat'] = $this->data_komisariat->jumlahKom();
        $data['modal_komisariat'] = show_my_modal_kustom('admin/modal/mdl_komisariat', 'komisariat', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right', $data);
        $this->load->view('admin/V_komisariat', $data);
        $this->load->view('template/backend/footer', $data);
    }
    public function komisariat_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->data_komisariat->komisariat_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama'];
			$datanya[]	= substr($row['isi'], 0, 150);
            if($row['foto'])
				$datanya[] = '<a href="'.base_url('upload/komisariat/'.$row['foto']).'" target="_blank"><center><img src="'.base_url('upload/komisariat/'.$row['foto']).'" class="img-responsive" style="height:160px; width:140px" /></center></a>';
			else
				$datanya[] = '(No photo)'; 
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="komisariat_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-komisariat" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>';

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
}