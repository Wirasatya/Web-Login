<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['nama_menu'] = 'BALIKU Profile';
        $data['tb_users'] = $this->db->get_where('tb_users', ['EMAIL' => $this->session->userdata('email')])->row_array();
        if ($data['tb_users']['ID_RULE'] == 1) {
            $data['title'] = 'BALIKU Admin';
            # code...
        } else {
            $data['title'] = 'BALIKU';
            # code...
        }
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/v_member', $data);
        $this->load->view('templates/user_footer');
    }
}
