<?php
defined('BASEPATH') or exit('No Direct script acces allowed');

class Data_api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mymodel');
    }
    function index()
    {
        $id_relawan = $this->input->get('id_relawan');
        if ($id_relawan == '') {
            $relawan = $this->mymodel->Get('relawan');
        } else {
            $relawan = $this->mymodel->GetWhere('relawan', array('id_relawan' => $id_relawan));
        }
        echo json_encode($relawan);
    }

    function daftar_relawan()
    {
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];
        $query = $this->mymodel->Insert('relawan', $data);

        if ($query) {
            $hasil = array('status' => 'Berhasil daftar Relawan');
            echo json_encode($hasil);
        } else {
            $hasil = array('status' => 'Gagal daftar Relawan');
            echo json_encode($hasil);
        }
    }

    function update_username_relawan()
    {
        $data = array(
            'username' => $this->input->post('username')
        );
        $where = array(
            'id_relawan' => $this->input->post('id_relawan')
        );

        $query = $this->mymodel->Update('relawan', $data, $where);

        if ($query) {
            $hasil = array('status' => 'Berhasil Edit Username Relawan');
            echo json_encode($hasil);
        } else {
            $hasil = array('status' => 'Gagal Edit Username Relawan');
            echo json_encode($hasil);
        }
    }

    function hapus_relawan($id_relawan)
    {
        $id_relawan = array(
            'id_relawan' => $id_relawan
        );
        $query = $this->mymodel->Delete('relawan', $id_relawan);
        if ($query) {
            $hasil = array('status' => 'Berhasil Hapus Relawan');
            echo json_encode($hasil);
        } else {
            $hasil = array('status' => 'Gagal Hapus Relawan');
            echo json_encode($hasil);
        }
    }
}
