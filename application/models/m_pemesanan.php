<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getPemesanan($id){
        $where = "pemesanan.id_konsumen = ".$id;
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('konsumen', 'pemesanan.id_konsumen = konsumen.id_konsumen');
        $this->db->join('ikan', 'pemesanan.id_ikan = ikan.id_ikan');
        $this->db->join('jenis_ikan', 'ikan.id_jenis_ikan = jenis_ikan.id_jenis_ikan');
        $this->db->join('usia', 'pemesanan.id_usia = usia.id_usia');
        $this->db->join('konsisi_ikan', 'pemesanan.id_kondisi_ikan = konsisi_ikan.id_kondisi_ikan');
        $this->db->join('warna_ikan', 'pemesanan.id_warna_ikan = warna_ikan.id_warna_ikan');
        $this->db->join('isi_ikan', 'pemesanan.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $this->db->join('status', 'pemesanan.id_status_pemesanan = status.id_status_pemesanan');
        $this->db->where($where);
        $data = $this->db->get();
        return $data->result();
    }
    public function pemesananDistributor($id){
        $data = $this->db->query('SELECT *, DATE_ADD(tanggal_pesan,INTERVAL -lead_time DAY) AS tanggal_kirim FROM pemesanan p JOIN konsumen k ON p.id_konsumen = k.id_konsumen JOIN ikan i ON p.id_ikan = i.id_ikan JOIN status s ON p.id_status_pemesanan = s.id_status_pemesanan JOIN jenis_ikan j ON j.id_jenis_ikan = i.id_jenis_ikan JOIN konsisi_ikan ki ON ki.id_kondisi_ikan = p.id_kondisi_ikan JOIN usia u ON u.id_usia = p.id_usia JOIN isi_ikan ik ON ik.id_ukuran_ikan = p.id_ukuran_ikan JOIN warna_ikan w ON w.id_warna_ikan = p.id_warna_ikan JOIN drp ON p.id_ikan = drp.id_ikan WHERE id_distributor = '.$id.' AND p.id_status_pemesanan = 2 OR p.id_status_pemesanan = 4 OR p.id_status_pemesanan = 6');
        return $data->result();
    }
    public function getLeadtime($konsumen, $ikan){
        $data = $this->db->query('SELECT * FROM drp WHERE id_konsumen = '.$konsumen.' AND id_ikan = '.$ikan.' Order By id_ikan')->result_array();
        return $data[0];
    }
    public function addPemesanan($supplier, $konsumen, $ikan, $tgl, $usia, $ukuran, $kondisi, $warna, $jumlah){
        $query = array(
            'id_pemesanan' => 'null',
            'id_konsumen' => $konsumen,
            'id_supplier' => $supplier,
            'id_distributor' => 0,
            'id_ikan' => $ikan,
            'tanggal_pesan' => $tgl,
            'id_usia' => $usia,
            'id_ukuran_ikan' => $ukuran,
            'id_kondisi_ikan' => $kondisi,
            'id_warna_ikan' => $warna,
            'jumlah' => $jumlah,
            'id_status_pemesanan' => 1,
            'hasil' => null
        );
        $this->db->insert('pemesanan', $query);
    }
    public function getSupplier($id){
        $this->db->select('*');
        $this->db->from('supplier');
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
    public function getKondisi(){
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
    public function deletePemesanan($id){
        $this->db->delete('pemesanan', array('id_pemesanan' => $id));
    }
    public function getPermintaan($id){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('konsumen', 'pemesanan.id_konsumen = konsumen.id_konsumen');
        $this->db->join('ikan', 'pemesanan.id_ikan = ikan.id_ikan');
        $this->db->join('usia', 'pemesanan.id_usia = usia.id_usia');
        $this->db->join('konsisi_ikan', 'pemesanan.id_kondisi_ikan = konsisi_ikan.id_kondisi_ikan');
        $this->db->join('warna_ikan', 'pemesanan.id_warna_ikan = warna_ikan.id_warna_ikan');
        $this->db->join('isi_ikan', 'pemesanan.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $this->db->join('status', 'pemesanan.id_status_pemesanan = status.id_status_pemesanan');
        $this->db->where('pemesanan.id_status_pemesanan', 1);
        $this->db->where('pemesanan.id_supplier', $id);
        $data = $this->db->get();
        return $data->result();
    }
    public function tolakPermintaan($trans){
        $this->db->set('id_status_pemesanan', 3, FALSE);
        $this->db->where('id_pemesanan', $trans);
        $this->db->update('pemesanan');
    }
    public function validasiPermintaan($id){
        $this->db->set('id_status_pemesanan', 2, FALSE);
        $this->db->where('id_pemesanan', $id);
        $this->db->update('pemesanan');
    }
    public function batalPesan($id){
        $this->db->set('id_status_pemesanan', 5, FALSE);
        $this->db->where('id_pemesanan', $id);
        $this->db->update('pemesanan');
    }
    public function validasiDistribusi($id){
        $this->db->set('id_status_pemesanan', 6, FALSE);
        $this->db->where('id_pemesanan', $id);
        $this->db->update('pemesanan');
        $this->validasiStok($id);
    }
    public function validasiStok($id){
        $data = $this->db->query('SELECT id_ikan, id_supplier, jumlah FROM pemesanan WHERE id_pemesanan = '.$id)->result_array();
        $data1 = $this->db->query('SELECT id_stok, persediaan FROM stok WHERE id_ikan = '.$data[0]['id_ikan'].' AND id_supplier = '.$data[0]['id_supplier'].' ORDER BY persediaan DESC LIMIT 1')->result_array();
        $persediaan = $data1[0]['persediaan'] - $data[0]['jumlah'];
        $this->db->set('persediaan', $persediaan);
        $this->db->where('id_stok', $data1[0]['id_stok']);
        $this->db->update('stok');
    }
    public function ambilPesan($id){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('ikan', 'pemesanan.id_ikan = ikan.id_ikan');
        $this->db->WHERE('id_pemesanan', $id);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function ambilAspek($ikan){
        $this->db->select('kualitas, bobot_jenis, bobot_usia, bobot_ukuran, bobot_kondisi, bobot_warna');
        $this->db->from('aspek');
        $this->db->WHERE('id_ikan', $ikan);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function hitung($id, $kualitas, $nilai){
        $this->db->set('kualitas', $kualitas);
        $this->db->set('hasil', $nilai);
        $this->db->WHERE('id_pemesanan', $id);
        $this->db->update('pemesanan');
    }
    public function pesanUlang($id, $status){
        $this->db->set('id_status_pemesanan', $status);
        $this->db->WHERE('id_pemesanan', $id);
        $this->db->update('pemesanan');
    }
    public function editPemesanan($id, $ikan, $tgl, $usia, $ukuran, $kondisi, $warna, $jumlah){
        $this->db->set('id_ikan', $ikan);
        $this->db->set('tanggal_pesan', $tgl);
        $this->db->set('id_usia', $usia);
        $this->db->set('id_ukuran_ikan', $ukuran);
        $this->db->set('id_kondisi_ikan', $kondisi);
        $this->db->set('id_warna_ikan', $warna);
        $this->db->set('jumlah', $jumlah);
        $this->db->WHERE('id_pemesanan', $id);
        $this->db->update('pemesanan');
    }
    public function detailPesan($id){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('supplier', 'pemesanan.id_supplier = supplier.id_supplier');
        $this->db->join('ikan', 'pemesanan.id_ikan = ikan.id_ikan');
        $this->db->join('usia', 'pemesanan.id_usia = usia.id_usia');
        $this->db->join('isi_ikan', 'pemesanan.id_ukuran_ikan = isi_ikan.id_ukuran_ikan');
        $this->db->where('pemesanan.id_pemesanan', $id);
        $sql = $this->db->get()->result_array();
        $part = explode('-', $sql[0]['tanggal_pesan']);
        $tgl = $part[1]."-".$part[2]."-".$part[0];
        $data['id_pemesanan'] = $sql[0]['id_pemesanan'];
        $data['nama_supplier'] = $sql[0]['nama_supplier'];
        $data['id_supplier'] = $sql[0]['id_supplier'];
        $data['id_ikan'] = $sql[0]['id_ikan'];
        $data['nama_ikan'] = $sql[0]['nama_ikan'];
        $data['id_usia'] = $sql[0]['id_usia'];
        $data['ket_usia'] = $sql[0]['ket_usia'];
        $data['id_ukuran_ikan'] = $sql[0]['id_ukuran_ikan'];
        $data['ket_ukuran_ikan'] = $sql[0]['ket_ukuran_ikan'];
        $data['id_kondisi_ikan'] = $sql[0]['id_kondisi_ikan'];
        $data['id_warna_ikan'] = $sql[0]['id_warna_ikan'];
        $data['jumlah'] = $sql[0]['jumlah'];
        $data['tanggal_pesan'] = $tgl;
        return $data;
    }
    public function cekStok($supplier, $ikan){
        $sql = $this->db->query('SELECT SUM(persediaan) as persediaan FROM stok WHERE id_supplier = '.$supplier.' AND id_ikan = '.$ikan)->result_array();
        $stok = $sql[0]['persediaan'];
        return $stok;
    }
}