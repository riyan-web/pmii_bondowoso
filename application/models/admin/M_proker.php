<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_proker extends CI_Model
{
	private $table = "tb_proker";
	// buka cabang
	public function proker_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id, nama_kegiatan, jadwal_pelaksanaan, penanggung_jawab FROM tb_proker ,(SELECT @row := 0) r WHERE 1=1 AND user_id = ".$this->session->userdata['user_id']."";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				nama_kegiatan LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR jadwal_pelaksanaan LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR penganggung_jawab LIKE '%" . $this->db->escape_like_str($like_value) . "%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomora',
			1 => 'nama_kegiatan',
			2 => 'jadwal_pelaksanaan',
			3 => 'penanggung_jawab'
		);

		$sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomora ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function proker_tambah($data) {
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
    }

    public function proker_ubah($data,$id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
	}

    public function proker_by_id($id) {
        $this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
    }

    public function proker_hapus($id) {
		$this->db->delete($this->table, array('id' => $id));
		return $this->db->affected_rows();
	}
    public function nama_cek($nama) {
		return $this->db->get_where($this->table, ["nama_kegiatan" => $nama])->num_rows();
	}

}