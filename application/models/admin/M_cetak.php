public function view_kartu($kode_anggota)
   	{
       $query = $this->db->query("SELECT * FROM tb_kader where kode_kartu='$kode_kartu' LIMIT 1");
       return $query->result_array();
  	}