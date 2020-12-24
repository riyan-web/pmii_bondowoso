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

    public function artikel_all_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "SELECT (@row:=@row+1) AS nomora, id_konten, judul, isi_konten, foto_artikel, tgl_buat, tb_konten.kader_id, 
        jeniskonten.nama_jenis as nama_jenis, tb_kader.nama as nama_kader 
        FROM tb_konten join tb_kader on tb_kader.id = tb_konten.kader_id
        JOIN jeniskonten ON  tb_konten.jeniskonten_id = jeniskonten.id
        JOIN subjeniskonten ON jeniskonten.id = subjeniskonten.jeniskonten_id,
        (SELECT @row := 0) r WHERE 1=1 AND subjeniskonten.nama = 'artikel' ";

        $data['totalData'] = $this->db->query($sql)->num_rows();
        if (!empty($like_value)) {
            $sql .= " AND ( ";
            $sql .= "
				judul LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR isi_konten LIKE '%" . $this->db->escape_like_str($like_value) . "%'
                OR jeniskonten.nama_jenis LIKE '%" . $this->db->escape_like_str($like_value) . "%'  
                OR tb_kader.nama LIKE '%" . $this->db->escape_like_str($like_value) . "%'  
			";
            $sql .= " ) "; 
        }

        $data['totalFiltered']    = $this->db->query($sql)->num_rows();

        $columns_order_by = array(
            0 => 'nomora',
            1 => 'judul',
            2 => 'isi_konten',
            3 => 'jeniskonten.nama_jenis',
            5 => 'tb_kader.nama'
        );

        $sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomora ";
        $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

        $data['query'] = $this->db->query($sql);
        return $data;
    }

    public function nama_cek($nama)
    {
        return $this->db->get_where($this->table, ["judul" => $nama])->num_rows();
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
