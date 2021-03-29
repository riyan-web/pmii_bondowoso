<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rayon extends CI_Model {
    private $table = "tb_komisariat";

    public function rayon_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, tb_komisariat.id, tb_komisariat.nama AS namanya, tb_komisariat.foto, tb_hubungan.rayon_id FROM tb_hubungan join tb_komisariat on tb_komisariat.id = tb_hubungan.rayon_id , (SELECT @row := 0) r WHERE 1=1 AND tb_hubungan.komisariat_id = " . $this->session->userdata['id_komisariat'] . "";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				tb_komisariat.nama LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'tb_komisariat.nama'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}
	public function nama_cek($nama) {
		return $this->db->get_where($this->table, ["nama" => $nama])->num_rows();
	}

	public function rayon_tambah($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function rayon_tambah_user($data){
		$this->db->insert('tb_user', $data);
	}

	public function rayon_tambah_hub($data){
		$this->db->insert('tb_hubungan', $data);
		return $this->db->affected_rows();
	}
}
    