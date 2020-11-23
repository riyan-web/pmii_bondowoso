<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['title'] = 'Dashboard';
        $data['sub_judul'] 	= "";
        $data['sub2_judul'] = "";
		$data['deskripsi'] 	= "Dashboard";
		$data['pagae']		= "";
        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/backend/footer', $data);
    }
}
