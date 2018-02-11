<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getSupplier(){
        $data = $this->db->query('SELECT * FROM supplier');
        return $data->result();
    }
    public function addSupplier($nama, $alamat, $username, $password, $distributor){
        $data = array(
            'id_supplier' => 'null',
            'username' => $username,
            'password' => $password,
            'nama_supplier' => $nama,
            'alamat_supplier' => $alamat,
            'jumlah_distributor' => $distributor
        );
        $this->db->insert('supplier', $data);
    }
    public function editSupplier($id, $nama, $alamat, $username, $password, $distributor){
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('nama_supplier', $nama);
        $this->db->set('alamat_supplier', $alamat);
        $this->db->set('jumlah_distributor', $distributor);
        $this->db->where('id_supplier', $id);
        $this->db->update('supplier');
    }
    public function detailSupplier($id){
        $data = $this->db->query('SELECT * FROM supplier WHERE id_supplier = '.$id);
        return $data->result_array();
    }
}