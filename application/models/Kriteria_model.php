<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }

    public function insert($data = [])
    {
        return $this->db->insert('kriteria', $data);
    }

    public function show($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $query = $this->db->get('kriteria');
        return $query->row();
    }

    public function update($id_kriteria, $data = [])
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
    }

    public function delete($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
    }

    public function get_total_bobot_except($id_kriteria = null)
    {
        $this->db->select_sum('bobot');
        if ($id_kriteria !== null) {
            $this->db->where('id_kriteria !=', $id_kriteria);
        }
        $query = $this->db->get('kriteria');
        return $query->row()->bobot;
    }

    public function check_unique_keterangan($keterangan, $id_kriteria = null)
    {
        $this->db->where('keterangan', $keterangan);
        if ($id_kriteria) {
            $this->db->where('id_kriteria !=', $id_kriteria);
        }
        $query = $this->db->get('kriteria');
        return $query->num_rows() == 0;
    }

    public function check_unique_kode($kode_kriteria, $id_kriteria = null)
    {
        $this->db->where('kode_kriteria', $kode_kriteria);
        if ($id_kriteria) {
            $this->db->where('id_kriteria !=', $id_kriteria);
        }
        $query = $this->db->get('kriteria');
        return $query->num_rows() == 0;
    }
}
