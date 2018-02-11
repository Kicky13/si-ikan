<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_distributor extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function dataDistributor($id){
        $data = $this->db->query('SELECT * FROM distributor WHERE id_supplier = '.$id)->result();
        return $data;
    }
    public function getDetail($id){
        $data = $this->db->query('SELECT * FROM distributor WHERE id_distributor = '.$id)->result_array();
    }
    public function addDistributor($nama, $username, $password){
        $data = array(
            'id_distributor' => null,
            'nama_distributor' => $nama,
            'username' => $username,
            'password' => $password
        );
        $this->db->insert('distributor', $data);
    }
    public function editDistributor($id, $nama, $username, $password){
        $this->db->set('nama_distributor', $nama);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->where('id_distributor', $id);
        $this->db->update('distributor');
    }
    public function deleteDistributor($id){
        $data = array(
            'id_distributor' => $id
        );
        $this->db->delete('distributor', $data);
    }
}