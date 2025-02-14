<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_catg extends CI_Model 
{
    public function addcat($data){
       $a = $this->db->insert('catg',$data);
        if($a){
            return $a;
        }
        else{
            return 0;
        }
    }
    public function all_data(){
       $this->db->select('*');
       $a = $this->db->get('catg')->result();
    //    print_r($a);exit;
    return $a;
    }
}