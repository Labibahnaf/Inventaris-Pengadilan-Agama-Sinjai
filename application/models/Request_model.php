<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model {

    public function getReq(){
        $this->db->select('r.id, u.nama, b.nama as namaBarang, r.jml, r.komentar, r.tanggal, rs.nama as namaStatus, r.status, r.pesan');
        $this->db->from('request r');
        $this->db->join('user u', 'u.id = r.idUser', 'left');
        $this->db->join('barang b', 'b.id = r.idBarang', 'left');
        $this->db->join('request_status rs', 'rs.id = r.status', 'left');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getReqUser($idUser = null){
        $this->db->select('r.id, u.nama, b.nama as namaBarang, r.jml, r.komentar, r.tanggal, rs.nama as namaStatus, r.status, r.pesan');
        $this->db->from('request r');
        $this->db->join('user u', 'u.id = r.idUser', 'left');
        $this->db->join('barang b', 'b.id = r.idBarang', 'left');
        $this->db->join('request_status rs', 'rs.id = r.status', 'left');
        $this->db->where('u.id', $idUser);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getReqId($id = null){
        $this->db->select('r.id, u.nama, b.nama as namaBarang, r.jml, r.komentar, r.tanggal, rs.nama as namaStatus, r.status, r.idBarang, r.idUser');
        $this->db->from('request r');
        $this->db->join('user u', 'u.id = r.idUser', 'left');
        $this->db->join('barang b', 'b.id = r.idBarang', 'left');
        $this->db->join('request_status rs', 'rs.id = r.status', 'left');
        $this->db->where('r.id', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
}