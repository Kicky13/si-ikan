<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_home');
    }
    public function index(){
        $grafikS = $this->m_home->grafikSupplier();
        $grafikK = $this->m_home->grafikKonsumen();
        if ($this->session->has_userdata('data')){
            if ($_SESSION['tipe'] == 1){
                $this->load->view('k_home', array('konsumen' => $grafikK));
            } else if ($_SESSION['tipe'] == 2){
                $this->load->view('s_home', array('supplier' => $grafikS));
            } else if ($_SESSION['tipe'] == 3){
                $this->load->view('d_home');
            } else {
                $this->load->view('a_home');
            }
        } else {
            redirect('/login');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Harus Login Terlebih Dahulu.
                  </div>';
        }
    }
}
