<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_pemesanan');
        $this->load->library('session');
    }
    public function index(){
        $this->load->view('s_pemesanan');
    }
    public function deletePesan($id, $url){
        $this->m_rekap->deletePemesanan($id);
        $this->index();
    }
}
