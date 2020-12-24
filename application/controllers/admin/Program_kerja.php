<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_kerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_proker', 'model_proker');
        $this->load->helper('myadmin'); 
    }
    public function index()
    {
        $data['title']          = 'Program Kerja ';
        $data['sub_judul'] 	    = "program kerja";
        $data['sub2_judul'] 	= "Data Program kerja";
		$data['deskripsi'] 		= "Program Kerja";
        $data['pagae']		    = "program_kerja";
        $data['modal_proker'] = show_my_modal_kustom('admin/modal/mdl_proker', 'proker', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_program_kerja');
        $this->load->view('template/backend/footer', $data);
    }

    public function proker_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->model_proker->proker_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama_kegiatan'];
			$datanya[]	= date("d-m-Y", strtotime($row['jadwal_pelaksanaan']));
			$datanya[]	= $row['penanggung_jawab'];
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="proker_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-proker" title="Hapus Data" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
			  <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail lengkap Program kerja" onclick="detail_proker('."'".$row['id']."'".')"><i class="fa fa-info-circle"></i></a>
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

    public function proker_tambah() {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('jadwal_pelaksanaan', 'Jadwal Pelaksanaan', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
		$this->form_validation->set_rules('isi', 'Deskripsi Kegiatan', 'required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			// cek nim ada atau tidak
			$cek = $this->model_proker->nama_cek($this->input->post('nama_kegiatan'));
			if ($cek > 0) {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Nama Kegiatan tersebut sudah terdaftar');
			}else{
                $jadwal_pelaksanaan = date("Y-m-d", strtotime($this->input->post('jadwal_pelaksanaan')));
				$data = array('nama_kegiatan' => $this->input->post('nama_kegiatan'),
                            'jadwal_pelaksanaan' => $jadwal_pelaksanaan,
							'isi' => $this->input->post('isi'),
							'penanggung_jawab' => $this->input->post('penanggung_jawab'),
							'foto' => $this->input->post('img'),
							'user_id' => $this->session->userdata['user_id']
						 );
				// upload gambar
				if (!empty($_FILES['img']['name'])) {
					$upload = $this->_do_upload();
					$data['foto'] = $upload;
				}else{
					$data['foto'] = "default.jpg";
				}

				$result = $this->model_proker->proker_tambah($data);
					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Program Kerja Berhasil ditambahkan', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_err_msg('Data Program Kerja Gagal ditambahkan', '20px');
					}
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
    }

    public function proker_ubah($id) {
		// ini function untuk menampilkan kedalam form field 
		$data = $this->model_proker->proker_by_id($id);
		echo json_encode($data);
    }
    
    public function proker_proses_ubah() {
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('jadwal_pelaksanaan', 'Jadwal Pelaksanaan', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
		$this->form_validation->set_rules('isi', 'Deskripsi Kegiatan', 'required');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$jadwal_pelaksanaan = date("Y-m-d", strtotime($this->input->post('jadwal_pelaksanaan')));
				$data = array('nama_kegiatan' => $this->input->post('nama_kegiatan'),
                            'jadwal_pelaksanaan' => $jadwal_pelaksanaan,
							'isi' => $this->input->post('isi'),
							'penanggung_jawab' => $this->input->post('penanggung_jawab'),
							'foto' => $this->input->post('img'),
							'user_id' => $this->session->userdata['user_id']
						 );
						 $remove_photo = $this->input->post('remove_photo');
			if($this->input->post('remove_photo')) // jika remove photo di centang
			{
				if(file_exists('upload/proker/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo' && $remove_photo="default.jpg")){
					unlink('upload/proker/'.$this->input->post('remove_photo'));
					$data['foto'] = '';
				}
				
			}

			if(!empty($_FILES['img']['name'])){
				$upload = $this->_do_upload();
				
				//delete file
				$proker = $this->model_proker->proker_by_id($this->input->post('id'));
				if(file_exists('upload/proker/'.$proker->foto) && $proker->foto)
					unlink('upload/proker/'.$proker->foto);

				$data['foto'] = $upload;
			}else{
				$data['foto'] = $this->input->post('foto_lama');
			}
			$id = $this->input->post('id');
			$result = $this->model_proker->proker_ubah($data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Program Kerja Berhasil diubah', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Program Kerja Gagal diubah', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
    }
    
    public function proker_hapus() {
		$id = $_POST['id'];
		$ray = $this->model_proker->proker_by_id($_POST['id']);
		$data = array('foto' => $ray->foto );				
		if (file_exists('upload/proker/'.$data['foto']) && $data['foto'] && $data['foto'] !="default.jpg") {
			unlink('upload/proker/'.$data['foto']);
		}
		$result = $this->model_proker->proker_hapus($id);

		if ($result > 0) {
			//delete file
			
			echo show_succ_msg( 'Data Proker Berhasil dihapus', '20px');
		} else {
			echo show_err_msg($id.'Data Proker Gagal dihapus', '20px');
		}
	}

    private function _do_upload() 
		{
			$config['upload_path']          = 'upload/proker';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
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
