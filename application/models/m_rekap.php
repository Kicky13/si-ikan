<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function dataRekap($id){
        $where = "pemesanan.id_supplier = ".$id." AND pemesanan.id_status_pemesanan = 2 OR pemesanan.id_status_pemesanan = 4 OR pemesanan.id_status_pemesanan = 5 OR pemesanan.id_status_pemesanan = 6";
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('konsumen', 'pemesanan.id_konsumen = konsumen.id_konsumen');
        $this->db->join('ikan', 'pemesanan.id_ikan = ikan.id_ikan');
        $this->db->join('usia', 'pemesanan.id_usia = usia.id_usia');
        $this->db->join('konsisi_ikan', 'pemesanan.id_kondisi_ikan = konsisi_ikan.id_kondisi_ikan');
        $this->db->join('warna_ikan', 'pemesanan.id_warna_ikan = warna_ikan.id_warna_ikan');
        $this->db->join('isi_ikan', 'pemesanan.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $this->db->join('status', 'pemesanan.id_status_pemesanan = status.id_status_pemesanan');
        $this->db->join('distributor', 'pemesanan.id_distributor = distributor.id_distributor');
        $this->db->where($where);
        $data = $this->db->get();
        return $data->result();
    }
    public function adminRekap(){
        $where = "pemesanan.id_status_pemesanan = 2 OR pemesanan.id_status_pemesanan = 4 OR pemesanan.id_status_pemesanan = 5 OR pemesanan.id_status_pemesanan = 6";
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('supplier', 'pemesanan.id_supplier = supplier.id_supplier');
        $this->db->join('konsumen', 'pemesanan.id_konsumen = konsumen.id_konsumen');
        $this->db->join('ikan', 'pemesanan.id_ikan = ikan.id_ikan');
        $this->db->join('usia', 'pemesanan.id_usia = usia.id_usia');
        $this->db->join('konsisi_ikan', 'pemesanan.id_kondisi_ikan = konsisi_ikan.id_kondisi_ikan');
        $this->db->join('warna_ikan', 'pemesanan.id_warna_ikan = warna_ikan.id_warna_ikan');
        $this->db->join('isi_ikan', 'pemesanan.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $this->db->join('status', 'pemesanan.id_status_pemesanan = status.id_status_pemesanan');
        $this->db->join('distributor', 'pemesanan.id_distributor = distributor.id_distributor');
        $this->db->where($where);
        $data = $this->db->get();
        return $data->result();
    }
    public function deletePemesanan($id){
        $this->db->delete('pemesanan', array('id_pemesanan' => $id));
    }
    public function detailPesan($id){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('supplier', 'pemesanan.id_supplier = supplier.id_supplier');
        $this->db->join('konsumen', 'pemesanan.id_konsumen = konsumen.id_konsumen');
        $this->db->join('isi_ikan', 'pemesanan.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $this->db->join('usia', 'pemesanan.id_usia = usia.id_usia');
        $this->db->join('ikan', 'pemesanan.id_ikan = ikan.id_ikan');
        $this->db->where('pemesanan.id_pemesanan', $id);
        $sql = $this->db->get()->result_array();
        $part = explode('-', $sql[0]['tanggal_pesan']);
        $tgl = $part[1]."-".$part[2]."-".$part[0];
        $data['id_pemesanan'] = $sql[0]['id_pemesanan'];
        $data['nama_konsumen'] = $sql[0]['nama_konsumen'];
        $data['id_konsumen'] = $sql[0]['id_konsumen'];
        $data['id_ikan'] = $sql[0]['id_ikan'];
        $data['nama_ikan'] = $sql[0]['nama_ikan'];
        $data['id_usia'] = $sql[0]['id_usia'];
        $data['ket_usia'] = $sql[0]['ket_usia'];
        $data['id_ukuran_ikan'] = $sql[0]['id_ukuran_ikan'];
        $data['ket_ukuran_ikan'] = $sql[0]['ket_ukuran_ikan'];
        $data['id_kondisi_ikan'] = $sql[0]['id_kondisi_ikan'];
        $data['id_warna_ikan'] = $sql[0]['id_warna_ikan'];
        $data['jumlah'] = $sql[0]['jumlah'];
        $data['id_distributor'] = $sql[0]['id_distributor'];
        $data['tanggal_pesan'] = $tgl;
        return $data;
    }
    public function getSupplier($id){
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier', $id);
        $data = $this->db->get();
        return $data->result();
    }
    public function getdistributor($id){
        $this->db->select('*');
        $this->db->from('distributor');
        $this->db->where('id_supplier', $id);
        $data = $this->db->get();
        return $data->result();
    }
    public function getikan(){
        $this->db->select('*');
        $this->db->from('ikan');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getWarna(){
        $this->db->select('*');
        $this->db->from('warna_ikan');
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
    public function getUkuran($ikan){
        $this->db->select('*');
        $this->db->from('isi_ikan');
        $this->db->WHERE('id_ikan', $ikan);
        $data = $this->db->get();
        return $data->result();
    }
    public function getKondisi(){
        $this->db->select('*');
        $this->db->from('konsisi_ikan');
        $data = $this->db->get();
        return $data->result();
    }
    public function addDistributor($id, $distributor){
        $this->db->set('id_distributor', $distributor);
        $this->db->WHERE('id_pemesanan', $id);
        $this->db->update('pemesanan');
    }
}