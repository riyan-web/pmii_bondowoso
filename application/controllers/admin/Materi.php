<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_materi', 'model_materi');
        $this->load->helper('myadmin'); 
    }
    public function index()
    {
        $data['title']          = 'Materi PMII ';
        $data['sub_judul'] 	    = "Materi";
        $data['sub2_judul'] 	= "Data Materi";
		$data['deskripsi'] 		= "Materi";
        $data['pagae']		    = "materi";
        $data['modal_materi'] = show_my_modal_besar('admin/modal/mdl_materi', 'materi', $data);
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('admin/V_materi');
        $this->load->view('template/backend/footer', $data);
    }

    public function materi_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->model_materi->materi_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
            $datanya[]	= $row['judul_materi'];
            $datanya[]	= $row['jenis_materi'];
			$datanya[]	= '<a target="_blank" href="'.base_url('upload/materi_pmii/'.$row['link_download']).'" ></i> '.$row['link_download'].'</a>';
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="materi_ubah('."'".$row['id_materi']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-materi" title="Hapus Data" data-id="'.$row['id_materi'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
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
    public function materi_tambah() {
        $this->form_validation->set_rules('judul', 'Judul ', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('jenis_materi', 'Jenis Materi', 'required');
        // $this->form_validation->set_rules('filenya', 'Upload File', 'required');
        $file_type=$_FILES['filenya']['type'];
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
            if (empty($_FILES['filenya']['name'])) {
                $out['status'] = 'form';
                $out['msg'] = show_err_msg('File Materi wajib  diisi');
            }else if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
                $cek = $this->model_materi->nama_cek($this->input->post('judul'));
                if ($cek > 0) {
                    $out['status'] = 'form';
                    $out['msg'] = show_err_msg('Nama Judul sudah dipakai');
                }else{
                    $data = array('judul_materi' => $this->input->post('judul'),
                                'deskripsi_materi' => $this->input->post('deskripsi'),
                                'jenis_materi' => $this->input->post('jenis_materi'),
                                'link_download' => $this->input->post('link_download'),
                            );
                    // upload file
                    if (!empty($_FILES['filenya']['name'])) {
                        $upload = $this->_do_upload();
                        $data['link_download'] = $upload;
                    }else{
                        $data['link_download'] = "default.jpg";
                    }

                    $result = $this->model_materi->materi_tambah($data);
                        if ($result > 0) {
                            $out['status'] = '';
                            $out['msg'] = show_succ_msg('Data Materi Berhasil ditambahkan', '20px');
                        } else {
                            $out['status'] = '';
                            $out['msg'] = show_err_msg('Data Materi Gagal ditambahkan', '20px');
                        }
                }
            }else {
                $out['status'] = 'form';
                $out['msg'] = show_err_msg('Hanya Boleh upload PDF, JPEG GIF'); 
            }
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
    }

    public function materi_ubah($id)
	{
		// ini function untuk menampilkan kedalam form field 
		$data = $this->model_materi->materi_by_id($id);
		echo json_encode($data);
    }
    
    public function materi_proses_ubah() {
        $this->form_validation->set_rules('judul', 'Judul ', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('jenis_materi', 'Jenis Materi', 'required');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
            $data = array('judul_materi' => $this->input->post('judul'),
                        'deskripsi_materi' => $this->input->post('deskripsi'),
                        'jenis_materi' => $this->input->post('jenis_materi'),
                        'link_download' => $this->input->post('link_download'),
                    );
			if($this->input->post('remove_photo')) // jika remove photo di centang
			{
				if(file_exists('upload/materi/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo' && $remove_photo="default.jpg")){
					unlink('upload/materi/'.$this->input->post('remove_photo'));
					$data['link_download'] = '';
				}
				
			}

			if(!empty($_FILES['filenya']['name'])){
				$upload = $this->_do_upload();
				
				//delete file
				$materi = $this->model_materi->materi_by_id($this->input->post('id'));
				if(file_exists('upload/materi_pmii/'.$materi->link_download) && $materi->link_download)
					unlink('upload/materi_pmii/'.$materi->link_download);

				$data['link_download'] = $upload;
			}else{
				$data['link_download'] = $this->input->post('file_lama');
			}
			$id = $this->input->post('id');
			$result = $this->model_materi->materi_ubah($data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Materi Berhasil diubah', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Materi Gagal diubah', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
    }

    public function materi_hapus()
	{
		$id = $_POST['id'];
		$ray = $this->model_materi->materi_by_id($_POST['id']);
		$data = array('link_download' => $ray->link_download);
		if (file_exists('upload/materi_pmii/' . $data['link_download']) && $data['link_download'] && $data['link_download'] != "default.jpg") {
			unlink('upload/materi_pmii/' . $data['link_download']);
		}
		$result = $this->model_materi->materi_hapus($id);
		if ($result > 0) {
			//delete file

			echo show_succ_msg('materi'.$ray->judul_materi.' Berhasil dihapus', '20px');
		} else {
			echo show_err_msg($id . 'Data materi Gagal dihapus', '20px');
		}
	}

    private function _do_upload() 
		{
			$config['upload_path']          = 'upload/materi_pmii';
	        $config['allowed_types']        = 'pdf|gif|jpeg';
	        $config['max_size']             = 10000; //set max size allowed in Kilobyte
	        $config['max_width']            = 10000; // set max width image allowed
	        $config['max_height']           = 10000; // set max height allowed
	        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique session_name()

	        $this->load->library('upload', $config);

	        if(!$this->upload->do_upload('filenya')) //upload and validate
	        {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Upload Gagal: '.$this->upload->display_errors('',''));
				echo json_encode($out);
				exit();
			}
			return $this->upload->data('file_name');
		}
}