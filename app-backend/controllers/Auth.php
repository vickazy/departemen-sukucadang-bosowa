<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
        {
            parent::__construct();

            // auto load model
            $this->load->model('auth_model');
        }

        public function index()
        {
                    // memanggil fungsi cek  login
                    $this->auth_model->check();
        }

        public function login()
        {
            // Halaman Login
                
                $this->auth_model->logged_in();
                $head['title'] = "Login Page";
                $head['showNavbar'] = false;
                $head['loginPage'] = true;
                $this->load->view('_templates/header', $head);

                $this->load->view('_templates/login');

                $foot['showCopyright'] = false;
                $this->load->view('_templates/footer', $foot);
        }

        public function checkLogin()
        {
            // cek login
                
            $this->auth_model->logged_in();
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // memanggil fungsi cek login
            $this->auth_model->login($username, $password);
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('auth/login');
        }
}