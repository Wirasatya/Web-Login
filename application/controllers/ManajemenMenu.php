<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ManajemenMenu extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'BALIKU Admin';
        $data['nama_menu'] = 'Manajemen menu';
        $data['daftar_menu'] = $this->db->get('tb_menu')->result_array();
        $data['tb_users'] = $this->db->get_where('tb_users', ['EMAIL' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('menubaru', 'MenuBaru', 'required', [
            'required' => 'Nama menu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('manajemen/manajemen_menu', $data);
            $this->load->view('templates/user_footer');
            # code...
        } else {
            $this->db->insert('tb_menu', ['NAMA_MENU' => $this->input->post('menubaru')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            menu baru telah ditambahkan</div>');
            redirect('manajemenmenu');
            # code...
        }
    }
}
