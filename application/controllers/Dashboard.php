<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Dashboard_model');

        if (!$this->session->userdata('id_user_level')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'page' => 'Dashboard',
            'jumlah_kriteria' => $this->Dashboard_model->count_kriteria(),
            'jumlah_sub_kriteria' => $this->Dashboard_model->count_sub_kriteria(),
            'jumlah_alternatif' => $this->Dashboard_model->count_alternatif(),
            'jumlah_user' => $this->Dashboard_model->count_user()
        );

        $this->load->view('admin/dashboard', $data);
    }
}
