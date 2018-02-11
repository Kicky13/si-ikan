<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_drp extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
    public function dataDropdown($id){
        $data1 = $this->db->query('SELECT * From pemesanan p JOIN konsumen k ON k.id_konsumen = p.id_konsumen WHERE p.id_supplier = '.$id.' GROUP BY k.nama_konsumen');
        $a = $data1->result();
        $data2 = $this->db->query('SELECT * From pemesanan p JOIN ikan i ON i.id_ikan = p.id_ikan WHERE p.id_supplier = '.$id.' GROUP BY i.nama_ikan');
        $b = $data2->result();
        $data['konsumen'] = $a;
        $data['ikan'] = $b;
        return $data;
    }
    public function hitungdrp($konsumen, $ikan, $lead, $bulan, $tahun){
        $supplier = $_SESSION['id'];
        $jumlah = $this->jumlah($konsumen, $ikan, $supplier, $bulan, $tahun);
        $dev = $this->stddev($konsumen, $ikan, $supplier, $bulan, $tahun);
        $stok = $this->persediaan($ikan, $supplier);
        $ss = $this->safety($konsumen, $ikan, $supplier, $bulan, $tahun);
        $bersih = $this->kebutuhanBersih($konsumen, $ikan, $supplier, $bulan, $tahun, $stok[0]['s']);
        $pelepasan = $this->pelepasan(abs($bersih), $ss[0]['safety']);
        $data['periode'] = $tahun.'/'.$bulan;
        $data['jumlah'] = $jumlah[0]['total'];
        $data['dev'] = $dev[0]['deviasi'];
        $data['safetyStock'] = ceil($ss[0]['safety']);
        $data['stok'] = $stok[0]['s'];
        $data['bersih'] = ceil(abs($bersih));
        $data['pelepasan'] = ceil($pelepasan);
        $this->insertdrp($konsumen, $supplier, $ikan, $data['periode'], $lead, $data['safetyStock'], $data['bersih'], $data['pelepasan']);
        return $data;
    }
    public function jumlah($konsumen, $ikan, $supplier, $bulan, $tahun){
        $jumlah = $this->db->query('SELECT SUM(jumlah) AS total FROM pemesanan WHERE id_konsumen = '.$konsumen.' AND id_ikan = '.$ikan.' AND id_supplier = '.$supplier.' AND MONTH(tanggal_pesan) = '.$bulan.' AND YEAR(tanggal_pesan) = '.$tahun);
        return $jumlah->result_array();
    }
    public function stddev($konsumen, $ikan, $supplier, $bulan, $tahun){
        $stddev = $this->db->query('SELECT STDDEV(jumlah) AS deviasi FROM pemesanan WHERE id_konsumen = '.$konsumen.' AND id_ikan = '.$ikan.' AND id_supplier = '.$supplier.' AND MONTH(tanggal_pesan) = '.$bulan.' AND YEAR(tanggal_pesan) = '.$tahun);
        return $stddev->result_array();
    }
    public function safety($konsumen, $ikan, $supplier, $bulan, $tahun){
        $ss = $this->db->query('SELECT STDDEV(jumlah)*1.65 AS safety FROM pemesanan WHERE id_konsumen = '.$konsumen.' AND id_supplier = '.$supplier.' AND id_ikan = '.$ikan.' AND MONTH(tanggal_pesan) = '.$bulan.' AND YEAR(tanggal_pesan) = '.$tahun);
        return $ss->result_array();
    }
    public function persediaan($ikan, $supplier){
        $stok = $this->db->query('SELECT SUM(persediaan) AS s FROM stok WHERE id_ikan = '.$ikan.' AND id_supplier = '.$supplier);
        return $stok->result_array();
    }
    public function kebutuhanBersih($konsumen, $ikan, $supplier, $bulan, $tahun, $stok){
        $a = $this->db->query('SELECT SUM(jumlah)-STDDEV(jumlah)*1.65 AS safety FROM pemesanan WHERE id_konsumen = '.$konsumen.' AND id_supplier = '.$supplier.' AND id_ikan = '.$ikan.' AND MONTH(tanggal_pesan) = '.$bulan.' AND YEAR(tanggal_pesan) = '.$tahun);
        $b = $a->result_array();
        $bersih = $b[0]['safety'] - $stok;
        return $bersih;
    }
    public function pelepasan($bersih, $ss){
        $pelepasan = $bersih + $ss;
        return $pelepasan;
    }
    public function viewdrp(){
        $data = $this->db->query('SELECT * FROM drp d JOIN konsumen k ON k.id_konsumen = d.id_konsumen JOIN supplier s ON s.id_supplier = d.id_supplier JOIN ikan i ON i.id_ikan = d.id_ikan');
        return $data->result();
    }
    public function insertdrp($konsumen, $supplier, $ikan, $periode, $lead, $safetyStock, $bersih, $pelepasan){
        $query = array(
            'id_drp' => 'null',
            'id_konsumen' => $konsumen,
            'id_supplier' => $supplier,
            'hasil' => null,
            'id_ikan' => $ikan,
            'periode' => $periode,
            'lead_time' => $lead,
            'safety_stok' => $safetyStock,
            'kebutuhan_bersih' => $bersih,
            'jadwal_terima' => null,
            'pelepasan' => $pelepasan,
            'stok_tersisa' => null
        );
        $this->db->insert('drp', $query);
    }
    public function deleteDrp($id){
        $this->db->delete('drp', array('id_drp' => $id));
    }
}