<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAlternatif()
    {
        $query = $this->db->get('alternatif');
        return $query->result() ?: [];
    }

    public function get_kriteria()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }

    public function insertAlternatif($data)
    {
        $this->db->insert('alternatif', $data);
        return $this->db->insert_id();
    }

    public function show($id_alternatif)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        $query = $this->db->get('alternatif');
        return $query->row();
    }

    public function getAlternatifById($id)
    {
        return $this->db->get_where('alternatif', ['id_alternatif' => $id])->row();
    }

    public function updateAlternatif($id, $data)
    {
        $this->db->where('id_alternatif', $id);
        $this->db->update('alternatif', $data);
    }

    public function insertTenda($data)
    {
        $this->db->insert('tenda', $data);
        return $this->db->insert_id();
    }

    public function deleteTenda($id)
    {
        $this->db->delete('tenda', ['id_alternatif' => $id]);
    }

    public function getTendaById($id)
    {
        return $this->db->get_where('tenda', ['id_alternatif' => $id])->result();
    }

    public function delete($id)
    {
        $this->db->delete('alternatif', ['id_alternatif' => $id]);
    }

    public function check_unique_nama($nama, $id_alternatif = null)
    {
        $this->db->where('nama', $nama);
        if ($id_alternatif) {
            $this->db->where('id_alternatif !=', $id_alternatif);
        }

        $query = $this->db->get('alternatif');
        return $query->num_rows() == 0;
    }

    public function get_sub_kriteria()
    {
        $query = $this->db->get('sub_kriteria');
        return $query->result();
    }

    public function data_penilaian($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
        return $query->row_array();
    }

    public function untuk_tombol($id_alternatif)
    {
        $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif';");
        return $query->num_rows();
    }

    public function data_sub_kriteria($id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria' ORDER BY nilai DESC;");
        return $query->result_array();
    }

    public function data_nilai($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
        return $query->row_array();
    }

    public function tambah_penilaian($id_alternatif, $id_kriteria, $nilai)
    {
        $query = $this->db->simple_query("INSERT INTO penilaian VALUES (DEFAULT,'$id_alternatif','$id_kriteria',$nilai);");
        return $query;
    }

    public function edit_penilaian($id_alternatif, $id_kriteria, $nilai)
    {
        $query = $this->db->simple_query("UPDATE penilaian SET nilai=$nilai WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
        return $query;
    }
}
