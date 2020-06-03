<?php
defined('BASEPATH') or exit('No Direct script acces allowed');

class Dashboardrelawan extends CI_Controller
{
    public function index()
    {
        if (!empty($this->session->userdata('id_relawan'))) {
            $this->load->view('relawan/index');
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
