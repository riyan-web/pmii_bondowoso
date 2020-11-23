<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {
    // buka cabang
    public function anggota_all() {
		$this->db->select('tb_kader.id , kode_kartu,  tb_kader.nama, alamat, no_hp, tmp_lahir, tgl_lahir, tahun_mapaba, tahun_pkd, tahun_pkl, tb_komisariat.nama as nama_komisariat, tb_kader.foto');
		$this->db->from('tb_kader');
		$this->db->join('tb_komisariat', 'tb_komisariat.id = tb_kader.komisariat_id');
		return $query = $this->db->get()->result_array();
		//  $this->db->get('tb_kader')->result_array();
    }

    public function anggota_all_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, tb_kader.id, kode_kartu, tb_kader.nama, alamat, tmp_lahir, tgl_lahir, no_hp, tahun_mapaba, tahun_pkd, tahun_pkl, tb_komisariat.nama as nama_komisariat, tb_kader.foto FROM tb_kader join tb_komisariat on tb_komisariat.id = tb_kader.komisariat_id,(SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				kode_kartu LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR alamat LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR no_hp LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			2 => 'kode_kartu',
			5 => 'nama',
			7 => 'alamat',
			6 => 'no_hp'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}
    // tutup cabang

    // buka komisariat
    public function anggota_by_kom($id_komisariat) {
        $this->db->from('tb_kader');
		$this->db->where('komisariat_id',$id_komisariat);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function anggota_by_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, tb_kader.id, kode_kartu, tb_kader.nama, alamat, tmp_lahir, tgl_lahir, no_hp, tahun_mapaba, tahun_pkd, tahun_pkl, tb_komisariat.nama as nama_komisariat, tb_kader.foto FROM tb_kader join tb_komisariat on tb_komisariat.id = tb_kader.komisariat_id ,(SELECT @row := 0) r WHERE 1=1 and komisariat_id = ".$this->session->userdata['id_komisariat']."";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				kode_kartu LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR alamat LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR no_hp LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			2 => 'kode_kartu',
			5 => 'nama',
			7 => 'alamat',
			6 => 'no_hp'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}
	// tutup komisariat
	
	public function jumlah($table) {
		$sql="select * from ".$table."";
		return $this->db->query($sql)->num_rows();
	}

	public function jumlah_by_id($table,$nama_id, $id) {
		$sql="select * from ".$table." where ".$nama_id." = ".$id."";
		return $this->db->query($sql)->num_rows();
	}

}
