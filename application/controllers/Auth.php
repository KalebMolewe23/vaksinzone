<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_daerah');
    }

    public function index()
    {
        if ($this->session->userdata('email')) { //fungsi session adalah fungsi untuk menyeleksi setiap user yang melakukan login/register
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); //untuk validasi user yang melakukan login sesuai id yang terdaftar sesuai email
        $this->form_validation->set_rules('password', 'Password', 'trim|required'); //untuk validasi user yang melakukan login sesuai id yang terdaftar sesuai password
        if ($this->form_validation->run() == false) { //jika data salah maka akan terarah ke login/tampilan login
            $data['title'] = 'Form Login';
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/footer');
        } else {
            $this->_login(); //variabel jika data login benar
        }
    }

    private function _login()
    { // validasi misalkan login benar/data saat login benar
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) { // 2 adalah user customer penjual ataupun pembeli
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) { //jika role id 1 yang terpanggil maka tampilan admin yang akan ditampilkan
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else { //misal data tidak sesuai ketika login maupun registrasi
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!!! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Tidak Aktif!!! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Tidak Ada!!! </div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_user', 'nama_user', 'required|trim');
        $this->form_validation->set_rules('kontak', 'kontak', 'required|trim|is_unique[user.kontak]', [
            'is_unique' => 'Nomor Sudah Terdaftar!!!']);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Terdaftar!!!'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password ke2 Salah!',
            'min_length' => 'Password Terlalu Kecil!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Registrasi';
            $x['kecamatan'] = $this->m_daerah->get_kelurahan();
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/register', $x);
            $this->load->view('auth/templates/footer');
        } else {
            $datauser = [
                'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $datauser);
            $this->session->set_flashdata('message', '<div class="alert-success" role="alert">Selamat!!! Akun Berhasil Terdaftar. Silahkan Login.</div>');
            redirect('auth');
        }
    }

    public function logout()
    { //fungsi untuk logout
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil LogOut</div>');
        redirect('auth');
    }

    public function blocked(){
        $this->load->view('auth/block');
    }
}
