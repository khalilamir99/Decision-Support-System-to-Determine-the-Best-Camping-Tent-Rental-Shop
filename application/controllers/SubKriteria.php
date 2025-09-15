<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SubKriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Sub_Kriteria_model');

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
        $data = [
            'page' => "Sub Kriteria",
            'list' => $this->Sub_Kriteria_model->tampil(),
            'kriteria' => $this->Sub_Kriteria_model->get_kriteria(),
        ];
        $this->load->view('sub_kriteria/index', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('id_kriteria', 'ID Kriteria', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|callback_check_unique_deskripsi');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required|callback_check_unique_nilai');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('modal_open', $this->input->post('id_kriteria'));
            $this->index();
        } else {
            $data = [
                'id_kriteria' => $this->input->post('id_kriteria'),
                'deskripsi' => $this->input->post('deskripsi'),
                'nilai' => $this->input->post('nilai')
            ];

            $this->Sub_Kriteria_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            redirect('SubKriteria');
        }
    }

    public function update($id_sub_kriteria)
    {
        $this->form_validation->set_rules('id_kriteria', 'ID Kriteria', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|callback_check_unique_deskripsi[' . $id_sub_kriteria . ']');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required|callback_check_unique_nilai[' . $id_sub_kriteria . ']');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('modal_edit_open', $id_sub_kriteria);
            $this->index();
        } else {
            $data = [
                'id_kriteria' => $this->input->post('id_kriteria'),
                'deskripsi' => $this->input->post('deskripsi'),
                'nilai' => $this->input->post('nilai')
            ];

            $this->Sub_Kriteria_model->update($id_sub_kriteria, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
            redirect('SubKriteria');
        }
    }

    public function destroy($id_sub_kriteria)
    {
        $this->Sub_Kriteria_model->delete($id_sub_kriteria);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('SubKriteria');
    }

    public function check_unique_deskripsi($deskripsi, $id_sub_kriteria = null)
    {
        if ($this->Sub_Kriteria_model->check_unique_deskripsi($deskripsi, $id_sub_kriteria)) {
            return true;
        } else {
            $this->form_validation->set_message('check_unique_deskripsi', 'Nama sub kriteria sudah ada.');
            return false;
        }
    }

    public function check_unique_nilai($nilai, $id_sub_kriteria = null)
    {
        $this->db->where('nilai', $nilai);
        if ($id_sub_kriteria) {
            $this->db->where('id_sub_kriteria !=', $id_sub_kriteria);
        }
        $this->db->where('id_kriteria', $this->input->post('id_kriteria'));
        $query = $this->db->get('sub_kriteria');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('check_unique_nilai', 'Nama sub kriteria sudah ada.');
            return false;
        }
        return true;
    }
}
