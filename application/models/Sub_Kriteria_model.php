<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sub_Kriteria_model extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->get('sub_kriteria');
        return $query->result();
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('sub_kriteria', $data);
        return $result;
    }

    public function update($id_sub_kriteria, $data = [])
    {
        $ubah = array(
            'id_kriteria' => $data['id_kriteria'],
            'deskripsi' => $data['deskripsi'],
            'nilai'  => $data['nilai']
        );

        $this->db->where('id_sub_kriteria', $id_sub_kriteria);
        $this->db->update('sub_kriteria', $ubah);
    }

    public function delete($id_sub_kriteria)
    {
        $this->db->where('id_sub_kriteria', $id_sub_kriteria);
        $this->db->delete('sub_kriteria');
    }

    public function get_kriteria()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }

    public function data_sub_kriteria($id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria'  ORDER BY nilai DESC;");
        return $query->result_array();
    }

    public function check_unique_deskripsi($deskripsi, $id_sub_kriteria = null)
    {
        $this->db->where('deskripsi', $deskripsi);
        if ($id_sub_kriteria) {
            $this->db->where('id_sub_kriteria !=', $id_sub_kriteria);
        }
        $query = $this->db->get('sub_kriteria');
        return $query->num_rows() == 0;
    }

    public function check_unique_nilai($nilai, $id_sub_kriteria = null)
    {
        $this->db->where('nilai', $nilai);
        if ($id_sub_kriteria) {
            $this->db->where('id_sub_kriteria !=', $id_sub_kriteria);
        }
        $this->db->where('id_kriteria', $this->input->post('id_kriteria'));
        $query = $this->db->get('sub_kriteria');
        return $query->num_rows() == 0;
    }
}
