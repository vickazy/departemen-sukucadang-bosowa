<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Starter extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('auth_model');
        }

	public function index()
	{
                $head['title'] = "Starter Page";
                $this->load->view('_templates/header', $head);

                $this->load->view('_templates/sidemenu');

                $data['page'] = 'starter';
                $data['name'] = $this->config->item("site_name");
                $this->load->view('_templates/content', $data);

                $foot['name'] = $data['name'];
                $this->load->view('_templates/footer', $foot);
	}

        public function login()
        {
                $head['title'] = "Login Page";
                $head['showNavbar'] = false;
                $head['loginPage'] = true;
                $this->load->view('_templates/header', $head);

                $this->load->view('_templates/login');

                $foot['showCopyright'] = false;
                $this->load->view('_templates/footer', $foot);
        }

        public function register()
        {
                $head['title'] = "Registration Page";
                $head['showNavbar'] = false;
                $head['loginPage'] = true;
                $this->load->view('_templates/header', $head);

                $this->load->view('_templates/register');

                $foot['showCopyright'] = false;
                $this->load->view('_templates/footer', $foot);
        }
}
