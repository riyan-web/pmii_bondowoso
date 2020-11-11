<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Login';
        $this->load->view('admin/login', $data);
    }
}
