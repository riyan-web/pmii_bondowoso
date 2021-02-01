<?php
class M_proker extends CI_Model
{

    //ambil data proker dari database
    function get_proker_list($limit, $start)
    {
        return $this->db->query("SELECT * FROM `tb_proker` 
        JOIN `tb_user` ON `tb_proker`.`user_id` = `tb_user`.`id` WHERE `tb_user`.`komisariat_id` = 1
        ORDER BY `tb_proker`.`id` DESC", $limit, $start);
    }

    function get_count_proker_cabang()
    {
        $query_count = "SELECT  COUNT(tb_proker.id) AS jumlah_proker FROM `tb_proker` 
        JOIN `tb_user` ON `tb_user`.`id` = `tb_proker`.`user_id`
        WHERE `tb_user`.`komisariat_id` = 1
        ORDER BY `tb_proker`.`id` DESC";
        return $this->db->query($query_count)->row_array();
    }

    function get_proker_list_komisariat($limit, $start, $id_kom)
    {
        return $this->db->query("SELECT * FROM `tb_proker` 
        JOIN `tb_user` ON `tb_proker`.`user_id` = `tb_user`.`id` 
        WHERE `tb_user`.`komisariat_id` = $id_kom 
        ORDER BY `tb_proker`.`id` DESC", $limit, $start);
    }

    function get_count_by_komisariat($id_kom)
    {
        $query_count = "SELECT  COUNT(tb_proker.id) AS jumlah_proker FROM `tb_proker` 
        JOIN `tb_user` ON `tb_user`.`id` = `tb_proker`.`user_id`
        WHERE `tb_user`.`komisariat_id` = $id_kom ";
        return $this->db->query($query_count)->row_array();
    }
}
