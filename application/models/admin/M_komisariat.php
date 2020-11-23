<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_komisariat extends CI_Model {
    // buka komisariat
    public function komisariat_all() {
        return $this->db->query("SELECT * FROM tb_komisariat WHERE id != 1")->result_array();
    }

    public function komisariat_by_id($id_komisariat) {
        $this->db->from('tb_komisariat');
		$this->db->where('id',$id_komisariat);
		$query = $this->db->get();
    }
    public function komisariat_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id, nama, isi, foto FROM tb_komisariat, (SELECT @row := 0) r WHERE 1=1 AND id != 1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				kode_kartu LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR isi LIKE '%".$this->db->escape_like_str($like_value)."%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'nama'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
    }
    
    public function anggota_by_kom($id_komisariat) {
        $this->db->from('tb_kader');
		$this->db->where('komisariat_id',$id_komisariat);
		$query = $this->db->get();

		return $query->result_array();
    }
    public function jumlahKom() {
		$sql="select * from tb_komisariat WHERE id != 1";
		return $this->db->query($sql)->num_rows();
	}
    // tutup komisariat
}