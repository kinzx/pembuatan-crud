<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');

        $queryAccess = $ci->db->get_were('user', ['role_id' => $role_id]);

        if ($queryAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}