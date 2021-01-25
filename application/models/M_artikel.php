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
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'artikel' ORDER BY `tb_konten`.`id_konten` DESC", $limit, $start);
    }
    function get_count()
    {
        $query_count = "SELECT  COUNT(tb_konten.id_konten) AS jumlah_artikel FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'artikel'";

        return $this->db->query($query_count)->row_array();
    }
    function get_artikel_list_by_komisariat($limit, $start, $id_kom)
    {

        return $this->db->get("`tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'artikel' AND `tb_user`.`komisariat_id` = $id_kom
        ORDER BY `tb_konten`.`id_konten` DESC", $limit, $start);
    }
    function get_count_by_komisariat($id_kom)
    {
        $query_count = "SELECT  COUNT(tb_konten.id_konten) AS jumlah_artikel FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'artikel' AND  `tb_user`.`komisariat_id` = $id_kom";

        return $this->db->query($query_count)->row_array();
    }

    function detail_artikel($slug)
    {
        $detail = "SELECT * FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        WHERE`tb_konten`.`slug` = '$slug' ";

        return $this->db->query($detail)->row_array();
    }

    public function list_komen($id)
    {
        $sql = "SELECT tb_komentar.id, tb_komentar.parent_komentar_id, tb_komentar.komentar, tb_komentar.email, tb_komentar.date, tb_komentar.konten_id, tb_komentar.kader_id, tb_kader.nama FROM tb_komentar join tb_kader on tb_kader.id = tb_komentar.kader_id WHERE parent_komentar_id = '0' AND konten_id = " . $id . " ORDER BY tb_komentar.id DESC";
        return $this->db->query($sql)->result_array();
    }

    public function list_balas($parent, $id)
    {
        $sql = "SELECT tb_komentar.id, tb_komentar.parent_komentar_id, tb_komentar.komentar, tb_komentar.email, tb_komentar.date, tb_komentar.konten_id, tb_komentar.kader_id, tb_kader.nama FROM tb_komentar join tb_kader on tb_kader.id = tb_komentar.kader_id WHERE parent_komentar_id = " . $parent . " AND konten_id = " . $id . " ORDER BY tb_komentar.id DESC";
        return $this->db->query($sql);
    }
}
