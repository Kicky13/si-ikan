<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_pemesanan');
        $this->load->library('session');
    }
    public function index(){
        if ($this->session->has_userdata('data')){
            if ($_SESSION['tipe'] == 1){
                $idk = $_SESSION['id'];
                $data = $this->m_pemesanan->getPemesanan($idk);
                $this->load->view('k_pemesanan', array('data' => $data));
            } else if ($_SESSION['tipe'] == 2){
                $id = $_SESSION['id'];
                $load = $this->m_pemesanan->getPermintaan($id);
                $this->load->view('s_validasi_pesan', array('data' => $load));
            } else {
                $id = $_SESSION['id'];
                $load = $this->m_pemesanan->pemesananDistributor($id);
                $this->load->view('d_pemesanan', array('data' => $load));
            }
        } else {
            redirect('/login/form');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> User tidak Ditemukan.
                  </div>';
        }
    }
    public function getUsia($idIkan){
        if($idIkan == ''){
            exit;
        } else {
            foreach($this->m_pemesanan->getUsia($idIkan) as $usia){
                echo '<option value="'.$usia->id_usia.'">'.htmlentities($usia->ket_usia).'</option>';
            }
            exit;
        }
    }
    public function getDetail($id){
        $this->m_pemesanan->getDetailPemesanan($id);
        exit;
    }
    public function getUkuran($idIkan){
        if($idIkan == ''){
            exit;
        } else {
            foreach($this->m_pemesanan->getUkuran($idIkan) as $ukuran){
                echo '<option value="'.$ukuran->id_ukuran_ikan.'">'.htmlentities($ukuran->ket_ukuran_ikan).'</option>';
            }
            exit;
        }
    }
    public function getForm($id){
        $supplier = $this->m_pemesanan->getSupplier($id);
        $ikan = $this->m_pemesanan->getikan();
        $warna = $this->m_pemesanan->getWarna();
        $kondisi = $this->m_pemesanan->getkondisi();
        $this->load->view('k_pemesanan_add', array('supplier' => $supplier, 'ikan' => $ikan, 'warna' => $warna, 'kondisi' => $kondisi));
    }
    public function getFormedit($id){
        $detail = $this->m_pemesanan->detailPesan($id);
        $supplier = $this->m_pemesanan->getSupplier($id);
        $ikan = $this->m_pemesanan->getikan();
        $warna = $this->m_pemesanan->getWarna();
        $kondisi = $this->m_pemesanan->getkondisi();
        $this->load->view('k_pemesanan_edit', array('supplier' => $supplier, 'ikan' => $ikan, 'warna' => $warna, 'kondisi' => $kondisi, 'detail' => $detail));
    }
    public function addPemesanan(){
        if ('submit'){
            $supplier = $_POST['supplier'];
            $ikan = $_POST['ikan'];
            $part = explode("/", $_POST['tanggalpemesanan']);
            $tgl = $part[2]."/".$part[0]."/".$part[1];
            $konsumen = $_SESSION['id'];
            $usia = $_POST['usia'];
            $kondisi = $_POST['kondisi'];
            $ukuran = $_POST['ukuran'];
            $warna = $_POST['warna'];
            $jumlah = $_POST['jumlah'];
            $this->m_pemesanan->addPemesanan($supplier, $konsumen, $ikan, $tgl, $usia, $ukuran, $kondisi, $warna, $jumlah);
            redirect('/pemesanan');
        }
    }
    public function cekStok(){
        $supplier = $_POST['supplier'];
        $ikan = $_POST['ikan'];
        $jumlah = $_POST['jumlah'];
        $cekStok = $this->m_pemesanan->cekStok($supplier, $ikan);
        if ($jumlah > $cekStok){
            echo 'Jumlah yang dipesan melebihi batas Stok';
        } else {
            echo 'Jumlah yang dipesan Ada';
        }
    }
    public function editPemesanan(){
        if ('update'){
            $id = $_POST['id'];
            $ikan = $_POST['ikan'];
            $part = explode("/", $_POST['tanggalpemesanan']);
            $tgl = $part[2]."/".$part[0]."/".$part[1];
            $usia = $_POST['usia'];
            $kondisi = $_POST['kondisi'];
            $ukuran = $_POST['ukuran'];
            $warna = $_POST['warna'];
            $jumlah = $_POST['jumlah'];
            $this->m_pemesanan->editPemesanan($id, $ikan, $tgl, $usia, $ukuran, $kondisi, $warna, $jumlah);
            redirect('/pemesanan');
        }
    }
    public function deletePesan($id, $url){
            $this->m_pemesanan->deletePemesanan($id);
            redirect('/'.$url);
    }
    public function tolak($id){
        $this->m_pemesanan->tolakPermintaan($id);
        $this->index();
    }
    public function validasi($id){
        $this->m_pemesanan->validasiPermintaan($id);
        $this->index();
    }
    public function batalPesan($id){
        $this->m_pemesanan->batalPesan($id);
        $this->index();
    }
    public function validasiKirim($id){
        $this->m_pemesanan->validasiDistribusi($id);
        $this->index();
    }
    public function pesanUlang($id){
        $status = 4;
        $this->m_pemesanan->pesanUlang($id, $status);
        $this->index();
    }
    public function analisaIkan($id, $ikan){
        $pesan = $this->m_pemesanan->ambilPesan($id);
        $aspek = array_values($this->m_pemesanan->ambilAspek($ikan));
        $jenis = $pesan[0]['id_jenis_ikan'];
        $usia = $pesan[0]['id_usia'];
        $ukuran = $pesan[0]['id_ukuran_ikan'];
        $kondisi = $pesan[0]['id_kondisi_ikan'];
        $warna = $pesan[0]['id_warna_ikan'];
        switch ($jenis) {
            case 1:
                $bj = 2;
                break;
            default:
                $bj = 1;
                break;
        }
        switch ($warna) {
            case 1:
                $bw = 2;
                break;
            default:
                $bw = 1;
                break;
        }
        switch ($kondisi) {
            case 1:
                $bk = 3;
                break;
            case 2:
                $bk = 2;
                break;
            default:
                $bk = 1;
                break;
        }
        if ($ikan == 1){
            switch ($usia) {
                case 1:
                    $bus = 3;
                    break;
                case 2:
                    $bus = 2;
                    break;
                default:
                    $bus = 1;
                    break;
            }
            switch ($ukuran) {
                case 1:
                    $buk = 3;
                    break;
                case 2:
                    $buk = 2;
                    break;
                default:
                    $buk = 1;
                    break;
            }
        } else if ($ikan == 2){
            switch ($usia) {
                case 4:
                    $bus = 3;
                    break;
                case 5:
                    $bus = 2;
                    break;
                default:
                    $bus = 1;
                    break;
            }
            switch ($ukuran) {
                case 4:
                    $buk = 4;
                    break;
                case 5:
                    $buk = 3;
                    break;
                case 6:
                    $buk = 2;
                    break;
                default:
                    $buk = 1;
                    break;
            }
        } else if ($ikan == 3){
            switch ($usia) {
                case 7:
                    $bus = 3;
                    break;
                case 8:
                    $bus = 2;
                    break;
                default:
                    $bus = 1;
                    break;
            }
            switch ($ukuran) {
                case 8:
                    $buk = 3;
                    break;
                case 9:
                    $buk = 2;
                    break;
                default:
                    $buk = 1;
                    break;
            }
        } else {
            switch ($usia) {
                case 10:
                    $bus = 3;
                    break;
                case 11:
                    $bus = 2;
                    break;
                default:
                    $bus = 1;
                    break;
            }
            switch ($ukuran) {
                case 11:
                    $buk = 3;
                    break;
                case 12:
                    $buk = 2;
                    break;
                default:
                    $buk = 1;
                    break;
            }
        }
        $objek = array($bj, $bus, $buk, $bk, $bw);
        $selisih = $this->gap($aspek, $objek);
        $nilaiBobot = $this->bobot($selisih);
        $kriteria = $this->csFactor($nilaiBobot);
        $hasil = $this->total($kriteria);
        $max = 0;
        foreach ($hasil as $test){
            if ($max < $test['total']){
                $max = $test['total'];
                $kualitas = $test['nama'];
            } else {
                $max = $max;
                $kualitas = $kualitas;
            }
        }
        $this->m_pemesanan->hitung($id, $kualitas, $max);
        redirect('/pemesanan');
    }
    function total($kriteria = array()){
        if(!empty($kriteria)){
            $ttl=array();
            foreach ($kriteria as $key => $f) {
                $temp=array(
                    "nama"=>$f['ID'],
                    "total"=>(((60/100)*$f['CF'])+((40/100)*$f['SF']))
                );
                array_push($ttl, $temp);
            }
            return $ttl;

        }else{
            echo "<br>Nilai Core Factor atau Secondary Factor Masih Kosong";
        }
    }
    function csFactor( $bobot = array()){
        if(!empty($bobot)){
            //core factor (CF) index 1,2, dan 3
            //secondary factor (SF) index 4 dan 5
            $factor=array();
            foreach ($bobot as $key => $bbt) {
                $nama=$bbt[0];
                $CF=($bbt[1]+$bbt[2]+$bbt[3])/3;
                $SF=($bbt[4]+$bbt[5])/2;
                $temp=array(
                    "ID"=>$nama,
                    "CF"=>$CF,
                    "SF"=>$SF
                );
                array_push($factor, $temp);
            }
            return $factor;
        }else{
            echo "<br>Bobot Masih Kosong";
        }
    }
    function bobot($nilai = array()){

        if(!empty($nilai)){
            $tempBobot=array();
            foreach ($nilai as $value) {
                $temp=array();
                foreach ($value as $index => $gap) {
                    if($index > 0){
                        if($gap==0){
                            $temp[]=5;
                        }else if($gap==1){
                            $temp[]=4.5;
                        }else if($gap==-1){
                            $temp[]=4;
                        }else if($gap==2){
                            $temp[]=3.5;
                        }else if($gap==-2){
                            $temp[]=3;
                        }else if($gap==3){
                            $temp[]=2.5;
                        }else if($gap==-3){
                            $temp[]=2;
                        }else if($gap==4){
                            $temp[]=1.5;
                        }else if($gap==-4){
                            $temp[]=1;
                        }
                    }else{
                        $temp[]=$gap;
                    }
                }
                array_push($tempBobot, $temp);
            }
            return $tempBobot;
        }else{
            echo "<br> Nilai Selisih Gap Masih Kosong";
        }
    }
    function gap($aspek = array(), $objek = array()){
        if(!empty($aspek) && !empty($objek)){
            $selisih=array();
            foreach ($aspek as $set) {
                $temp=array();
                $set = array_values($set);
                foreach ($set as $index => $data) {
                    if($index > 0){
                        $temp[]=$objek[($index - 1)]-$data;
                    }else{
                        $temp[]=$data;
                    }
                }
                array_push($selisih, $temp);

            }

            return $selisih;

        }else{
            echo "<br> Dataset dan Batas masih Kosong";
        }
    }
}
