<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_Model {

    private $table = "pesan_pengunjung";

    public function pesan_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "SELECT (@row:=@row+1) AS nomora, id, nama, email, subject, pesan, tanggal
        FROM pesan_pengunjung,(SELECT @row := 0) r WHERE 1=1";

        $data['totalData'] = $this->db->query($sql)->num_rows();
        if (!empty($like_value)) {
            $sql .= " AND ( ";
            $sql .= "
				nama LIKE '%" . $this->db->escape_like_str($like_value) . "%'
                OR subject LIKE '%" . $this->db->escape_like_str($like_value) . "%'
			";
            $sql .= " ) "; 
        }

        $data['totalFiltered']    = $this->db->query($sql)->num_rows();

        $columns_order_by = array(
            0 => 'nomora',
            1 => 'judul',
            2 => 'jeniskonten.nama_jenis',
            3 => 'tb_konten.status'
        );

        $sql .= " ORDER BY " . $columns_order_by[$column_order] . " " . $column_dir . ", nomora ";
        $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

        $data['query'] = $this->db->query($sql);
        return $data;
    }

    public function pesan_hapus($id)
    {
        $this->db->delete($this->table, array('id' => $id));
		return $this->db->affected_rows();
    }

}