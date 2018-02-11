<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function loginKonsumen($username, $password){
        $konsumen = $this->db->query('SELECT * from konsumen WHERE username = "'.$username.'" AND password = "'.$password.'"')->num_rows();
        return $konsumen;
    }
    public function getidKonsumen($username, $password){
        $id = $this->db->query('SELECT * from konsumen JOIN jenis_konsumen jk ON konsumen.id_jenis_konsumen = jk.id_jenis_konsumen WHERE username = "'.$username.'" AND password = "'.$password.'"');
        return $id->result_array();
    }
    public function loginSupplier($username, $password){
        $supplier = $this->db->query('SELECT * from supplier WHERE username = "'.$username.'" AND password = "'.$password.'"')->num_rows();
        return $supplier;
    }
    public function getidSupplier($username, $password){
        $id = $this->db->query('SELECT * from supplier WHERE username = "'.$username.'" AND password = "'.$password.'"');
        return $id->result_array();
    }
    public function loginDistributor($username, $password){
        $dis = $this->db->query('SELECT * from distributor WHERE username = "'.$username.'" AND password = "'.$password.'"')->num_rows();
        return $dis;
    }
    public function getidDistributor($username, $password){
        $id = $this->db->query('SELECT * from distributor WHERE username = "'.$username.'" AND password = "'.$password.'"');
        return $id->result_array();
    }
    public function loginAdmin($username, $password){
        $admin = $this->db->query('SELECT * from admin WHERE username = "'.$username.'" AND password = "'.$password.'"')->num_rows();
        return $admin;
    }
    public function getidAdmin($username, $password){
        $id = $this->db->query('SELECT * from admin WHERE username = "'.$username.'" AND password = "'.$password.'"');
        return $id->result_array();
    }
    public function getJenis(){
        $jenis = $this->db->query('SELECT * from jenis_konsumen');
        return $jenis->result_array();
    }
    public function addKonsumen($user, $jenis, $pass, $nama, $alamat){
        $query = array(
            'id_konsumen' => 'null',
            'username'   => $user,
            'id_jenis_konsumen' => $jenis,
            'password'  => $pass,
            'nama_konsumen' => $nama,
            'alamat_konsumen' => $alamat
        );
        $this->db->insert('konsumen', $query);
    }
    public function addSupplier($user, $pass, $nama){
        $query = array(
            'id_supplier' => 'null',
            'username'   => $user,
            'password'  => $pass,
            'nama_supplier' => $nama
        );
        $this->db->insert('supplier', $query);
    }
}