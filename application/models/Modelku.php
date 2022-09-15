<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modelku extends CI_Model {

    public function getData($tabel)
    {
        $lab = $this->db->get($tabel);
        return $lab;
    }

    public function tambah($tabel, $data)
    {
        $lab = $this->db->insert($tabel,$data);
        return $lab;
    }

    public function hapus($tabel,$where)
    {
        $lab = $this->db->delete($tabel,$where);
        return $lab;
    }

    public function edit($tabel,$data,$where)
    {
        $lab = $this->db->update($tabel,$data,$where);
        return $lab;
    }

    public function getData_khusus($select, $tabel, $where)
    {
        $this->db->select($select);
        $lab = $this->db->get_where($tabel, $where);
        return $lab;
    }

    public function getSum($select, $tabel, $where)
    {
        $this->db->select_sum($select);
        $lab = $this->db->get_where($tabel, $where);
        return $lab;
    }

    public function getDataJoin(){
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('category', 'item.category_id = category.category_id');
        $this->db->join('lokasi', 'item.lokasi_id = lokasi.lokasi_id');
        $query = $this->db->get();
        return $query;
    }

}