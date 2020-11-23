<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {
    // buka berita
    public function berita_all_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, tb_konten.id, judul, foto_artikel, jeniskonten.nama_jenis as kategori, status, isi_konten FROM tb_konten join jeniskonten on jeniskonten.id = tb_konten.jeniskonten_id, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				kode_kartu LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR judul LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR kategori LIKE '%".$this->db->escape_like_str($like_value)."%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
            1 => 'judul',
            1 => 'kategori'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
    }
}