<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_anggota');
        $this->load->library('session');
    }
    public function index(){
        $id = $_SESSION['id'];
        $data = $this->m_anggota->getAnggota($id);
        $this->load->view('s_anggota', array('data' => $data));
    }
}
