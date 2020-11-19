<?php
class M_artikel extends CI_Model
{

    //ambil data artikel dari database
    function get_artikel_list($limit, $start)
    {
        $query = $this->db->get('tb_artikel', $limit, $start);
        return $query;
    }
}
