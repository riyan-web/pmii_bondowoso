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
		$this->load->library('cetak_pdf');
	}
	public function index() 
	{

		if ($this->session->userdata['jenis'] == 4) {
			// $data['dataAnggota'] = $this->model_anggota->anggota_all();
			// $data['jumlah_kader'] = $this->model_anggota->jumlah('tb_kader');
			$data['dataKomisariat'] = $this->model_komisariat->komisariat_all();
			$data['namaController'] = 'anggota_list';
		}

		if ($this->session->userdata['jenis'] == 3 || $this->session->userdata['jenis'] == 2) {
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
		$data['pagae']		= "data_anggota";
		$data['modal_anggota'] = show_my_modal_besar('admin/modal/mdl_anggota', 'anggota', $data);
		$this->load->view('template/backend/header', $data);
		$this->load->view('template/backend/sidebar', $data);
		$this->load->view('template/backend/right', $data);
		$this->load->view('admin/V_dataanggota', $data);
		$this->load->view('template/backend/footer', $data);
	}

	// buka cabang
	public function anggota_list()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->model_anggota->anggota_all_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$datanya = array();
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama_kader'];
			$datanya[]	= $row['alamat'];
			$datanya[]	= $row['no_hp'];
			$datanya[]	= [$row['tmp_lahir'], " " . date("d-m-Y", strtotime($row['tgl_lahir']))];
			if ($this->session->userdata['jenis'] == 4) {
				$datanya[]	= $row['nama_komisariat'];
			}
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" title="Hapus Data" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
			  <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Detail Username" onclick="detail_username(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-user"></i></a>
			  <button class="btn btn-dark btn-sm konfirmasiReset-anggota" title="Reset Username dan password kedefault" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#konfirmasiReset"><i class="fa fa-key"></i></button> 
			  <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail lengkap Anggota" onclick="detail_anggota(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-info-circle"></i></a>
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
	// tutup cabang

	// buka komisariat
	public function anggotaKom_list()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->model_anggota->anggota_by_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$datanya = array();
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama_kader'];
			$datanya[]	= $row['alamat'];
			$datanya[]	= $row['no_hp'];
			$datanya[]	= [$row['tmp_lahir'], " " . date("d-m-Y", strtotime($row['tgl_lahir']))];
			if ($this->session->userdata['jenis'] == 4) {
				$datanya[]	= $row['nama_komisariat'];
			}
			$datanya[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Ubah" onclick="anggota_ubah(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
			  <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Detail Username" onclick="detail_username(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-user"></i></a>
			  <button class="btn btn-dark btn-sm konfirmasiReset-anggota" title="Reset Username dan password kedefault" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#konfirmasiReset"><i class="fa fa-key"></i></button>
			  <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail lengkap Anggota" onclick="detail_anggota(' . "'" . $row['id'] . "'" . ')"><i class="fa fa-info-circle"></i></a>
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
	// tutup komisariat

	public function anggota_tambah()
	{
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
		$id_komisariat = $this->session->userdata['id_komisariat'];
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'Nomer HandPhone', 'trim|required|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[10]|max_length[128]');

		if ($this->form_validation->run() == TRUE) {
			$tgl = $this->input->post('tgl_lahir');
			$singkatan = $this->model_komisariat->singkatan($this->input->post('komisariat_id'));
			$kodeMax = $this->model_anggota->kode_kartumax($this->input->post('komisariat_id'));
			if ($kodeMax->kode == null) {
				$maxKode = 1;
			} else {

				$kode = (int) substr($kodeMax->kode, 10, 5);
				$maxKode = $kode + 1;
			}
			$kode_kartu = $singkatan->singkatan . date("Ymd", strtotime($tgl)) . sprintf("%05s", $maxKode);
			$tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));

			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = './upload/qr_code/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $kode_kartu . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $kode_kartu; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE



			$data = array(
				'kode_kartu' => $kode_kartu,
				'qr_code' => $image_name,
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'tmp_lahir' => $this->input->post('tmp_lahir'),
				'tgl_lahir' => $tgl_lahir,
				'tahun_mapaba' => $this->input->post('tahun_mapaba'),
				'tahun_pkd' => $this->input->post('tahun_pkd'),
				'tahun_pkl' => $this->input->post('tahun_pkl'),
				'foto' => $this->input->post('img'),
				'komisariat_id' => $this->input->post('komisariat_id')
			);
			// upload gambar 
			if (!empty($_FILES['img']['name'])) {
				$upload = $this->_do_upload();
				$data['foto'] = $upload;
			} else {
				$data['foto'] = "default.jpg";
			}
			$id = $this->model_anggota->anggota_tambah($data);
			if ($id > 0) {
				$username = $singkatan->singkatan . date("Ymd", strtotime($tgl)) . sprintf("%05s", $maxKode);
				$password = password_hash(date("Ymd", strtotime($this->input->post('tgl_lahir'))), PASSWORD_DEFAULT);
				$up = array(
					'username' => $username,
					'password' => $password,
					'tgl_update' => date('Y-m-d H:i:s'),
					'jenis' => 1,
					'komisariat_id' => $id_komisariat,
					'kader_id' => $id
				);
				$hasil = $this->model_anggota->anggota_tambah_username($up);
				if ($hasil > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Anggota dan Username Berhasil ditambahkan, silahkan cek username di tombol detail username', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Anggota Gagal ditambahkan', '20px');
				}
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

	public function anggota_ubah($id)
	{
		// ini function untuk menampilkan kedalam form field 
		$data = $this->model_anggota->anggota_by_id($id);
		echo json_encode($data);
	}

	public function anggota_proses_ubah()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'Nomer HandPhone', 'trim|required|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[10]|max_length[128]');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'tmp_lahir' => $this->input->post('tmp_lahir'),
				'tgl_lahir' => $tgl_lahir,
				'tahun_mapaba' => $this->input->post('tahun_mapaba'),
				'tahun_pkd' => $this->input->post('tahun_pkd'),
				'tahun_pkl' => $this->input->post('tahun_pkl'),
				'foto' => $this->input->post('img'),
				'komisariat_id' => $this->input->post('komisariat_id')
			);
			$remove_photo = $this->input->post('remove_photo');
			if ($this->input->post('remove_photo')) // jika remove photo di centang
			{
				if (file_exists('upload/kader/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo' && $remove_photo != "default.jpg")) {
					unlink('upload/kader/' . $this->input->post('remove_photo'));
					$data['foto'] = '';
				}
			}

			if (!empty($_FILES['img']['name'])) {
				$upload = $this->_do_upload();

				//delete file
				$anggota = $this->model_anggota->anggota_by_id($this->input->post('id'));
				if (file_exists('upload/kader/' . $anggota->foto) && $anggota->foto)
					unlink('upload/kader/' . $anggota->foto);

				$data['foto'] = $upload;
			} else {
				$data['foto'] = $this->input->post('foto_lama');
			}
			$id = $this->input->post('id');
			$result = $this->model_anggota->anggota_ubah($data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Anggota Berhasil diubah', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Anggota Gagal diubah', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
	public function anggota_hapus()
	{
		$id = $_POST['id'];
		$ray = $this->model_anggota->anggota_by_id($_POST['id']);
		$data = array('foto' => $ray->foto);
		if (file_exists('upload/kader/' . $data['foto']) && $data['foto'] && $data['foto'] != "default.jpg") {
			unlink('upload/kader/' . $data['foto']);
		}
		$result = $this->model_anggota->anggota_hapus($id);
		$hapusSer = $this->model_anggota->username_hapus($_POST['id']);
		if ($result > 0) {
			//delete file

			echo show_succ_msg('Data Anggota Berhasil dihapus', '20px');
		} else {
			echo show_err_msg($id . 'Data Anggota Gagal dihapus', '20px');
		}
	}

	public function detail_username($id)
	{
		$data = $this->model_anggota->cek_username($id);
		echo json_encode($data);
	}

	public function reset_anggota()
	{
		$id = $_POST['id'];
		$dader = $this->model_anggota->anggota_by_id($id);
		$data = array(
			'username' => $dader->kode_kartu,
			'password' => date("Ymd", strtotime($dader->tgl_lahir))
		);
		$result = $this->model_anggota->reset_user($data, $_POST['id']);
		if ($result > 0) {
			echo show_succ_msg('Data Username dan Password Berhasil di Reset', '20px');
		} else {
			echo show_err_msg($id . 'Data Username dan Password  Gagal di Reset', '20px');
		}
	}

	public function detail_anggota($id)
	{
		// ini function untuk menampilkan kedalam form field 
		$data = $this->model_anggota->detail_by_id($id);
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

		if (!$this->upload->do_upload('img')) //upload and validate
		{
			$out['status'] = 'form';
			$out['msg'] = show_err_msg('Upload Gagal: ' . $this->upload->display_errors('', ''));
			echo json_encode($out);
			exit();
		}
		return $this->upload->data('file_name');
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');

		$data['anggota'] = $this->m_anggota->tampil_data('tb_kader')->result();

		$this->load->view('laporan_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_papper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();


		$this->dompdf->stream("kartu_anggota.pdf", array('Attachment' => 0));
	}

	public function cetak()
	{
		$data = $this->model_anggota->detail_by_id($_POST['id']);
		$pdf = new FPDF('L', 'mm', array(168, 252));

		$pdf->AddPage();
		$pdf->Image('http://localhost/pmii_bondowoso/assets/backend/images/KTA_depan.jpg', 0, 0, 252, 168);
		$pdf->Image('http://localhost/pmii_bondowoso/upload/kader/' . $data->foto, 25, 54, 70, 75);
		$pdf->Ln(28);
		$pdf->SetFont('Arial', 'B', 15);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(100);
		$pdf->Cell(30, 10, 'No. Kartu : ' . $data->kode_kartu, 0, 'C');
		$pdf->Ln(13);
		$pdf->SetFont('Arial', 'B', 13);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(100);
		$pdf->Cell(30, 10, 'Nama       : ' . $data->nama_kader, 0, '1');
		$pdf->Cell(100);
		$pdf->Cell(30, 10, 'Alamat     :  ' . $data->alamat, 0, '1');
		$pdf->Cell(100);
		$pdf->Cell(30, 10, 'Tempat     : ' . $data->tmp_lahir, 0, '1');
		$pdf->Cell(100);
		$pdf->Cell(30, 10, 'Tgl Lahir  : ' . date("d-m-Y", strtotime($data->tgl_lahir)), 0, '1');
		$pdf->Cell(100);
		$pdf->Cell(30, 10, 'No Telp    : ' . $data->no_hp, 0, '1');
		$pdf->Cell(100);
		$pdf->Cell(30, 10, 'Mapaba    : ' . $data->tahun_mapaba, 0, '0');
		$pdf->Cell(10);
		$pdf->Cell(30, 10, 'PKD    : ' . $data->tahun_pkd, 0, '0');
		$pdf->Cell(10);
		$pdf->Cell(30, 10, 'PKL    : ' . $data->tahun_pkl, 0, '0');
		$pdf->Ln(6);
		$pdf->Cell(125);
		$pdf->Cell(30, 10, 'Bondowoso, ' . date('d-m-Y'), 0, '0');
		$pdf->Ln(5);
		$pdf->Cell(125);
		$pdf->Cell(30, 10, 'KETUA UMUM', 0, '1');
		$pdf->Image('http://localhost/pmii_bondowoso/assets/backend/images/ttd.png', 140, 115, 25);
		$pdf->Ln(15);
		$pdf->Cell(125);
		$pdf->Cell(30, 10, 'SAIFUL KHOIR', 0, 'L');
		$pdf->AddPage();
		$pdf->Image('http://localhost/pmii_bondowoso/assets/backend/images/KTA_belakang.jpg', 0, 0, 252, 168);

		$pdf->Image('http://localhost/pmii_bondowoso/upload/qr_code/' . $data->qr_code, 100.9, 111, 50, 50);

		$pdf->Output();
	}
}
