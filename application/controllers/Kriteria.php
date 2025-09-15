<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Kriteria_model');

        if ($this->session->userdata('id_user_level') != "1") {
?>
            <script type="text/javascript">
                alert('Anda tidak berhak mengakses halaman ini!');
                window.location = '<?php echo base_url("Dashboard"); ?>'
            </script>
<?php
        }
    }

    public function index()
    {
        $data['page'] = "Kriteria";
        $data['list'] = $this->Kriteria_model->tampil();
        $this->load->view('kriteria/index', $data);
    }

    public function create()
    {
        $data['page'] = "Kriteria";
        $this->load->view('kriteria/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|callback_check_unique_keterangan');
        $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required|callback_check_unique_kode');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric|greater_than[0]|less_than_equal_to[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['page'] = "Kriteria";
            $this->load->view('kriteria/create', $data);
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'bobot' => $this->input->post('bobot')
            ];

            $total_bobot = $this->Kriteria_model->get_total_bobot_except();
            if (($total_bobot + $data['bobot']) > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total bobot tidak boleh melebihi 1!</div>');
                redirect('Kriteria/create');
            } else {
                $this->Kriteria_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                redirect('Kriteria');
            }
        }
    }

    public function edit($id_kriteria)
    {
        $data['page'] = "Kriteria";
        $data['kriteria'] = $this->Kriteria_model->show($id_kriteria);
        $this->load->view('kriteria/edit', $data);
    }

    public function update($id_kriteria)
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|callback_check_unique_keterangan[' . $id_kriteria . ']');
        $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required|callback_check_unique_kode[' . $id_kriteria . ']');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric|greater_than[0]|less_than_equal_to[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['page'] = "Kriteria";
            $data['kriteria'] = $this->Kriteria_model->show($id_kriteria);
            $this->load->view('kriteria/edit', $data);
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'bobot' => $this->input->post('bobot')
            ];

            $total_bobot = $this->Kriteria_model->get_total_bobot_except($id_kriteria);
            if (($total_bobot + $data['bobot']) > 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total bobot tidak boleh melebihi 1!</div>');
                redirect('Kriteria/edit/' . $id_kriteria);
            } else {
                $this->Kriteria_model->update($id_kriteria, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
                redirect('Kriteria');
            }
        }
    }

    public function destroy($id_kriteria)
    {
        $this->Kriteria_model->delete($id_kriteria);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('Kriteria');
    }

    public function check_unique_keterangan($keterangan, $id_kriteria = null)
    {
        if ($this->Kriteria_model->check_unique_keterangan($keterangan, $id_kriteria)) {
            return true;
        } else {
            $this->form_validation->set_message('check_unique_keterangan', 'Nama Kriteria sudah ada');
            return false;
        }
    }

    public function check_unique_kode($kode_kriteria, $id_kriteria = null)
    {
        if ($this->Kriteria_model->check_unique_kode($kode_kriteria, $id_kriteria)) {
            return true;
        } else {
            $this->form_validation->set_message('check_unique_kode', 'Kode Kriteria sudah ada');
            return false;
        }
    }
}
