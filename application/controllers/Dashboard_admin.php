<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profile PMII Bondowoso';
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
    }
}
