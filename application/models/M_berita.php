<?php
class M_berita extends CI_Model
{

    //ambil data artikel dari database
    function get_berita_list($limit, $start)
    {

        return $this->db->get("`tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita'
        ORDER BY `tb_konten`.`id_konten` DESC", $limit, $start);
    }

    function get_berita_list_komisariat($limit, $start, $id_kom)
    {

        return $this->db->get("`tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id` 
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita'  AND `tb_user`.`komisariat_id` = $id_kom
        ORDER BY `tb_konten`.`id_konten` DESC", $limit, $start);
    }

    function get_count_komisariat($id_kom)
    {
        $query_count = "SELECT  COUNT(tb_konten.id_konten) AS jumlah_berita FROM `tb_konten`  
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita' AND `tb_user`.`komisariat_id` = $id_kom ";

        return $this->db->query($query_count)->row_array();
    }


    function get_count()
    {
        $query_count = "SELECT  COUNT(tb_konten.id_konten) AS jumlah_berita FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita'";

        return $this->db->query($query_count)->row_array();
    }
    function detail_berita($id_konten)
    {
        $detail = "SELECT * FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        WHERE`tb_konten`.`id_konten` = $id_konten ";

        return $this->db->query($detail)->row_array();
    }
}
