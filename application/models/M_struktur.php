<?php
class M_struktur extends CI_Model
{

    //ambil data artikel dari database
    function getStrukturCabang()
    {

        return $this->db->query("SELECT `tb_strukturkom`.`tipe`, `tb_kader`.`nama`, `tb_kader`.`foto` FROM `tb_strukturkom` 
        JOIN `tb_kader` ON `tb_strukturkom`.`kader_id` = `tb_kader`.`id` 
        JOIN `tb_komisariat` ON `tb_strukturkom`.`komisariat_id` = `tb_komisariat`.`id` 
        WHERE `tb_strukturkom`.`komisariat_id` = 1 ");
    }
    function getStrukturKomisariat($id_kom)
    {

        return $this->db->query("SELECT `tb_strukturkom`.`tipe`, `tb_kader`.`nama`, `tb_kader`.`foto` FROM `tb_strukturkom` 
        JOIN `tb_kader` ON `tb_strukturkom`.`kader_id` = `tb_kader`.`id` 
        JOIN `tb_komisariat` ON `tb_strukturkom`.`komisariat_id` = `tb_komisariat`.`id` 
        WHERE `tb_strukturkom`.`komisariat_id` = $id_kom ");
    }
}
