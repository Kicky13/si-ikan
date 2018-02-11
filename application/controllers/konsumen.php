<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_konsumen');
        $this->load->library('session');
    }
    public function index(){
        if ($_SESSION['tipe'] == 2) {
            $data = $this->m_konsumen->getKonsumen();
            $this->load->view('s_konsumen', array('data' => $data));
        } else if ($_SESSION['tipe'] == 3){
            $data = $this->m_konsumen->getKonsumen();
            $this->load->view('d_konsumen', array('data' => $data));
        } else if ($_SESSION['tipe'] == 4){
            $data = $this->m_konsumen->getKonsumen();
            $this->load->view('a_konsumen', array('data' => $data));
        } else {
            redirect('/login/form');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Diperlukan Login.
                  </div>';
        }
    }
    public function form(){
        $data = $this->m_konsumen->getJenis();
        $this->load->view('s_konsumen_add', array('data' => $data));
    }
    public function getFormedit($id){
        $data = $this->m_konsumen->getJenis();
        $data1 = $this->m_konsumen->getKonsumendetail($id);
        $this->load->view('s_konsumen_edit', array('data' => $data, 'detail' => $data1));
    }
    public function editKonsumen($id){
        if ('submit'){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jenis = $_POST['jenis'];
            $cek = $this->m_konsumen->cekUser($user);
            if ($cek > 1){
                echo '<script type="text/javascript">alert("Username telah digunakan!.")</script>';
                $this->form();
            } else {
                $this->m_konsumen->editKonsumen($id, $user, $jenis, $pass, $nama, $alamat);
                $this->index();
            }
        }
    }
    public function addKonsumen(){
        if ('submit'){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jenis = $_POST['jenis'];
            $cek = $this->m_konsumen->cekUser($user);
            if ($cek > 0){
                echo '<script type="text/javascript">alert("Username telah digunakan!.")</script>';
                $this->form();
            } else {
                $this->m_konsumen->addKonsumen($user, $jenis, $pass, $nama, $alamat);
                echo '<script type="text/javascript">alert("Berhasil ditambahkan!")</script>';
                $this->index();
            }
        }
    }
    public function deleteKonsumen($id){
        $this->m_konsumen->deleteKonsumen($id);
        $this->index();
    }
}
