<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
    public function grafikSupplier(){
        $konsumen = $this->konsumen();
        $ikan = $this->ikan();
        $supplier = $_SESSION['id'];
        $nilai = array();
        foreach ($ikan as $i){
            $a = array();
            for ($k = 1; $k < 6; $k++){
                $a[] = $this->pemesanan($i['id_ikan'], $k, $supplier);
            }
            array_push($nilai, $a);
        }
        $data['nilai'] = $nilai;
        $data['konsumen'] = $konsumen;
        return $data;
    }
    public function grafikKonsumen(){
        $supplier = $this->supplier();
        $ikan = $this->ikan();
        $konsumen = $_SESSION['id'];
        $nilai = array();
        foreach ($ikan as $i){
            $a = array();
            for ($s = 1; $s < 4; $s++){
                $a[] = $this->pemesanan($i['id_ikan'], $konsumen, $s);
            }
            array_push($nilai, $a);
        }
        $data['nilai'] = $nilai;
        $data['supplier'] = $supplier;
        return $data;
    }
    public function angka($ikan, $konsumen, $supplier){
        $data = $this->db->query('SELECT * From pemesanan WHERE id_ikan = '.$ikan.' AND id_konsumen = '.$konsumen.' AND id_supplier = '.$supplier);
        return $data->num_rows();
    }
    public function pemesanan($ikan, $konsumen, $supplier){
        $data = $this->db->query('SELECT IFNULL(SUM(jumlah), 0) AS jumlah FROM pemesanan WHERE id_ikan = '.$ikan.' AND id_konsumen = '.$konsumen.' AND id_supplier = '.$supplier);
        return $data->result_array();
    }
    public function supplier(){
        $data = $this->db->query('SELECT id_supplier, nama_supplier FROM supplier');
        return $data->result_array();
    }
    public function konsumen(){
        $data = $this->db->query('SELECT id_konsumen, nama_konsumen FROM konsumen limit 6');
        return $data->result_array();
    }
    public function ikan(){
        $data = $this->db->query('SELECT id_ikan From ikan WHERE id_jenis_ikan = 1');
        return $data->result_array();
    }
}