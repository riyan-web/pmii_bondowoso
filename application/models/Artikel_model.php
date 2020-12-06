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
