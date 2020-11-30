<?php
class M_proker extends CI_Model
{

    //ambil data proker dari database
    function get_proker_list($limit, $start)
    {
        return $this->db->query("SELECT * FROM `tb_proker` 
        JOIN `tb_user` ON `tb_proker`.`user_id` = `tb_user`.`id` WHERE `tb_proker`.`user_id` = 2 
        ORDER BY `tb_proker`.`id` DESC", $limit, $start);
    }
}
