<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');
    }

    public function check()
    {
        // cek jika sudah login
        if(!$this->session->userdata('logged_in')){
            $msg = "Anda harus login dahulu!";
            $this->session->set_flashdata('msg', array('type' => 'error', 'message' => $msg));
            redirect('auth/login', 'refresh');
        }
    }

    public function isLogin($reverse = true)
    {
        // cek jika sudah login
        if($this->session->userdata('logged_in')){
            $result =  true;
        } else {
            $result = false;
        }

        if($reverse && $result)
        {
            return true;
        }else {
            return false;
        }
    }

    public function logged_in()
    {
        // cek jika sudah login
        if($this->session->userdata('logged_in')){
            redirect('dashboard', 'refresh');
        }
    }

    public function login($username = null, $password = null)
    {
        // validasi login
        if($username != null && $password != null)
        {
            // jika username dan password tidak kosong
            $query = $this->db->query("select * from admin where `username`='" . $this->clean($username) . "' AND `password`='" . $this->clean($password) . "'");
            
            if($query->num_rows()>0){
                // jika login sukses
                $user = $this->user_model->getUserByID($query->row()->id_admin);
                $data = array(
                                'id_admin' => $user->id_admin,
                                'logged_in' => true
                    );
                $this->session->set_userdata($data);
                redirect('dashboard', 'refresh');
            }else {
                // login gagal
                $msg = "Username atau Password salah!";
                $this->session->set_flashdata('msg', array('type' => 'error', 'message' => $msg));
                redirect('auth/login', 'refresh');
            }
        }else {
            $msg = "Username dan Password tidak boleh kosong!";
            $this->session->set_flashdata('msg', array('type' => 'error', 'message' => $msg));
            redirect('auth/login', 'refresh');
        }
    }

    private function clean($str)
    {
        // fungsi escape string
        return $str;
    }
}