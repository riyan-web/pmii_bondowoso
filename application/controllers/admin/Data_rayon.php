<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_rayon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_rayon', 'model_rayon');
        $this->load->helper('myadmin');
    }

    public function index() 
    {
        $data['title'] = 'Data Rayon';
        $data['sub_judul'] 			= "Rayon"; 
        $data['sub2_judul'] 			= "Data Rayon";
		$data['deskripsi'] 		= "";
        $data['pagae']		= "data_rayon";
        $data['modal_rayon'] = show_my_modal('admin/modal/mdl_rayon', 'rayon', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right', $data);
        $this->load->view('admin/V_rayon', $data);
        $this->load->view('template/backend/footer', $data); 
    }

    public function rayon_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->model_rayon->rayon_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['namanya'];
            if($row['foto'])
				$datanya[] = '<a href="'.base_url('upload/rayon/'.$row['foto']).'" title="bisa di klik,supaya besar!" target="_blank"><center><img src="'.base_url('upload/rayon/'.$row['foto']).'" class="img-responsive" style="height:60px; width:50px" /></center></a>';
			else
                $datanya[] = '(No photo)'; 
			$datanya[]	= "<b>".$this->db->get_where('tb_kader', ['komisariat_id' => $row['rayon_id']])->num_rows()."</b> kader";
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="rayon_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
			 			 <button class="btn btn-danger btn-sm konfirmasiHapus-rayon" data-id="'.$row['id'].'" title="hapus data " data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
						  <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Detail Username" onclick="detail_username(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-user"></i></a> 
						  <button class="btn btn-dark btn-sm konfirmasiReset-anggota" title="Reset Username dan password kedefault" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#konfirmasiReset"><i class="fa fa-key"></i></button> 
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

	public function rayon_tambah()
	{
		$id_komisariat = $this->session->userdata['id_komisariat'];
		$this->form_validation->set_rules('nama', 'Nama Rayon', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$cek = $this->model_rayon->nama_cek($this->input->post('nama'));
			if ($cek > 0) {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Nama Rayon tersebut sudah terdaftar');
			}else{
				$data = array(
					'nama' => $this->input->post('nama')
				);
				// upload gambar 
				if (!empty($_FILES['img']['name'])) {
					$upload = $this->_do_upload();
					$data['foto'] = $upload;
				} else {
					$data['foto'] = "default.jpg";
				}
				$id = $this->model_rayon->rayon_tambah($data);
				if ($id > 0) {
					
					$hub = array(
						'komisariat_id' => $id_komisariat,
						'rayon_id' => $id
					);

					$userna = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'tgl_update' => date('Y-m-d H:i:s'),
						'jenis' => '2',
						'komisariat_id' => $id

					);
					$tambhser = $this->model_rayon->rayon_tambah_user($userna);
					$hasil = $this->model_rayon->rayon_tambah_hub($hub);
					if ($hasil > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Rayon Berhasil ditambahkan, silahkan Login dengan username Rayon tsb untuk mengisi deskripsi rayon', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_err_msg('Data Anggota Gagal ditambahkan', '20px');
					}
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Anggota Gagal ditambahkan', '20px');
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
			$config['upload_path']          = 'upload/rayon';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 10000; //set max size allowed in Kilobyte
	        $config['max_width']            = 10000; // set max width image allowed
	        $config['max_height']           = 10000; // set max height allowed
	        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique session_name()

	        $this->load->library('upload', $config);

	        if(!$this->upload->do_upload('img')) //upload and validate
	        {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Upload Gagal: '.$this->upload->display_errors('',''));
				echo json_encode($out);
				exit();
			}
			return $this->upload->data('file_name');
		}

}