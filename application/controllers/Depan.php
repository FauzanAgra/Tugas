<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Depan extends CI_Controller
{
    public function index()
    {
        $this->load->view('index');
    }

    public function login()
    {
        $this->load->view('login');
    }
    public function proses_daftar_relawan()
    {
        $this->load->model('mymodel');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );

        $query = $this->mymodel->Insert('relawan', $data);
        if ($query) {
            echo "
                <script>alert('Daftar Relawan Sukses')</script>
            ";
            $this->load->view('index');
        } else {
            echo "<script>alert('Daftar Relawan Gagal')</script>
            ";
            $this->load->view('index');
        }
    }
    public function proses_login_relawan()
    {
        $this->load->model('mymodel');
        $where = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        $cek = $this->mymodel->GetWhere('relawan', $where);
        $count_cek = count($cek);
        if ($count_cek > 0) {
            $data_session = array(
                'id_relawan' => $cek[0]['id_relawan'],
                'username' => $cek[0]['username'],
                'foto' => $cek[0]['foto']
            );
            $this->session->set_userdata($data_session);
            echo "<script>alert('Login Relawan Gagal')</script>";
            redirect(base_url("index.php/dashboardrelawan"));
        } else {
            echo "<script>alert('Login Relawan Gagal')</script>";
            $this->index();
        }
    }
}
