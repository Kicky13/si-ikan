<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_stok');
        $this->load->library('session');
    }
    public function stoksupplier(){
        $id = $_SESSION['id'];
        $data = $this->m_stok->getStokSupplier($id);
        $this->load->view('s_stok', array('data' => $data));
    }
    public function stokMinasari(){
        $id = 1;
        $data = $this->m_stok->getStokKonsumen($id);
        $detail = $this->m_stok->getSupplier($id);
        if ($_SESSION['tipe'] == 1) {
            $this->load->view('k_stok', array('data' => $data, 'detail' => $detail));
        } else if ($_SESSION['tipe'] == 4){
            $this->load->view('a_stok', array('data' => $data, 'detail' => $detail));
        } else {
            redirect('/login/form');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Tidak Memiliki Akses Halaman ini, harap login kembali.
                  </div>';
        }
    }
    public function stokMinajaya(){
        $id = 2;
        $data = $this->m_stok->getStokKonsumen($id);
        $detail = $this->m_stok->getSupplier($id);
        if ($_SESSION['tipe'] == 1) {
            $this->load->view('k_stok', array('data' => $data, 'detail' => $detail));
        } else if ($_SESSION['tipe'] == 4){
            $this->load->view('a_stok', array('data' => $data, 'detail' => $detail));
        } else {
            redirect('/login/form');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Tidak Memiliki Akses Halaman ini, harap login kembali.
                  </div>';
        }
    }
    public function stokMinamulya(){
        $id = 3;
        $data = $this->m_stok->getStokKonsumen($id);
        $detail = $this->m_stok->getSupplier($id);
        if ($_SESSION['tipe'] == 1) {
            $this->load->view('k_stok', array('data' => $data, 'detail' => $detail));
        } else if ($_SESSION['tipe'] == 4){
            $this->load->view('a_stok', array('data' => $data, 'detail' => $detail));
        } else {
            redirect('/login/form');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Tidak Memiliki Akses Halaman ini, harap login kembali.
                  </div>';
        }
    }
    public function formAdd(){
        $ikan = $this->m_stok->getIkan();
        $warna = $this->m_stok->getWarna();
        $kondisi = $this->m_stok->getKondisi();
        $this->load->view('s_stok_add', array('ikan' => $ikan, 'warna' => $warna, 'kondisi' => $kondisi));
    }
    public function formEdit($id){
        $data = $this->m_stok->dataStok($id);
        $ikan = $this->m_stok->getIkan();
        $warna = $this->m_stok->getWarna();
        $kondisi = $this->m_stok->getKondisi();
        $this->load->view('s_stok_edit', array('data' => $data, 'ikan' => $ikan, 'warna' => $warna, 'kondisi' => $kondisi));
    }
    public function addStok(){
        if ('submit'){
            $ikan = $_POST['ikan'];
            $warna = $_POST['warna'];
            $usia = $_POST['usia'];
            $kondisi = $_POST['kondisi'];
            $ukuran = $_POST['ukuran'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $supplier = $_SESSION['id'];
            $this->m_stok->addStok($ikan, $warna, $usia, $kondisi, $supplier, $ukuran, $stok, $harga);
            echo '<script type="text/javascript">alert("Data Berhasil Ditambahkan!.")</script>';
            $this->stoksupplier();
        }
    }
    public function editStok($id){
        if ('update'){
            $ikan = $_POST['ikan'];
            $warna = $_POST['warna'];
            $usia = $_POST['usia'];
            $kondisi = $_POST['kondisi'];
            $ukuran = $_POST['ukuran'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $this->m_stok->editStok($id, $ikan, $usia, $ukuran, $kondisi, $warna, $stok, $harga);
            echo '<script type="text/javascript">alert("Data Berhasil Diupdate!.")</script>';
            $this->stoksupplier();
        }
    }
    public function getUsia($idIkan){
        if($idIkan == ''){
            exit;
        } else {
            foreach($this->m_stok->getUsia($idIkan) as $usia){
                echo '<option value="'.$usia->id_usia.'">'.htmlentities($usia->ket_usia).'</option>';
            }
            exit;
        }
    }
    public function getUkuran($idIkan){
        if($idIkan == ''){
            exit;
        } else {
            foreach($this->m_stok->getUkuran($idIkan) as $ukuran){
                echo '<option value="'.$ukuran->id_ukuran_ikan.'">'.htmlentities($ukuran->ket_ukuran_ikan).'</option>';
            }
            exit;
        }
    }
    public function deleteStok($id){
        $this->m_stok->deleteStok($id);
        $this->stoksupplier();
    }
}
