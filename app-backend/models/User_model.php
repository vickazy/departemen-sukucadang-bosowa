<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function getUser()
    {
        // mengambil semua pengguna
        $query = $this->db->query("select * from admin");

        if($query->num_rows()>0){
            return $query->result();
        }  else {
            return "";
        }
    }
    
    function getUserByID($id)
    {
        // mengambil data pengguna berdasarkan ID
        $query = $this->db->query("select * from admin where id_admin = '$id'");

        if($query->num_rows()>0){
            return $query->row();
        }  else {
            return "";
        }
    }
}