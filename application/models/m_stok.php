<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stok extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getStokSupplier($id){
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->join('ikan', 'ikan.id_ikan = stok.id_ikan');
        $this->db->join('jenis_ikan', 'jenis_ikan.id_jenis_ikan = ikan.id_jenis_ikan');
        $this->db->join('usia', 'usia.id_usia = stok.id_usia');
        $this->db->join('warna_ikan', 'warna_ikan.id_warna_ikan = stok.id_warna_ikan');
        $this->db->join('isi_ikan', 'isi_ikan.id_ukuran_ikan = stok.id_ukuran_ikan');
        $this->db->join('konsisi_ikan', 'konsisi_ikan.id_kondisi_ikan = stok.id_kondisi_ikan');
        $this->db->where('id_supplier', $id);
        $data = $this->db->get();
        return $data->result();
    }
    public function getIkan(){
        $this->db->select('*');
        $this->db->from('ikan');
        $data = $this->db->get();
        return $data->result();
    }
    public function getUsia($ikan){
        $this->db->select('*');
        $this->db->from('usia');
        $this->db->WHERE('id_ikan', $ikan);
        $data = $this->db->get();
        return $data->result();
    }
    public function getWarna(){
        $this->db->select('*');
        $this->db->from('warna_ikan');
        $data = $this->db->get();
        return $data->result();
    }
    public function getkondisi(){
        $this->db->select('*');
        $this->db->from('konsisi_ikan');
        $data = $this->db->get();
        return $data->result();
    }
    public function getUkuran($ikan){
        $this->db->select('*');
        $this->db->from('isi_ikan');
        $this->db->WHERE('id_ikan', $ikan);
        $data = $this->db->get();
        return $data->result();
    }
    public function getStokKonsumen($id){
        $data = $this->db->query('SELECT *, SUM(persediaan) as jstok FROM stok JOIN ikan ON stok.id_ikan = ikan.id_ikan WHERE id_supplier = '.$id.' GROUP BY stok.id_ikan');
        return $data->result();
    }
    public function getSupplier($id){
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier', $id);
        $data = $this->db->get();
        return $data->result();
    }
    public function dataStok($id){
        $data = $this->db->query('SELECT * from stok s JOIN ikan i ON i.id_ikan = s.id_ikan JOIN jenis_ikan j ON j.id_jenis_ikan = i.id_jenis_ikan JOIN usia u ON u.id_usia = s.id_usia JOIN isi_ikan uk ON uk.id_ukuran_ikan = s.id_ukuran_ikan JOIN warna_ikan w ON w.id_warna_ikan = s.id_warna_ikan JOIN konsisi_ikan k ON k.id_kondisi_ikan = s.id_kondisi_ikan WHERE id_stok ='.$id);
        return $data->result_array();
    }
    public function cekIkan($nama, $jenis){
        $data = $this->db->query('SELECT id_ikan from ikan WHERE nama_ikan = "'.$nama.'" AND id_jenis_ikan ='.$jenis)->num_rows();
        return $data;
    }
    public function getId($nama){
        $data = $this->db->query('SELECT id_ikan from ikan WHERE nama_ikan = "'.$nama.'"');
        return $data->result_array();
    }
    public function addStok($ikan, $warna, $usia, $kondisi, $supplier, $ukuran, $stok, $harga){
        $query = array(
            'id_stok' => 'null',
            'id_ikan' => $ikan,
            'id_supplier' => $supplier,
            'id_usia' => $usia,
            'id_ukuran_ikan' => $ukuran,
            'id_kondisi_ikan' => $kondisi,
            'id_warna_ikan' => $warna,
            'persediaan' => $stok,
            'harga' => $harga,
            'kualitas' => null
        );
        $this->db->insert('stok', $query);
    }
    public function editStok($id, $ikan, $usia, $ukuran, $kondisi, $warna, $stok, $harga){
        $this->db->set('id_ikan', $ikan);
        $this->db->set('id_usia', $usia);
        $this->db->set('id_ukuran_ikan', $ukuran);
        $this->db->set('id_kondisi_ikan', $kondisi);
        $this->db->set('id_warna_ikan', $warna);
        $this->db->set('persediaan', $stok);
        $this->db->set('harga', $harga);
        $this->db->where('id_stok', $id);
        $this->db->update('stok');
    }
    public function deleteStok($id){
        $this->db->delete('stok', array('id_stok' => $id));
    }
}