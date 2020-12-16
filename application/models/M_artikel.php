<?php
class M_artikel extends CI_Model
{

    // ambil data artikel dari database
    function get_artikel_list($limit, $start)
    {

        return $this->db->get("`tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = 2 AND `subjeniskonten`.`nama` = 'artikel' ORDER BY RAND()", $limit, $start);
    }
    function get_count()
    {
        $query_count = "SELECT  COUNT(tb_konten.id_konten) AS jumlah_artikel FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = 2 AND `subjeniskonten`.`nama` = 'artikel'";

        return $this->db->query($query_count)->row_array();
    }
    function get_artikel_list_by_komisariat($limit, $start, $id_kom)
    {

        return $this->db->get("`tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = 2 AND `subjeniskonten`.`nama` = 'artikel' AND `tb_user`.`komisariat_id` = $id_kom  ORDER BY RAND()", $limit, $start);
    }
    function get_count_by_komisariat($id_kom)
    {
        $query_count = "SELECT  COUNT(tb_konten.id_konten) AS jumlah_artikel FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = 2 AND `subjeniskonten`.`nama` = 'artikel' AND  `tb_user`.`komisariat_id` = $id_kom";

        return $this->db->query($query_count)->row_array();
    }
}
