<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {
	private $table = "tb_konten";
    // buka berita
    public function berita_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id_konten, judul, foto_artikel, tgl_buat, tb_konten.kader_id, 
        jeniskonten.nama_jenis as nama_jenis, tb_konten.kader_id, tb_konten.status 
        FROM tb_konten JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
        JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
        JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`,
        (SELECT @row := 0) r WHERE 1=1 AND subjeniskonten.nama = 'berita' AND status != 1 AND tb_konten.user_id = ".$this->session->userdata['user_id']."";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
			judul LIKE '%" . $this->db->escape_like_str($like_value) . "%'
			OR jeniskonten.nama_jenis LIKE '%" . $this->db->escape_like_str($like_value) . "%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
            1 => 'judul',
            2 => 'jeniskonten.nama_jenis',
            3 => 'tb_konten.status'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}
	public function nama_cek($nama)
    {
        return $this->db->get_where($this->table, ["judul" => $nama])->num_rows();
    }

    public function berita_tambah($data)
    {
        // $sql = "INSERT INTO ".$this->table." VALUES('', '".$data['nama']."', '".$data['isi']."', '".$data['foto']."', '".$data['singkatan']."')";

        // $this->db->query($sql);
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
	}
	
	public function berita_by_id($id)
    {
        $this->db->from($this->table);
		$this->db->where('id_konten', $id);
		$query = $this->db->get();

		return $query->row();
	}
	
	public function berita_ubah($data, $id)
	{
		return $this->db->update($this->table, $data, array('id_konten' => $id));
    }

    public function berita_hapus($id)
    {
        $this->db->delete($this->table, array('id_konten' => $id));
		return $this->db->affected_rows();
    }

    public function change_status($status, $id)
    {
        $sql = "UPDATE ".$this->table." SET status = '".$status."' WHERE id_konten = '".$id."'";
        return $this->db->query($sql);
    }
}