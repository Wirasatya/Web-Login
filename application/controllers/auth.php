<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'email tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_lemght' => 'password terlalu pendek',
            'required' => 'password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
            # code...
        } else {
            $this->_login();
            # code...
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_users', ['EMAIL' => $email])->row_array();
        if ($user) {
            if ($user['ACTIVATED'] == 1) {
                if (password_verify($password, $user['PASSWORD'])) {
                    if ($user['ID_RULE'] == 1) {
                        $data = [
                            'email' => $user['EMAIL'],
                            'id_rule' => $user['ID_RULE']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
                        # code...
                    } else {
                        $data = [
                            'email' => $user['EMAIL'],
                            'id_rule' => $user['ID_RULE']
                        ];
                        $this->session->set_userdata($data);
                        redirect('user');
                        # code...
                    }
                    # code...
                } else {
                    $this->session->set_flashdata('message_auth', '<div class="alert alert-danger" role="alert">
                    password salah</div>');
                    redirect('auth');
                    # code...
                }

                # code...
            } else {
                $this->session->set_flashdata('message_auth', '<div class="alert alert-danger" role="alert">
                email belum teraktivasi</div>');
                redirect('auth');
                # code...
            }

            # code...
        } else {
            $this->session->set_flashdata('message_auth', '<div class="alert alert-danger" role="alert">
            email belum terdaftar</div>');
            redirect('auth');

            # code...
        }
    }
    public function register()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_users.EMAIL]', [
            'is_unique' => 'gunakan email yang lain',
            'required' => 'email tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'password tidak sama',
            'min_lemght' => 'password terlalu pendek',
            'required' => 'password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Register Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
            # code...
        } else {
            $data = [
                'ID_RULE' => 2,
                'NAME' => htmlspecialchars($this->input->post('name', true)),
                'EMAIL' => htmlspecialchars($this->input->post('email', true)),
                'NO_TELP' => '+62',
                'ALAMAT' => 'INDONESIA',
                'PASSWORD' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'PHOTO' => 'DEFAULT.img',
                'ACTIVATED' => 1,
                'CREATED' => time(),
            ];
            $this->db->insert('tb_users', $data);
            $this->session->set_flashdata('message_auth', '<div class="alert alert-success" role="alert">
            Selamat akun anda telah terbuat! silahkan aktivasi</div>');
            redirect('auth');
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_rule');
        $this->session->set_flashdata('message_auth', '<div class="alert alert-success" role="alert">
        Anda sudah keluar</div>');
        redirect('auth');
    }
}
