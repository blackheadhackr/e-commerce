<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout_model extends CI_Model 
{
    public function order_confirm($conf_data){
       $a = $this->db->insert('order',$conf_data);
       $inid = $this->db->insert_id();
        if($a){
           $this->db->select('user_id,product_id, cart_main_id');
           $this->db->where('id',$inid);
           $getdata = $this->db->get('order')->row();
          
           $data = json_decode($getdata->cart_main_id);
            if($getdata){
                foreach($data as $row){
                $this->db->where('user_id',$this->session->userdata('id'));
                $this->db->where('id',$row);
                $this->db->update('cart',array('order_status'=>"order"));
                }
            }
            return 1;
        }
        else{
            echo"sorry";
        }
    }
}