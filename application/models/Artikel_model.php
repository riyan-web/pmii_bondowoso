<?php

class Artikel_model extends CI_Model
{
    private $table = "tb_konten";
    // buka komisariat
    public function tampil_data()
    {
        $sql = "select * from tb_konten WHERE jeniskonten_id != 1";
        return $this->db->query($sql)->result_array();
    }

    public function komisariat_by_id($id_komisariat)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id_komisariat);
        $query = $this->db->get();
        return $query->row();
    }
    public function komisariat_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "SELECT (@row:=@row+1) AS nomora, id, nama, isi, foto FROM tb_komisariat, (SELECT @row := 0) r WHERE 1=1 AND id != 1 ";

        $data['totalData'] = $this->db->query($sql)->num_rows();

        if (!empty($like_value)) {
            $sql .= " AND ( ";
            $sql .= "
				nama LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR isi LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
            $sql .= " ) ";
        }

        $data['totalFiltered']    = $this->db->query($sql)->num_rows();

        $columns_order_by = array(
            0 => 'nomora',
            1 => 'nama'
        );

        $sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomora ";
        $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

        $data['query'] = $this->db->query($sql);
        return $data;
    }

    public function anggota_by_kom($id_komisariat)
    {
        $this->db->from('tb_kader');
        $this->db->where('komisariat_id', $id_komisariat);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlahKom()
    {
        $sql = "select * from " . $this->table . " WHERE id != 1";
        return $this->db->query($sql)->num_rows();
    }

    public function nama_cek($nama)
    {
        return $this->db->get_where($this->table, ["nama" => $nama])->num_rows();
    }

    public function artikel_tambah($data)
    {
        // $sql = "INSERT INTO ".$this->table." VALUES('', '".$data['nama']."', '".$data['isi']."', '".$data['foto']."', '".$data['singkatan']."')";

        // $this->db->query($sql);
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function komisariat_hapus($id)
    {
        $this->db->delete($this->table, array('id' => $id));
        return $this->db->affected_rows();
    }

    public function komisariat_ubah($data, $id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    public function singkatan($komisariat_id)
    {
        $this->db->select('singkatan', 'singkatan');
        $this->db->where('id', $komisariat_id);
        return $this->db->get('tb_komisariat')->row();
    }
    // tutup komisariat
}
