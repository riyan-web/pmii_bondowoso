<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('admin/M_komisariat', 'model_komisariat');
        $this->load->helper('myadmin');
    }
    public function index()
    {
        $data['title'] = 'Profile ';
        $data['sub_judul']             = "profile";
        $data['sub2_judul']             = "Profile Cabang";
        $data['deskripsi']         = "Profile";
        $data['pagae']        = "profile_cabang";
        $data['modal_komisariat'] = show_my_modal_kustom('admin/modal/mdl_komisariat', 'komisariat', $data);

        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/right');
        $this->load->view('cabang/profile_cabang');
        $this->load->view('template/backend/footer', $data);
    }

     public function komisariat_ubah($id)
    {
        // ini function untuk menampilkan kedalam form field 
        $data = $this->model_komisariat->komisariat_by_id($id);
        echo json_encode($data);
    }

    public function komisariat_proses_ubah()
    {
        $this->form_validation->set_rules('nama', 'Nama Komisariat', 'required');
        $this->form_validation->set_rules('singkatan', 'Singkatan Komisariat', 'required');
        $this->form_validation->set_rules('isi', 'Deskripsi Komisariat', 'required');
        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'isi' => $this->input->post('isi'),
                'foto' => $this->input->post('img')
            );
            if ($this->input->post('remove_photo')) // jika remove photo di centang
            {
                if (file_exists('upload/komisariat/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo' && $data['remove_photo'] != "default.jpg")) {
                    unlink('upload/komisariat/' . $this->input->post('remove_photo'));
                    $data['foto'] = '';
                }
            }

            if (!empty($_FILES['img']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $komisariat = $this->model_komisariat->komisariat_by_id($this->input->post('id'));
                if (file_exists('upload/komisariat/' . $komisariat->foto) && $komisariat->foto)
                    unlink('upload/komisariat/' . $komisariat->foto);

                $data['foto'] = $upload;
            } else {
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

    private function _do_upload()
    {
        $config['upload_path']          = 'upload/komisariat';
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
}
