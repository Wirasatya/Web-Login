<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ManajemenSubmenu extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'BALIKU Admin';
        $data['nama_menu'] = 'Manajemen submenu';
        $data['tb_users'] = $this->db->get_where('tb_users', ['EMAIL' => $this->session->userdata('email')])->row_array();

        $this->load->model('menu_model');
        $data['daftar_submenu'] = $this->menu_model->getSubMenu();

        $data['daftar_menu'] = $this->db->get('tb_menu')->result_array();

        $this->form_validation->set_rules('submenubaru', 'MenuBaru', 'required', [
            'required' => 'Nama submenu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('idmenu', 'idmenu', 'required', [
            'required' => 'id menu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('urlsubmenubaru', 'UrlMenuBaru', 'required', [
            'required' => 'Url submenu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('iconsubmenubaru', 'IconsMenuBaru', 'required', [
            'required' => 'Icons submenu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('manajemen/manajemen_submenu', $data);
            $this->load->view('templates/user_footer');
            # code...
        } else {
            $data = [
                'NAMA_SUBMENU' => $this->input->post('submenubaru'),
                'MENU_ID' => $this->input->post('idmenu'),
                'URL' => $this->input->post('urlsubmenubaru'),
                'ICON' => $this->input->post('iconsubmenubaru'),
                'IS_ACTIVE' => $this->input->post('isactive'),
            ];
            $this->db->insert('tb_submenu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            menu baru telah ditambahkan</div>');
            redirect('manajemensubmenu');
            # code...
        }

        # code...
    }
}
