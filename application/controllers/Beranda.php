<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profile PMII Bondowoso';
        $this->load->view('profile_pmii/index');
        $this->load->view('template/navbar', $data);
    }
}
