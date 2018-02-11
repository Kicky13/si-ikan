<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_distributor');
        $this->load->library('session');
    }
    public function index(){
        if ($this->session->has_userdata('data')){
            if ($_SESSION['tipe'] = 2){
                $id = $_SESSION['id'];
                $data = $this->m_distributor->dataDistributor($id);
                $this->load->view('s_distributor', array('data' => $data));
            } else {
                redirect('/error/error401/distributor');
            }
        } else {
            redirect('/login');
            echo '<div class="alert alert-danger">
                    <strong>Maaf!</strong> Anda Harus Login Terlebih Dahulu.
                  </div>';
        }
    }
    public function form(){
        $this->load->view('s_distributor_add');
    }
    public function formEdit($id){
        $detail = $this->m_distributor->getDetail($id);
        $this->load->view('s_distributor_edit', array('data' => $detail));
    }
    public function addDistributor(){
        if ('submit') {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->m_distributor->addDistributor($nama, $username, $password);
            $this->index();
        }
    }
    public function editDistributor($id){
        if ('edit') {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->m_distributor->editDistributor($id, $nama, $username, $password);
            $this->index();
        }
    }
    public function deleteDistributor($id){
        $this->m_distributor->deleteDistributor($id);
        $this->index();
    }
}
