<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // auto load model
        $this->load->model('auth_model');
        $this->load->model('sukucadang_model');

        $this->auth_model->check();
    }

    public function index()
    {
                $head['title'] = "Home Page";
                $this->load->view('_templates/header', $head);

                $this->load->view('_templates/sidemenu');

                $data['page'] = 'starter';
                $data['name'] = $this->config->item("site_name");
                $this->load->view('_templates/content', $data);

                $foot['name'] = $data['name'];
                $this->load->view('_templates/footer', $foot);
    }

    public function sukucadang()
    {
                $head['title'] = "Suku Cadang";
                $this->load->view('_templates/header', $head);

                $this->load->view('_templates/sidemenu');

                $data['sukucadang'] = $this->sukucadang_model->getSukucadang();

                $data['page'] = 'sukucadang_view';
                $data['name'] = $this->config->item("site_name");
                $this->load->view('_templates/content', $data);

                if(isset($_GET['tambah']))
                {
                    $this->load->view('tambah_sukucadang_view', $data);
                }

                if(isset($_GET['show']))
                { // menampilkan modal lihat harga
                    $data['detail'] = $this->sukucadang_model->getSukucadangByID($this->input->get('show'));
                    $data['a'] = 'aa';
                    $this->load->view('show_detail_sukucadang', $data);
                }

                $foot['name'] = $data['name'];
                $this->load->view('_templates/footer', $foot);
    }

    public function pesanan()
    {
                $head['title'] = "Suku Cadang";
                $this->load->view('_templates/header', $head);

                $this->load->view('_templates/sidemenu');

                $data['pesanan'] = $this->sukucadang_model->getAllPesanan();

                $data['page'] = 'pesanan_view';
                $data['name'] = $this->config->item("site_name");
                $this->load->view('_templates/content', $data);

                $foot['name'] = $data['name'];
                $this->load->view('_templates/footer', $foot);
    }

     public function tambahSukucadang()
    {
            $config['upload_path']          = './app-uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']         = true;
            $config['max_size']             = '1000'; //kilobyte

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar'))
            {
                    $error = $this->upload->display_errors();
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $gambar = $data['upload_data']['file_name'];
            }

            $data = $this->input->post();

            unset($data['gambar']);
            foreach($data as $item=>$value){
                if($value == ""){
                    $err[] = $item . " tidak boleh kosong!";
                }
            }
            if(isset($gambar)){
            $data2 = array('gambar' => $gambar);
                
            $data = array_merge($data,$data2);
           
           if(isset($error)){
                $err = array_merge($err, $error);
           }

            if(!isset($err)){
                 $insert = $this->sukucadang_model->tambah($data);
                //print_r($insert);
                if($insert['status']){
                    $this->session->set_flashdata('msg', 'sukses');
                    redirect('dashboard/sukucadang');
                }else {
                    $this->session->set_flashdata('error', $insert['error']);
                    redirect('sukucadang/?tambah&error='.$insert['error']);
                }
            }else {
                $err = implode(" ", $err);
                $this->session->set_flashdata('error', $err);
                redirect('dashboard/sukucadang/?tambah&error='.$err);
            }
            }else {
                $err = "Harap upload gambar suku cadang";
                $this->session->set_flashdata('error', $err);
                redirect('dashboard/sukucadang/?tambah&error='.$err);
            }
    }

}
