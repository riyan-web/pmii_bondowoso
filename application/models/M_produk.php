<?php
class M_produk extends CI_Model
{

    // ambil data artikel dari database
    function get_produk_list($limit, $start)
    {
        return $this->db->get("`tb_produk` ", $limit, $start);
    }
    function get_count()
    {
        $query_count = "SELECT  COUNT(tb_produk.id) AS jumlah_produk FROM `tb_produk` ";

        return $this->db->query($query_count)->row_array();
    }
}
