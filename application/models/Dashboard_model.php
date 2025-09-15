<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function count_kriteria()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM kriteria");
        return $query->row()->total;
    }

    public function count_sub_kriteria()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM sub_kriteria");
        return $query->row()->total;
    }

    public function count_alternatif()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM alternatif");
        return $query->row()->total;
    }

    public function count_user()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM user");
        return $query->row()->total;
    }
}
