<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('auth_model');
                $this->load->model('sukucadang_model');
        }

    public function index()
    {
                $head['title'] = "Selamat Datang - Suku Cadang";
                $head['loginPage'] = false;
                $this->load->view('_templates/home_header', $head);

                $data['sukucadang'] = $this->sukucadang_model->getSukucadang();

                $data['page'] = 'home_view';
                $data['name'] = $this->config->item("site_name");
                $this->load->view('_templates/content', $data);

                if(isset($_GET['view']))
                { // menampilkan modal lihat harga
                    $data['detail'] = $this->sukucadang_model->getSukucadangByID($this->input->get('view'));
                    $data['a'] = 'aa';
                    $this->load->view('show_detail_sukucadang', $data);
                }

                $foot['name'] = $data['name'];
                $this->load->view('_templates/footer', $foot);
    }

    public function pesan()
    {
                $head['title'] = "Selamat Datang - Suku Cadang";
                $head['loginPage'] = false;
                $this->load->view('_templates/home_header', $head);

                $data['page'] = 'pesan_view';
                $data['name'] = $this->config->item("site_name");
                $this->load->view('_templates/content', $data);

                $foot['name'] = $data['name'];
                $this->load->view('_templates/footer', $foot);
    }

    public function sendPesanan()
    {
            
            $data = $this->input->post();
            $jumlah = $data['jumlah'];
            unset($data['jumlah']);
            foreach($data as $item=>$value){
                if($value == ""){
                    $err[] = $item . " tidak boleh kosong!";
                }
            }

            $data2 = array('tanggal_pemesanan' => date("Y/m/d")
                );

            $data = array_merge($data,$data2);

            if(!isset($err)){
                 $insert = $this->sukucadang_model->tambahPesanan($data);
                 $id = $this->db->insert_id();

                $detail = array('id_pesanan' => $id,'id_sukucadang' => $_GET['id_sukucadang'], 'jumlah' => $jumlah);
                //print_r($insert);
                if($insert['status']){
                    $this->session->set_flashdata('msg', 'Sukses');
                    $this->sukucadang_model->tambahDetailPesanan($detail);
                    redirect('home?msg=Pesanan Berhasil Diproses');
                }else {
                    $this->session->set_flashdata('error', $insert['error']);
                    redirect('home/pesan?id_sukucadang='.$_GET['id_sukucadang'].'&error='.$insert['error']);
                }
            }else {
                $err = implode(" ", $err);
                $this->session->set_flashdata('error', $err);
                redirect('home/pesan?id_sukucadang='.$_GET['id_sukucadang'].'&error='.$err);
            }
    }

}
