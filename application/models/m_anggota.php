<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getAnggota($id){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'konsumen.id_konsumen = transaksi.id_konsumen');
        $this->db->join('jenis_konsumen', 'jenis_konsumen.id_jenis_konsumen = konsumen.id_jenis_konsumen');
        $this->db->join('stok', 'stok.id_stok = transaksi.id_stok');
        $this->db->where('id_supplier', $id);
        $data = $this->db->get();
        return $data->result();
    }
}