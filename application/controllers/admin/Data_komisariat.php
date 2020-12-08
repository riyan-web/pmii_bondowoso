<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_komisariat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_komisariat', 'model_komisariat');
        $this->load->helper('myadmin');
    }

    public function index() {
        $data['title'] = 'Data Komisariat';
        $data['sub_judul'] 			= "Komisariat"; 
        $data['sub2_judul'] 			= "Data Komisariat";
		$data['deskripsi'] 		= "Komisariat";
        $data['pagae']		= "model_komisariat";
        $data['jumlah_komisariat'] = $this->model_komisariat->jumlahKom();
        $data['modal_komisariat'] = show_my_modal_kustom('admin/modal/mdl_komisariat', 'komisariat', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right', $data);
        $this->load->view('admin/V_komisariat', $data);
        $this->load->view('template/backend/footer', $data);
    }
    public function komisariat_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->model_komisariat->komisariat_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
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
				$datanya[] = '<a href="'.base_url('upload/komisariat/'.$row['foto']).'" target="_blank"><center><img src="'.base_url('upload/komisariat/'.$row['foto']).'" class="img-responsive" style="height:60px; width:50px" /></center></a>';
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
	
	public function komisariat_tambah() {
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('isi', 'isi', 'required');
		$this->form_validation->set_rules('singkatan', 'singkatan', 'required'); 
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			// cek nim ada atau tidak
			$cek = $this->model_komisariat->nama_cek($this->input->post('nama'));
			if ($cek > 0) {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Nama komisariat tersebut sudah terdaftar');
			}else{
				$data = array('nama' => $this->input->post('nama'),
							'isi' => $this->input->post('isi'),
							'foto' => $this->input->post('img'),
							'singkatan' => $this->input->post('singkatan')
						 );
				// upload gambar
				if (!empty($_FILES['img']['name'])) {
					$upload = $this->_do_upload();
					$data['foto'] = $upload;
				}else{
					$data['foto'] = "default.jpg";
				}

				$result = $this->model_komisariat->komisariat_tambah($data);
					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Komisariat Berhasil ditambahkan', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_err_msg('Data komisariat Gagal ditambahkan', '20px');
					}
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function komisariat_ubah($id) {
		// ini function untuk menampilkan kedalam form field 
		$data = $this->model_komisariat->komisariat_by_id($id);
		echo json_encode($data);
	}


	public function komisariat_proses_ubah() {
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('isi', 'isi', 'required');
		$this->form_validation->set_rules('singkatan', 'singkatan', 'required');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$data = array('nama' => $this->input->post('nama'),
							'isi' => $this->input->post('isi'),
							'foto' => $this->input->post('img')
						);
			if($this->input->post('remove_photo')) // jika remove photo di centang
			{
				if(file_exists('upload/komisariat/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo' && $data['remove_photo']!="default.jpg")){
					unlink('upload/komisariat/'.$this->input->post('remove_photo'));
					$data['foto'] = '';
				}
				
			}

			if(!empty($_FILES['img']['name'])){
				$upload = $this->_do_upload();
				
				//delete file
				$komisariat = $this->model_komisariat->komisariat_by_id($this->input->post('id'));
				if(file_exists('upload/komisariat/'.$komisariat->foto) && $komisariat->foto)
					unlink('upload/komisariat/'.$komisariat->foto);

				$data['foto'] = $upload;
			}else{
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
	public function komisariat_hapus() {
		$id = $_POST['id'];
		$ray = $this->model_komisariat->komisariat_by_id($_POST['id']);
		$data = array('foto' => $ray->foto );				
		if (file_exists('upload/komisariat/'.$data['foto']) && $data['foto'] && $data['foto'] !="default.jpg") {
			unlink('upload/komisariat/'.$data['foto']);
		}
		$result = $this->model_komisariat->komisariat_hapus($id);

		if ($result > 0) {
			//delete file
			
			echo show_succ_msg( 'Data Komisariat Berhasil dihapus', '20px');
		} else {
			echo show_err_msg($id.'Data Komisariat Gagal dihapus', '20px');
		}
	}
	private function _do_upload()
		{
			$config['upload_path']          = 'upload/komisariat';
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