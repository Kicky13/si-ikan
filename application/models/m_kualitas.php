<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kualitas extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getKualitas(){
        $this->db->select('*');
        $this->db->from('aspek');
        $this->db->join('jenis_ikan', 'aspek.id_jenis_ikan = jenis_ikan.id_jenis_ikan');
        $this->db->join('usia', 'aspek.id_usia = usia.id_usia');
        $this->db->join('konsisi_ikan', 'aspek.id_kondisi_ikan = konsisi_ikan.id_kondisi_ikan');
        $this->db->join('warna_ikan', 'aspek.id_warna_ikan = warna_ikan.id_warna_ikan');
        $this->db->join('isi_ikan', 'aspek.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $data = $this->db->get();
        return $data->result();
    }
    public function getDetailkualitas($id){
        $this->db->select('*');
        $this->db->from('aspek');
        $this->db->join('ikan', 'aspek.id_ikan = ikan.id_ikan');
        $this->db->join('jenis_ikan', 'aspek.id_jenis_ikan = jenis_ikan.id_jenis_ikan');
        $this->db->join('usia', 'aspek.id_usia = usia.id_usia');
        $this->db->join('konsisi_ikan', 'aspek.id_kondisi_ikan = konsisi_ikan.id_kondisi_ikan');
        $this->db->join('warna_ikan', 'aspek.id_warna_ikan = warna_ikan.id_warna_ikan');
        $this->db->join('isi_ikan', 'aspek.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $this->db->where('id_aspek', $id);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getJenis(){
        $this->db->select('*');
        $this->db->from('jenis_ikan');
        $jenis = $this->db->get();
        return $jenis->result();
    }
    public function getIkan(){
        $this->db->select('*');
        $this->db->from('ikan');
        $jenis = $this->db->get();
        return $jenis->result();
    }
    public function getUsia(){
        $this->db->select('*');
        $this->db->from('usia');
        $usia = $this->db->get();
        return $usia->result();
    }
    public function getUkuran(){
        $this->db->select('*');
        $this->db->from('isi_ikan');
        $ukuran = $this->db->get();
        return $ukuran->result();
    }
    public function getWarna(){
        $this->db->select('*');
        $this->db->from('warna_ikan');
        $warna = $this->db->get();
        return $warna->result();
    }
    public function getKondisi(){
        $this->db->select('*');
        $this->db->from('konsisi_ikan');
        $kondisi = $this->db->get();
        return $kondisi->result();
    }
    public function addAspek($kualitas, $ikan, $jenis, $bj, $usia, $bus, $ukuran, $buk, $kondisi, $bk, $warna, $bw){
        $query = array(
            'id_aspek' => 'null',
            'kualitas' => $kualitas,
            'id_ikan' => $ikan,
            'id_jenis_ikan' => $jenis,
            'bobot_jenis' => $bj,
            'id_usia' => $usia,
            'bobot_usia' => $bus,
            'id_ukuran_ikan' => $ukuran,
            'bobot_ukuran' => $buk,
            'id_kondisi_ikan' => $kondisi,
            'bobot_kondisi' => $bk,
            'id_warna_ikan' => $warna,
            'bobot_warna' => $warna
        );
        $this->db->insert('aspek', $query);
    }
    public function editAspek($id, $ikan, $jenis, $bj, $usia, $bus, $ukuran, $buk, $kondisi, $bk, $warna, $bw){
        $this->db->set('id_ikan', $ikan);
        $this->db->set('id_jenis_ikan', $jenis);
        $this->db->set('bobot_jenis', $bj);
        $this->db->set('id_usia', $usia);
        $this->db->set('bobot_usia', $bus);
        $this->db->set('id_ukuran_ikan', $ukuran);
        $this->db->set('bobot_ukuran', $buk);
        $this->db->set('id_kondisi_ikan', $kondisi);
        $this->db->set('bobot_kondisi', $bk);
        $this->db->set('id_warna_ikan', $warna);
        $this->db->set('bobot_warna', $bw);
        $this->db->where('id_aspek', $id);
        $this->db->update('aspek');
    }
    public function deleteAspek($id){
        $this->db->delete('aspek', array('id_aspek' => $id));
    }
}