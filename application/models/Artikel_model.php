<?php 

class Artikel_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function tampil_data()
    {
        $sql="select * from tb_konten WHERE jeniskonten_id != 1";
        return $this->db->query($sql)->result_array();
    }
}
?>