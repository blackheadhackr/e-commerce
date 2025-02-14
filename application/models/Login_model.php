<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model 
{
    //log-in code here
    public function loggin($pass,$uname){
        $this->db->select('*');
        $this->db->where('username',$uname);       
        $this->db->where('password',$pass);
        $aa = $this->db->get('user_reg')->row();
        if($aa){
            return $aa;
        }else{
            return 0;
        }
    }

    // user_registration code
    public function user_reg($data){
       $a = $this->db->insert('user_reg',$data);
        if($a){
           return 1;
        }else{
            return 0;
        }
    } 
    // my order code here
    public function order(){
        $all_data = array();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        // $this->db->where('order_status','order');
        $this->db->order_by('id', "desc");
        $this->db->group_by('prod_id');
        $a = $this->db->get('cart')->result();
        foreach($a as $data){
            $id =  $data->prod_id;
            $this->db->select('product_table.*,  product_image.img_name');
            $this->db->from('product_table');
            $this->db->where('id',$id);
            $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
            $this->db->group_by('product_table.id , product_image.product_id');
            $all_data[] = $this->db->get()->result();
                           
        }
    return $all_data;
    }
    public function get_cart_data(){
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        $a = $this->db->get('cart')->result();
        return $a;
    }

    
}