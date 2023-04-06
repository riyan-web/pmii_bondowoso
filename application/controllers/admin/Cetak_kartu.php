<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_kartu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }

    public function cetakkartu($kode_anggota) 
    {  
	 //set a value for $kode_anggota
 
	// Load all views as normal
	$data['title'] = "Data Anggota";
	$data['kartu_anggota'] = $this->a_model->view_kartu($kode_anggota);
	$this->load->view('cetak-kartu', $data);
	// Get output html
	$html = $this->output->get_output();

	// Load library
	$this->load->library('dompdf_gen');

	// Convert to PDF
	$this->dompdf->load_html($html);
	$this->dompdf->render();
    $this->dompdf->stream("cetak-kartu" . ".pdf", array ('Attachment' => 0));
    }

}