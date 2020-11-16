<?php
function cek_akses()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $jenis = $ci->session->userdata('jenis');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['nama_menu' => $menu])->row_array();
        $menu_id = $queryMenu['id_menu'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'id_jenis' => $jenis,
            'id_menu' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('login/blocked');
        }
    }
}
