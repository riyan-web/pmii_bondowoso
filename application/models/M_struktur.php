<?php
class M_struktur extends CI_Model
{

    function getStrukturKomisariat($id_kom)
    {

        return $this->db->query("SELECT  `tb_strukturkom`.`id` AS id_struk,`tb_strukturkom`.`tipe`,`tb_strukturkom`.`kader_id`, `tb_kader`.`id` AS id_kader, `tb_kader`.`nama`, `tb_kader`.`foto` FROM `tb_strukturkom` 
        JOIN `tb_kader` ON `tb_strukturkom`.`kader_id` = `tb_kader`.`id` 
        JOIN `tb_komisariat` ON `tb_strukturkom`.`komisariat_id` = `tb_komisariat`.`id` 
        WHERE `tb_strukturkom`.`komisariat_id` = $id_kom ");
    }
    function getStrukturRayon($id_kom)
    {

        return $this->db->query("SELECT  `tb_strukturray`.`id` AS id_struk,`tb_strukturray`.`tipe`, `tb_strukturray`.`kader_id`, `tb_kader`.`id` AS id_kader, `tb_kader`.`nama`, `tb_kader`.`foto` FROM `tb_strukturray` 
        JOIN `tb_kader` ON `tb_strukturray`.`kader_id` = `tb_kader`.`id` 
        JOIN `tb_rayon` ON `tb_strukturray`.`rayon_id` = `tb_rayon`.`id` 
        WHERE `tb_strukturray`.`rayon_id` = $id_kom ");
    }
}
