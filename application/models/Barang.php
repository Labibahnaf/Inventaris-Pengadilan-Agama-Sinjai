<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Model {

    public function getMutasi($idBarang = null){
        $this->db->select('m.idBarang, m.tanggal, m.transaksi, m.jml, b.nama, u.nama as namaUser');
        $this->db->from('barang b');
        $this->db->join('mutasi m', 'm.idBarang = b.id', 'left');
        $this->db->join('user u', 'u.id = m.idUser', 'left');
        $this->db->where('m.idBarang', $idBarang);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getInfoBarang(){
        $this->db->select('b.id, b.nama, b.status, bs.jmlStok');
        $this->db->from('barang b');
        $this->db->join('barangStok bs', 'bs.idBarang = b.id', 'left');
        // $this->db->join('mutasi m', 'm.idBarang = b.id', 'left');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function sumStok($select, $tabel, $where){

        // $this->db->select_sum('jml');
        // $this->db->from('mutasi m');
        // $this->db->where('m.idBarang', $idBarang);
        // $query = $this->db->get()->row_array();
        // return $query;

        $this->db->select_sum($select);
        $lab = $this->db->get_where($tabel, $where);
        return $lab;
    }

    public function sumPakai($idBarang = null){

    }
}