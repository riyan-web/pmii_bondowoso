<?php
class M_artikel extends CI_Model
{

    //ambil data artikel dari database
    function get_artikel_list($limit, $start)
    {

        return $this->db->get("`tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = 2 AND `subjeniskonten`.`nama` = 'artikel' ORDER BY RAND()", $limit, $start);
    }
}
