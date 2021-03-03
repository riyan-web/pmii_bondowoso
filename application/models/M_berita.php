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
    function get_berita_beranda()
    {

        return $this->db->query("SELECT  `tb_konten`.`id_konten`, `tb_konten`.`slug`, `tb_konten`.`judul`, `tb_konten`.`isi_konten`, `tb_konten`.`foto_artikel` FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita'
        ORDER BY RAND()");
    }

    function get_berita_list_komisariat($limit, $start, $id_kom)
    {
        return $this->db->get("`tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita' AND `tb_user`.`komisariat_id` = $id_kom
        ORDER BY `tb_konten`.`id_konten` DESC", $limit, $start);
    }

    function get_count_komisariat($id_kom)
    {

        $query_count = "SELECT  COUNT(tb_konten.id_konten) AS jumlah_berita FROM `tb_konten` 
        JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
        WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita' AND  `tb_user`.`komisariat_id` = $id_kom ";

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

    function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_konten');
        $this->db->join('jeniskonten',  'jeniskonten.id = tb_konten.jeniskonten_id');
        $this->db->join('tb_user', 'tb_konten. user_id = tb_user.id');
        $this->db->join('subjeniskonten', 'jeniskonten.id = subjeniskonten.jeniskonten_id');
        $status = '2';
        $berita = 'berita';
        $this->db->where('tb_konten.status', $status);
        $this->db->where('subjeniskonten.nama', $berita);
        $this->db->like('judul', $keyword);
        $this->db->or_like('isi_konten', $keyword);
        return $this->db->get();
    }
}
