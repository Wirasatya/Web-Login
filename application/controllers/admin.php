<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'BALIKU Admin';
        $data['nama_menu'] = 'Dashboard';
        $data['tb_users'] = $this->db->get_where('tb_users', ['EMAIL' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/admin', $data);
        $this->load->view('templates/user_footer');
    }
}
