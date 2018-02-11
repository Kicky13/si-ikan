<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_supplier');
        $this->load->library('session');
    }
    public function index(){
        if ($this->session->has_userdata('data')) {
            if ($_SESSION['tipe'] == 4) {
                $data = $this->m_supplier->getSupplier();
                $this->load->view('a_supplier', array('data' => $data));
            } else {
                redirect('/login');
                echo '<div class="alert alert-danger">
                        <strong>Maaf!</strong>Anda Tidak Memiliki Hak Akses Untuk Halaman Ini.
                      </div>';
            }
        } else {
            redirect('/login');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Harus Login Terlebih Dahulu.
                  </div>';
        }
    }
    public function form(){
        $this->load->view('a_supplier_add');
    }
    public function addSupplier(){
        if ('submit'){
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $distributor = $_POST['distributor'];
            $this->m_supplier->addSupplier($nama, $alamat, $username, $password, $distributor);
            $this->index();
        }
    }
    public function editSupplier($id){
        if ('edit'){
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $distributor = $_POST['distributor'];
            $this->m_supplier->editSupplier($id, $nama, $alamat, $username, $password, $distributor);
            $this->index();
        }
    }
    public function formEdit($id){
        $data = $this->m_supplier->detailSupplier($id);
        $this->load->view('a_supplier_edit', array('data' => $data));
    }
}