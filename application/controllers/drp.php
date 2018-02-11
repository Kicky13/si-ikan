<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drp extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_drp');
    }
    public function index(){
        $id = $_SESSION['id'];
        $data = $this->m_drp->dataDropdown($id);
        $drp = $this->m_drp->viewdrp();
        $this->load->view('s_drp', array('data' => $data, 'drp' => $drp));
    }
    public function hitung(){
        if ('submit'){
            $konsumen = $_POST['konsumen'];
            $ikan = $_POST['ikan'];
            $lead = $_POST['lt'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $this->m_drp->hitungdrp($konsumen, $ikan, $lead, $bulan, $tahun);
            $this->index();
        }
    }
    public function deleteDrp($id){
        $this->m_drp->deleteDrp($id);
        $this->index();
    }
}