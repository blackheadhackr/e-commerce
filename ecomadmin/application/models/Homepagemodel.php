<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepagemodel extends CI_Model 
{
    public function product_insert($data){
        $a = $this->db->insert('product_table',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}