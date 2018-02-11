<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
        $this->load->library('session');
    }

    public function index(){
		$this->load->view('cover');
	}
	public function form(){
        $jenis = $this->m_login->getJenis();
        $this->load->view('login', array('jenis' => $jenis));
    }
    public function formregister(){
        $jenis = $this->m_login->getJenis();
        $this->load->view('register', array('jenis' => $jenis));
    }
    public function login(){
	    if ('login'){
	        $user = $_POST['username'];
	        $pass = $_POST['password'];
	        $tipe = $_POST['tipe'];
	        if ($tipe == 1){
                $row = $this->m_login->loginKonsumen($user, $pass);
                if ($row == 1){
                    $array = $this->m_login->getidKonsumen($user, $pass);
                    $id = $array[0]['id_konsumen'];
                    $data = array(
                        'username' => $user,
                        'password' => $pass
                    );
                    $_SESSION['nama'] = $array[0]['nama_konsumen'];
                    $_SESSION['jenis'] = 'Konsumen '.$array[0]['jenis_konsumen'];
                    $_SESSION['tipe'] = $tipe;
                    $_SESSION['id'] = $id;
                    $this->session->set_userdata('data', $data);
                    echo '<script>window.alert("Anda Berhasil Login", window.location= "'.base_url('index.php/home').'")</script>';
                } else {
                    $this->form();
                    echo '<div class="alert alert-danger">
                            <strong>Maaf!</strong> Username atau Password Tidak Sesuai.
                          </div>';
                }
            } else if ($tipe == 2){
                $row = $this->m_login->loginSupplier($user, $pass);
                if ($row == 1){
                    $array = $this->m_login->getidSupplier($user, $pass);
                    $id = $array[0]['id_supplier'];
                    $data = array(
                        'username' => $user,
                        'password' => $pass
                    );
                    $_SESSION['nama'] = $array[0]['nama_supplier'];
                    $_SESSION['jenis'] = 'Supplier';
                    $_SESSION['tipe'] = $tipe;
                    $_SESSION['id'] = $id;
                    $this->session->set_userdata('data', $data);
                    echo '<script>window.alert("Anda Berhasil Login", window.location= "'.base_url('index.php/home').'")</script>';
                } else {
                    $this->form();
                    echo '<div class="alert alert-danger">
                            <strong>Maaf!</strong> Username atau Password Tidak Sesuai.
                          </div>';
                }
            } else if ($tipe == 3){
                $row = $this->m_login->loginDistributor($user, $pass);
                if ($row == 1){
                    $array = $this->m_login->getidDistributor($user, $pass);
                    $id = $array[0]['id_distributor'];
                    $data = array(
                        'username' => $user,
                        'password' => $pass
                    );
                    $_SESSION['nama'] = $array[0]['nama_distributor'];
                    $_SESSION['jenis'] = 'Distributor';
                    $_SESSION['tipe'] = $tipe;
                    $_SESSION['id'] = $id;
                    $this->session->set_userdata('data', $data);
                    echo '<script>window.alert("Anda Berhasil Login", window.location= "'.base_url('index.php/home').'")</script>';
                } else {
                    $this->form();
                    echo '<div class="alert alert-danger">
                            <strong>Maaf!</strong> Username atau Password Tidak Sesuai.
                          </div>';
                }
            } else {
                $row = $this->m_login->loginAdmin($user, $pass);
                if ($row == 1){
                    $array = $this->m_login->getidAdmin($user, $pass);
                    $id = $array[0]['id_admin'];
                    $data = array(
                        'username' => $user,
                        'password' => $pass
                    );
                    $_SESSION['nama'] = $array[0]['nama_admin'];
                    $_SESSION['jenis'] = 'Admin';
                    $_SESSION['tipe'] = $tipe;
                    $_SESSION['id'] = $id;
                    $this->session->set_userdata('data', $data);
                    echo '<script>window.alert("Anda Berhasil Login", window.location= "'.base_url('index.php/home').'")</script>';
                } else {
                    $this->form();
                    echo '<div class="alert alert-danger">
                            <strong>Maaf!</strong> Username atau Password Tidak Sesuai.
                          </div>';
                }
            }
        }
    }
    public function cekAkun(){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $tipe = $_POST['tipe'];
        if ($tipe == 1){
            $row = $this->m_login->loginKonsumen($user, $pass);
            if ($row == 1){
                $array = $this->m_login->getidKonsumen($user, $pass);
                $id = $array[0]['id_konsumen'];
                $data = array(
                    'username' => $user,
                    'password' => $pass
                );
                $_SESSION['nama'] = $array[0]['nama_konsumen'];
                $_SESSION['jenis'] = 'Konsumen '.$array[0]['jenis_konsumen'];
                $_SESSION['tipe'] = $tipe;
                $_SESSION['id'] = $id;
                $this->session->set_userdata('data', $data);
                echo 'Login Berhasil';
            } else {
                echo 'Username Atau Password Tidak Sesuai';
            }
        } else if ($tipe == 2){
            $row = $this->m_login->loginSupplier($user, $pass);
            if ($row == 1){
                $array = $this->m_login->getidSupplier($user, $pass);
                $id = $array[0]['id_supplier'];
                $data = array(
                    'username' => $user,
                    'password' => $pass
                );
                $_SESSION['nama'] = $array[0]['nama_supplier'];
                $_SESSION['jenis'] = 'Supplier';
                $_SESSION['tipe'] = $tipe;
                $_SESSION['id'] = $id;
                $this->session->set_userdata('data', $data);
                echo 'Login Berhasil';
            } else {
                echo 'Username Atau Password Tidak Sesuai';
            }
        } else if ($tipe == 3){
            $row = $this->m_login->loginDistributor($user, $pass);
            if ($row == 1){
                $array = $this->m_login->getidDistributor($user, $pass);
                $id = $array[0]['id_distributor'];
                $data = array(
                    'username' => $user,
                    'password' => $pass
                );
                $_SESSION['nama'] = $array[0]['nama_distributor'];
                $_SESSION['jenis'] = 'Distributor';
                $_SESSION['tipe'] = $tipe;
                $_SESSION['id'] = $id;
                $this->session->set_userdata('data', $data);
                echo 'Login berhasil';
            } else {
                echo 'Username Atau Password Tidak Sesuai';
            }
        } else {
            $row = $this->m_login->loginAdmin($user, $pass);
            if ($row == 1){
                $array = $this->m_login->getidAdmin($user, $pass);
                $id = $array[0]['id_admin'];
                $data = array(
                    'username' => $user,
                    'password' => $pass
                );
                $_SESSION['nama'] = $array[0]['nama_admin'];
                $_SESSION['jenis'] = 'Admin';
                $_SESSION['tipe'] = $tipe;
                $_SESSION['id'] = $id;
                $this->session->set_userdata('data', $data);
                echo 'Login Berhasil';
            } else {
                echo 'Username Atau Password Tidak Sesuai';
            }
        }
    }
    public function logout(){
        $this->session->unset_userdata('data');
        unset(
            $_SESSION['tipe'],
            $_SESSION['id']
        );
        $this->index();
    }
    public function register(){
        if ('register'){
            $nama = $_POST['namakonsumen'];
            $jenis = $_POST['jeniskonsumen'];
            $alamat = $_POST['alamatkonsumen'];
            $user = $_POST['usernamekonsumen'];
            $pass = $_POST['passwordkonsumen'];
            $this->m_login->addKonsumen($user, $jenis, $pass, $nama, $alamat);
            $this->form();
            echo '<div class="alert alert-success">
                    <strong>Berhasil!</strong> Silahkan Anda Login.
                  </div>';
        }
    }
}
