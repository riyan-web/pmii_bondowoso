<?php 

class Artikel_model extends CI_Model{
    public function tampil_data()
    {
        $sql="select * from tb_konten WHERE jeniskonten_id != 1";
        return $this->db->query($sql)->result_array();
    }
}
?>