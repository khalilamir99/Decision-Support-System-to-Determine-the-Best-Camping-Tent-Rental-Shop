<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination']);
        $this->load->library('form_validation');
        $this->load->model('Alternatif_model');

        if (!$this->session->userdata('id_user_level')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['page'] = "Alternatif";
        $data['kriteria'] = $this->Alternatif_model->get_kriteria();
        $data['alternatif'] = $this->Alternatif_model->getAllAlternatif();
        $this->load->view('alternatif/index', $data);
    }

    public function create()
    {
        $data['page'] = "Alternatif";
        $this->load->view('alternatif/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|callback_check_unique_nama');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu Operasional', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['page'] = "Alternatif";
            $this->load->view('Alternatif/create', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'waktu' => $this->input->post('waktu'),
                'no_telp' => $this->input->post('no_telp'),
            ];

            $id_alternatif = $this->Alternatif_model->insertAlternatif($data);

            $kapasitas = $this->input->post('kapasitas');
            $jumlah = $this->input->post('jumlah');
            $merek = $this->input->post('merek');
            $harga = $this->input->post('harga');

            for ($i = 0; $i < count($kapasitas); $i++) {
                $dataTenda = [
                    'id_alternatif' => $id_alternatif,
                    'kapasitas' => $kapasitas[$i],
                    'jumlah' => $jumlah[$i],
                    'merek' => $merek[$i],
                    'harga' => $harga[$i],
                ];
                $this->Alternatif_model->insertTenda($dataTenda);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan!</div>');
            redirect('alternatif');
        }
    }

    public function edit($id_alternatif)
    {
        $data['page'] = "Alternatif";
        $data['alternatif'] = $this->Alternatif_model->getAlternatifById($id_alternatif);
        $this->load->view('alternatif/edit', $data);
    }

    public function update($id_alternatif)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|callback_check_unique_nama[' . $id_alternatif . ']');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu Operasional', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['page'] = "Alternatif";
            $data['alternatif'] = $this->Alternatif_model->show($id_alternatif);
            $this->load->view('alternatif/edit', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'waktu' => $this->input->post('waktu'),
                'no_telp' => $this->input->post('no_telp'),
            ];

            $this->Alternatif_model->updateAlternatif($id_alternatif, $data);
            $this->Alternatif_model->deleteTenda($id_alternatif);

            $kapasitas = $this->input->post('kapasitas');
            $jumlah = $this->input->post('jumlah');
            $merek = $this->input->post('merek');
            $harga = $this->input->post('harga');

            for ($i = 0; $i < count($kapasitas); $i++) {
                $dataTenda = [
                    'id_alternatif' => $id_alternatif,
                    'kapasitas' => $kapasitas[$i],
                    'jumlah' => $jumlah[$i],
                    'merek' => $merek[$i],
                    'harga' => $harga[$i],
                ];

                $this->Alternatif_model->insertTenda($dataTenda);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil diubah!</div>');
            redirect('alternatif');
        }
    }

    public function detail($id_alternatif)
    {
        $data['alternatif'] = $this->Alternatif_model->getAlternatifById($id_alternatif);

        if (!$data['alternatif']) {
            show_404();
        }

        $data['tenda'] = $this->Alternatif_model->getTendaById($id_alternatif);

        $data['page'] = "Alternatif";
        $this->load->view('alternatif/detail', $data);
    }

    public function destroy($id_alternatif)
    {
        $this->Alternatif_model->delete($id_alternatif);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('alternatif');
    }

    public function check_unique_nama($nama, $id_alternatif = null)
    {
        if ($this->Alternatif_model->check_unique_nama($nama, $id_alternatif)) {
            return true;
        } else {
            $this->form_validation->set_message('check_unique_nama', 'Nama alternatif sudah ada!');
            return false;
        }
    }

    public function tambah_penilaian()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');
        $i = 0;
        echo var_dump($nilai);
        foreach ($nilai as $key) {
            $this->Alternatif_model->tambah_penilaian($id_alternatif, $id_kriteria[$i], $key);
            $i++;
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
        redirect('alternatif');
    }

    public function update_penilaian()
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $id_kriteria = $this->input->post('id_kriteria');
        $nilai = $this->input->post('nilai');
        $i = 0;

        foreach ($nilai as $key) {
            $cek = $this->Alternatif_model->data_penilaian($id_alternatif, $id_kriteria[$i]);
            if ($cek == 0) {
                $this->Alternatif_model->tambah_penilaian($id_alternatif, $id_kriteria[$i], $key);
            } else {
                $this->Alternatif_model->edit_penilaian($id_alternatif, $id_kriteria[$i], $key);
            }
            $i++;
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('alternatif');
    }
}
