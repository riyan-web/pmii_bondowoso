<?php
class M_proker extends CI_Model
{

    //ambil data artikel dari database
    function get_proker_list($limit, $start)
    {
        return $this->db->get("`tb_proker` 
        JOIN `tb_user` ON  `tb_proker`.`user_id` = `tb_user`.`id`
        WHERE`tb_proker`.`user_id` = 2 ", $limit, $start);
    }
}
