<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kualitas extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_kualitas');
    }
    public function index(){
        $data = $this->m_kualitas->getKualitas();
        $this->load->view('s_kualitas', array('data' => $data));
    }
    public function formEdit($id){
        $detail = $this->m_kualitas->getDetailkualitas($id);
        $ikan = $this->m_kualitas->getIkan();
        $jenis = $this->m_kualitas->getJenis();
        $usia = $this->m_kualitas->getUsia();
        $ukuran = $this->m_kualitas->getUkuran();
        $warna = $this->m_kualitas->getWarna();
        $kondisi = $this->m_kualitas->getKondisi();
        $this->load->view('s_kualitas_edit', array('detail' => $detail, 'ikan' => $ikan, 'jenis' => $jenis, 'usia' => $usia, 'ukuran' => $ukuran, 'warna' => $warna, 'kondisi' => $kondisi));
    }
    public function formAddkualitas(){
        $ikan = $this->m_kualitas->getIkan();
        $jenis = $this->m_kualitas->getJenis();
        $usia = $this->m_kualitas->getUsia();
        $ukuran = $this->m_kualitas->getUkuran();
        $warna = $this->m_kualitas->getWarna();
        $kondisi = $this->m_kualitas->getKondisi();
        $this->load->view('s_kualitas_add', array('ikan' => $ikan, 'jenis' => $jenis, 'usia' => $usia, 'ukuran' => $ukuran, 'warna' => $warna, 'kondisi' => $kondisi));
    }
    public function deleteAspek($id){
        $this->m_kualitas->deleteAspek($id);
        $this->index();
    }
    public function addKualitas(){
        if ('submit'){
            $ikan = $_POST['ikan'];
            $kualitas  = $_POST['kualitas'];
            $jenis  = $_POST['jenis'];
            $usia  = $_POST['usia'];
            $ukuran  = $_POST['ukuran'];
            $kondisi  = $_POST['kondisi'];
            $warna  = $_POST['warna'];
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
            $this->m_kualitas->addAspek($kualitas, $ikan, $jenis, $bj, $usia, $bus, $ukuran, $buk, $kondisi, $bk, $warna, $bw);
            redirect('kualitas');
        }
    }
    public function editKualitas($id){
        if ('update'){
            $ikan = $_POST['ikan'];
            $kualitas  = $_POST['kualitas'];
            $jenis  = $_POST['jenis'];
            $usia  = $_POST['usia'];
            $ukuran  = $_POST['ukuran'];
            $kondisi  = $_POST['kondisi'];
            $warna  = $_POST['warna'];
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
            $this->m_kualitas->editAspek($id, $ikan, $jenis, $bj, $usia, $bus, $ukuran, $buk, $kondisi, $bk, $warna, $bw);
            redirect('kualitas');
        }
    }
}