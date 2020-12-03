<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model
{
	private $table = "tb_kader";
	// buka cabang
	public function anggota_all()
	{
		$this->db->select('tb_kader.id , kode_kartu,  tb_kader.nama, alamat, no_hp, tmp_lahir, tgl_lahir, tahun_mapaba, tahun_pkd, tahun_pkl, tb_komisariat.nama as nama_komisariat, tb_kader.foto');
		$this->db->from('tb_kader');
		$this->db->join('tb_komisariat', 'tb_komisariat.id = tb_kader.komisariat_id');
		return $query = $this->db->get()->result_array();
		//  $this->db->get('tb_kader')->result_array();
	}

	public function anggota_all_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, tb_kader.id, kode_kartu, tb_kader.nama as nama_kader, alamat, tmp_lahir, tgl_lahir, no_hp, tahun_mapaba, tahun_pkd, tahun_pkl, tb_komisariat.nama as nama_komisariat, tb_kader.foto FROM tb_kader join tb_komisariat on tb_komisariat.id = tb_kader.komisariat_id,(SELECT @row := 0) r WHERE 1=1 ";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				tb_kader.nama LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR alamat LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR no_hp LIKE '%" . $this->db->escape_like_str($like_value) . "%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomora',
			1 => 'tb_kader.nama',
			2 => 'alamat',
			3 => 'no_hp',
			5 => 'tb_komisariat.nama'
		);

		$sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomora ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}
	// tutup cabang

	// buka komisariat
	public function anggota_by_kom($id)
	{
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function anggota_by_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, tb_kader.id, kode_kartu, tb_kader.nama as nama_kader, alamat, tmp_lahir, tgl_lahir, no_hp, tahun_mapaba, tahun_pkd, tahun_pkl, tb_komisariat.nama as nama_komisariat, tb_kader.foto FROM tb_kader join tb_komisariat on tb_komisariat.id = tb_kader.komisariat_id,(SELECT @row := 0) r WHERE 1=1 AND komisariat_id = " . $this->session->userdata['id_komisariat'] . "";
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				tb_kader.nama LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR alamat LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR no_hp LIKE '%" . $this->db->escape_like_str($like_value) . "%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomora',
			1 => 'tb_kader.nama',
			3 => 'no_hp'
		);

		$sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomora ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}
	// tutup komisariat

	public function jumlah($table)
	{
		$sql = "select * from " . $table . "";
		return $this->db->query($sql)->num_rows();
	}

	public function jumlah_by_id($table, $nama_id, $id)
	{
		$sql = "select * from " . $table . " where " . $nama_id . $id . "";
		return $this->db->query($sql)->num_rows();
	}

	public function kode_kartumax($komisariat_id)
	{
		$this->db->select_max('kode_kartu', 'kode');
		$this->db->where('komisariat_id', $komisariat_id);
		return $this->db->get($this->table)->row();
	}

	public function anggota_tambah($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
	}

	public function anggota_ubah($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}

	public function anggota_hapus($id)
	{
		$this->db->delete($this->table, array('id' => $id));
		return $this->db->affected_rows();
	}
}
