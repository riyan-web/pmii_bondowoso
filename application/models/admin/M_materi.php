<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_materi extends CI_Model
{
	private $table = "materi_pmii";
	// buka cabang
	public function materi_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id_materi, judul_materi, jenis_materi, link_download FROM materi_pmii ,(SELECT @row := 0) r WHERE 1=1";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				judul_materi LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR jenis_materi LIKE '%" . $this->db->escape_like_str($like_value) . "%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomora',
			1 => 'judul_materi',
			2 => 'jenis_materi'
		);

		$sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomora ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function nama_cek($nama) {
		return $this->db->get_where($this->table, ["judul_materi" => $nama])->num_rows();
    }

    public function materi_tambah($data) {
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
    }

    public function materi_by_id($id) {
        $this->db->from($this->table);
		$this->db->where('id_materi',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function materi_ubah($data,$id)
    {
        return $this->db->update($this->table, $data, array('id_materi' => $id));
    }
    
    public function materi_hapus($id) {
		$this->db->delete($this->table, array('id_materi' => $id));
		return $this->db->affected_rows();
	}
}