<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class File_upload extends CI_Model 
{
    public function file_upload($updata){
        $a = $this->db->insert('product_image',$updata);
        return $a;
    }
    
    public function getdata(){
        $this->db->select('*');
        $acv = $this->db->get('product_table')->result();
        return $acv;
    }
}