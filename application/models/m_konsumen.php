<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsumen extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getKonsumen(){
        $this->db->select('*');
        $this->db->from('konsumen');
        $this->db->join('jenis_konsumen', 'jenis_konsumen.id_jenis_konsumen = konsumen.id_jenis_konsumen');
        $data = $this->db->get();
        return $data->result();
    }
    public function getKonsumendetail($id){
        $this->db->select('*');
        $this->db->from('konsumen');
        $this->db->join('jenis_konsumen', 'jenis_konsumen.id_jenis_konsumen = konsumen.id_jenis_konsumen');
        $this->db->where('id_konsumen', $id);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getJenis(){
        $this->db->select('*');
        $this->db->from('jenis_konsumen');
        $data = $this->db->get();
        return $data->result();
    }
    public function cekUser($user){
        $sql = $this->db->query('SELECT * from konsumen WHERE username = "'.$user.'"')->num_rows();
        return $sql;
    }
    public function addKonsumen($user, $jenis, $pass, $nama, $alamat){
        $data = array(
            'id_konsumen' => 'null',
            'username' => $user,
            'id_jenis_konsumen' => $jenis,
            'password' => $pass,
            'nama_konsumen' => $nama,
            'alamat_konsumen' => $alamat
        );
        $this->db->insert('konsumen', $data);
    }
    public function editKonsumen($id, $user, $jenis, $pass, $nama, $alamat){
        $this->db->set('username', $user);
        $this->db->set('id_jenis_konsumen', $jenis);
        $this->db->set('password', $pass);
        $this->db->set('nama_konsumen', $nama);
        $this->db->set('alamat_konsumen', $alamat);
        $this->db->where('id_konsumen', $id);
        $this->db->update('konsumen');
    }
    public function deleteKonsumen($id){
        $this->db->delete('drp', array('id_konsumen' => $id));
        $this->db->delete('pemesanan', array('id_konsumen' => $id));
        $this->db->delete('konsumen', array('id_konsumen' => $id));
    }
}