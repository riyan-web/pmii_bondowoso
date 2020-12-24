<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_anggota', 'model_anggota');
        $this->load->model('admin/M_komisariat', 'model_komisariat');
        $this->load->helper('myadmin');
    }
    public function index() {
        
        if($this->session->userdata['jenis'] == 4) {
            // $data['dataAnggota'] = $this->model_anggota->anggota_all();
            $data['jumlah_kader'] = $this->model_anggota->jumlah('tb_kader');
            $data['dataKomisariat'] = $this->model_komisariat->komisariat_all();
            $data['namaController'] = 'anggota_list';
        }

        if($this->session->userdata['jenis'] == 3) {
            $id_komisariat = $this->session->userdata['id_komisariat'];
            $data['namaController'] = 'anggotaKom_list';
            $data['jumlah_kader'] = $this->model_anggota->jumlah_by_id('tb_kader', 'komisariat_id', $id_komisariat);
            // $data['dataAnggota'] = $this->model_anggota->anggota_by_kom($id_komisariat);
            // $data['dataKomisariat'] = $this->model_komisariat->komisariat_by_id($id_komisariat);
        }
        $data['title'] = 'Data anggota'; 
        $data['sub_judul'] 			= "Anggota";
        $data['sub2_judul'] 			= "Data Anggota";
		$data['deskripsi'] 		= "Anggota";
        $data['pagae']		= "model_anggota";
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
		$fetch			= $this->model_anggota->anggota_all_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama_kader'];
			$datanya[]	= $row['alamat'];
			$datanya[]	= $row['no_hp'];
			$datanya[]	= [$row['tmp_lahir']," ".date("d-m-Y", strtotime($row['tgl_lahir']))];
            if($this->session->userdata['jenis'] == 4 ){
                $datanya[]	= $row['nama_komisariat'];
            }
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" title="Hapus Data" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
			  <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Detail Username" onclick="detail_username('."'".$row['id']."'".')"><i class="fa fa-user"></i></a>
			  <a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Reset Password" onclick="reset_anggota('."'".$row['id']."'".')"><i class="fa fa-key"></i></a>  
			  <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail lengkap Anggota" onclick="detail_anggota('."'".$row['id']."'".')"><i class="fa fa-info-circle"></i></a>
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
    // tutup cabang
 
    // buka komisariat
    public function anggotaKom_list() {
        $requestData	= $_REQUEST;
		$fetch			= $this->model_anggota->anggota_by_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);	
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama_kader'];
			$datanya[]	= $row['alamat'];
			$datanya[]	= $row['no_hp'];
 			$datanya[]	= [$row['tmp_lahir']," ".date("d-m-Y", strtotime($row['tgl_lahir']))];
            if($this->session->userdata['jenis'] == 4 ){
                $datanya[]	= $row['nama_komisariat'];
            }
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah('."'".$row['id']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
			  <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Detail Username" onclick="detail_username('."'".$row['id']."'".')"><i class="fa fa-user"></i></a>
			  <a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Reset Password" onclick="reset_anggota('."'".$row['id']."'".')"><i class="fa fa-key"></i></a>  
			  <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail lengkap Anggota" onclick="detail_anggota('."'".$row['id']."'".')"><i class="fa fa-info-circle"></i></a>
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
    // tutup komisariat

	public function anggota_tambah() {
		$this->form_validation->set_rules('nama_kader', 'nama_kader', 'required');
		$this->form_validation->set_rules('tmp_lahir', 'tmp_lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required|min_length[10]|max_length[15]');


		if ($this->form_validation->run() == TRUE) {
			$tgl =$this->input->post('tgl_lahir');
			$singkatan = $this->model_komisariat->singkatan($this->input->post('komisariat_id'));
			$kodeMax = $this->model_anggota->kode_kartumax($this->input->post('komisariat_id'));
			if ($kodeMax->kode == null) {
				$maxKode = 1;
			}else{
				
				$kode = (int) substr($kodeMax->kode,10,5);
				$maxKode = $kode + 1;
			}		
			$kode_kartu = $singkatan->singkatan.date("Ymd", strtotime($tgl)).sprintf("%05s",$maxKode);
			$tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
			$password = date("Ymd",strtotime($this->input->post('tgl_lahir'))); 
			$data = array('kode_kartu' => $kode_kartu,
							'nama_kader' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'no_hp' => $this->input->post('no_hp'),
							'tmp_lahir' => $this->input->post('tmp_lahir'),
							'tgl_lahir' => $tgl_lahir,
							'tahun_mapaba' => $this->input->post('tahun_mapaba'),
							'tahun_pkd' => $this->input->post('tahun_pkd'),
							'tahun_pkl' => $this->input->post('tahun_pkl'),
							'foto_kader' => $this->input->post('img'),
							'komisariat_id' => $this->input->post('komisariat_id'),
							'password' => $password
						 );
			// upload gambar
			if (!empty($_FILES['img']['name'])) {
				$upload = $this->_do_upload();
				$data['foto_kader'] = $upload;
			}else{
				$data['ffoto_kaderoto'] = "default.jpg";
			}
			$result = $this->model_anggota->anggota_tambah($data);
					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Kader <b>'. $this->input->post('nama').'</b> Berhasil ditambahkan', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_err_msg('Data Anggota Gagal ditambahkan', '20px');
					}
		 } else {
		 	$out['status'] = 'form';
		 	$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function anggota_ubah($id) {
		// ini function untuk menampilkan kedalam form field 
		$data = $this->model_anggota->anggota_by_kom($id);
		echo json_encode($data);
	}

	public function anggota_proses_ubah() {
		$this->form_validation->set_rules('nama_kader', 'nama_kader', 'required');
		$this->form_validation->set_rules('tmp_lahir', 'tmp_lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required|min_length[10]|max_length[15]');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
			$data = array('nama_kader' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'no_hp' => $this->input->post('no_hp'),
							'tmp_lahir' => $this->input->post('tmp_lahir'),
							'tgl_lahir' => $tgl_lahir,
							'tahun_mapaba' => $this->input->post('tahun_mapaba'),
							'tahun_pkd' => $this->input->post('tahun_pkd'),
							'tahun_pkl' => $this->input->post('tahun_pkl'),
							'foto_kader' => $this->input->post('img'),
							'komisariat_id' => $this->input->post('komisariat_id')
						);
			$remove_photo = $this->input->post('remove_photo');
			if($this->input->post('remove_photo')) // jika remove photo di centang
			{
				if(file_exists('upload/kader/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo' && $remove_photo !="default.jpg")){
					unlink('upload/kader/'.$this->input->post('remove_photo'));
					$data['fotfoto_kadero'] = '';
				}
				
			}

			if(!empty($_FILES['img']['name'])){
				$upload = $this->_do_upload();
				
				//delete file
				$anggota = $this->model_anggota->anggota_by_kom($this->input->post('id'));
				if(file_exists('upload/kader/'.$anggota->foto) && $anggota->foto)
					unlink('upload/kader/'.$anggota->foto);

				$data['foto_kader'] = $upload;
			}else{
				$data['foto_kader'] = $this->input->post('foto_lama');
			}
			$id = $this->input->post('id');
			$result = $this->model_anggota->anggota_ubah($data, $id);

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
	public function anggota_hapus() {
		$id = $_POST['id'];
		$ray = $this->model_anggota->anggota_by_kom($_POST['id']);
		$data = array('foto_kader' => $ray->foto );				
		if (file_exists('upload/kader/'.$data['foto_kader']) && $data['foto_kader'] && $data['foto'] !="default.jpg") {
			unlink('upload/kader/'.$data['foto_kader']);
		}
		$result = $this->model_anggota->anggota_hapus($id);

		if ($result > 0) {
			//delete file
			
			echo show_succ_msg( 'Data Komisariat Berhasil dihapus', '20px');
		} else {
			echo show_err_msg($id.'Data Komisariat Gagal dihapus', '20px');
		}
	}

	public function detail_username($id){
		$data = $this->model_anggota->anggota_by_kom($id);
		echo json_encode($data);
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/kader';
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

	public function pdf(){
		$this->load->library('dompdf_gen');

		$data['anggota'] = $this->m_anggota->tampil_data('tb_kader')->result();

		$this->load->view('laporan_pdf',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_papper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("kartu_anggota.pdf", array('Attachment' =>0));
	}
}