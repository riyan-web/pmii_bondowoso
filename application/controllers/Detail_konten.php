<?php

class Detail_konten extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //load the department_model
        $this->load->model('m_artikel');
        $this->load->model('m_berita');
    }

    public function artikel($slug)
    {
        $artikel = $this->db->get_where('tb_konten', ['slug' => $slug])->row_array();
        $data['artikel'] =  $artikel;
        $data['title'] = $artikel['judul'];
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/detail_artikel', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function berita($slug)
    {
        $berita = $this->db->get_where('tb_konten', ['slug' => $slug])->row_array();
        $data['berita'] =  $berita;
        $data['title'] = $berita['judul'];
        $this->load->view('template/frontend/header', $data);
        $this->load->view('template/frontend/navbar', $data);
        $this->load->view('profile_pmii/detail_berita', $data);
        $this->load->view('template/frontend/footer', $data);
    }

    public function ambil_komentar($id)
    {
        $output = '';
        $fetch = $this->m_artikel->list_komen($id);
        foreach ($fetch as $row) {
            $output = '
            <div class="media border p-3 mb-2">
              <img src="' . base_url('upload/komentar/avatar1.png') . '" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
              <div class="media-body">
              <div class="row">
                <div class="col-sm-10">
                  <h4><b>' . $row['email'] . '</b> <small> Posted on <i>' . $row['date'] . '</i></small></h4>
                  <p>' . $row['komentar'] . '</p>
                </div>
                <div class="col-sm-2" align="right">
                  <button type="button" class="btn btn-primary reply" id="' . $row['id'] . '">Reply</button>
                </div>
              </div>
              </div>
            </div>
          ';
            $output .= $this->ambil_balasan($row["id"], $id);
        }
        echo json_encode([$output]);
    }

    function ambil_balasan($id_konten, $id, $parent_id = 0, $marginleft = 0)
    {
        $output = '';
        $fetch2 = $this->m_artikel->list_balas($parent_id, $id);

        $jumlah = $fetch2->num_rows();
        if ($parent_id == 0) {
            $marginleft = 0;
        } else {
            $marginleft = $marginleft + 48;
        }

        $tingkat = $marginleft / 48 + 1;
        if ($jumlah > 0) {
            foreach ($fetch2->result_array() as $row) {
                $output .= '
                    <div class="media border p-3 mb-2" style="margin-left:' . $marginleft . 'px">
                    <img src="images/avatar2.png" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                    <div class="row">
                        <div class="col-sm-10">
                        <h4><b>' . $row["email"] . '</b> <small> Posted on <i>' . $row["date"] . '</i></small></h4>
                        <p>' . $row["komentar"] . '</p>
                        </div>';

                if ($tingkat < 4) {
                    $output .= '
                        <div class="col-sm-2" align="right">
                            <button type="button" class="btn btn-primary reply" id="' . $row["id"] . '">Reply</button>
                        </div>';
                }

                $output .= '    
                    </div>
                    </div>
                    </div>
                ';
                $output .= $this->ambil_balasan($row["id"], $id, $marginleft);
            }
        }
        return $output;
    }
}
