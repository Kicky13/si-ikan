<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_rekap');
        $this->load->library('session');
    }
    public function index(){
        if ($this->session->has_userdata('data')){
            if ($_SESSION['tipe'] == 2){
                $id = $_SESSION['id'];
                $data = $this->m_rekap->dataRekap($id);
                $this->load->view('s_penjualan', array('data' => $data));
            } else if ($_SESSION['tipe'] == 4){
                $data = $this->m_rekap->adminRekap();
                $this->load->view('a_rekap', array('data' => $data));
            } else {
                redirect('/login/form');
                echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Tidak Memiliki Akses Halaman ini, harap login kembali.
                  </div>';
            }
        } else {
            redirect('/login/form');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Tidak Memiliki Akses Halaman ini, harap login kembali.
                  </div>';
        }
    }
    public function getFormedit($id){
        $idsupp = $_SESSION['id'];
        $detail = $this->m_rekap->detailPesan($id);
        $supplier = $this->m_rekap->getSupplier($id);
        $ikan = $this->m_rekap->getikan();
        $warna = $this->m_rekap->getWarna();
        $kondisi = $this->m_rekap->getkondisi();
        $distributor = $this->m_rekap->getdistributor($idsupp);
//        echo '<pre>';
//            var_dump($detail['id_distributor']);
//        echo '</pre>';
        $this->load->view('s_penjualan_edit', array('supplier' => $supplier, 'ikan' => $ikan, 'warna' => $warna, 'kondisi' => $kondisi, 'detail' => $detail, 'distributor' => $distributor));
    }
    public function getUsia($idIkan){
        if($idIkan == ''){
            exit;
        } else {
            foreach($this->m_rekap->getUsia($idIkan) as $usia){
                echo '<option value="'.$usia->id_usia.'">'.htmlentities($usia->ket_usia).'</option>';
            }
            exit;
        }
    }
    public function getUkuran($idIkan){
        if($idIkan == ''){
            exit;
        } else {
            foreach($this->m_rekap->getUkuran($idIkan) as $ukuran){
                echo '<option value="'.$ukuran->id_ukuran_ikan.'">'.htmlentities($ukuran->ket_ukuran_ikan).'</option>';
            }
            exit;
        }
    }
    public function editPemesanan(){
        if ('update'){
            $id = $_POST['id'];
            $distributor = $_POST['distributor'];
            $this->m_rekap->addDistributor($id, $distributor);
            redirect('/rekap');
        }
    }
    public function deletePesan($id){
        $this->m_rekap->deletePemesanan($id);
        $this->index();
    }
}
