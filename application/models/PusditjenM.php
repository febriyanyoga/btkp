<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class PusditjenM extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_pengguna()
    {
        $this->db->select('*');
        $this->db->from('pengguna P');
        $this->db->join('jabatan J', 'J.id_jabatan = P.id_jabatan', 'left');
        $this->db->order_by('J.id_jabatan');

        return $this->db->get();
    }

    public function get_alat()
    {
        $this->db->select('*');
        $this->db->from('jenis_alat_keselamatan');
        $this->db->order_by('nama_alat');

        return $this->db->get();
    }

    public function get_berkas()
    {
        $this->db->select('*');
        $this->db->from('berkas_perizinan');
        $this->db->order_by('nama_berkas');

        return $this->db->get();
    }

    public function update($id_pengguna, $data)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna', $data);

        return true;
    }

    public function update_alat($id_jenis_alat, $data)
    {
        $this->db->where('id_jenis_alat', $id_jenis_alat);
        $this->db->update('jenis_alat_keselamatan', $data);

        return true;
    }

    public function update_berkas($id_berkas_perizinan, $data)
    {
        $this->db->where('id_berkas_perizinan', $id_berkas_perizinan);
        $this->db->update('berkas_perizinan', $data);

        return true;
    }
}
