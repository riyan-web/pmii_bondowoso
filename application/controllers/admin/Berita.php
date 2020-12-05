<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_berita', 'data_berita');
        $this->load->model('admin/M_anggota', 'data_anggota');
    }
    public function index()
    {
        $data['title'] = 'Berita ';
        if($this->session->userdata['jenis'] == 4) {
            $user = $this->session->userdata['jenis'];
            $data['jumlah_berita'] = $this->data_anggota->jumlah_by_id('tb_konten', 'user_id', $user);
            $data['namaController'] = 'berita_list';
        }

        if($this->session->userdata['jenis'] == 3) {
            $data['namaController'] = 'beritaKom_list';
            $user = $this->session->userdata['jenis'];
            $data['jumlah_berita'] = $this->data_anggota->jumlah_by_id('tb_konten', 'user_id', $user);
            // $data['dataAnggota'] = $this->data_anggota->anggota_by_kom($id_komisariat);
            // $data['dataKomisariat'] = $this->data_komisariat->komisariat_by_id($id_komisariat);
        }
        $data['sub_judul'] 			= "berita";
        $data['sub2_judul'] 			= "Data Berita";
		$data['deskripsi'] 		= "Berita";
        $data['pagae']		= "berita";
        
        $data['berita'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_berita');
        $this->load->view('template/backend/footer', $data);
    }

    public function berita_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->data_berita->berita_all_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['judul'];
			$datanya[]	= substr($row['isi_konten'], 0, 90);
			if($row['foto_artikel'])
				$datanya[] = '<a href="'.base_url('upload/konten/'.$row['foto_artikel']).'" target="_blank"><center><img src="'.base_url('upload/konten/'.$row['foto_artikel']).'" class="img-responsive" style="height:160px; width:140px" /></center></a>';
			else
				$datanya[] = '(No photo)'; 
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
              <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
              <a class="btn btn-xs btn-info" href="javascript:void(0)" title="data dosen sesuai jabatan" onclick="detail_kategori('."'".$row['id']."'".')"><i class="fa fa-info-sign"></i></a>
              ';

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
