<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sukucadang_model extends CI_Model
{
    function getSukucadang()
    {
        // mengambil semua pengguna
        $query = $this->db->query("select * from sukucadang");

        if($query->num_rows()>0){
            return $query->result();
        }  else {
            return "";
        }
    }
    
    function getSukucadangByID($id)
    {
        // mengambil data pengguna berdasarkan ID
        $query = $this->db->query("select * from sukucadang where id_sukucadang = '$id'");

        if($query->num_rows()>0){
            return $query->row();
        }  else {
            return "";
        }
    }

    public function tambah($data)
    {
        $query = $this->db->insert('sukucadang', $data);
        if($query)
        {
            $result = array('status'=>true);
            return $result;
        }else {
            $result = array('status'=>false, 'error' => "Data gagal di tambah".$this->db->error());
            return $result;
        }
    }

    public function tambahPesanan($data)
    {
        $query = $this->db->insert('pesanan', $data);
        if($query)
        {
            $result = array('status'=>true);
            return $result;
        }else {
            $result = array('status'=>false, 'error' => "Data gagal di tambah".$this->db->error());
            return $result;
        }
    }

    public function tambahDetailPesanan($data)
    {
        $query = $this->db->insert('pesanan_detail', $data);
        if($query)
        {
            $result = array('status'=>true);
            return $result;
        }else {
            $result = array('status'=>false, 'error' => "Data gagal di tambah".$this->db->error());
            return $result;
        }
    }

    function getAllPesanan()
    {
        // mengambil semua pengguna
        $query = $this->db->query("select * from pesanan join pesanan_detail on `pesanan_detail`.id_pesanan = `pesanan`.id_pesanan");

        if($query->num_rows()>0){
            return $query->result();
        }  else {
            return "";
        }
    }

}