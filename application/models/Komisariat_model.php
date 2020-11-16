<?php
class Komisariat_model{
    private $db;

    function __cunstruct(){
        $this->db = new Database;
    }

    public function getAllAnggota(){
     return $this->db->get($this->tb_kader)
    }
}


?>