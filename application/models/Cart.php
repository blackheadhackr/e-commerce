<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Model 
{
    public function get_cart(){
        $all_data = array();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->where('order_status','');
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
    public function upqty($arr,$id){
        $this->db->where('prod_id',$id);
        $this->db->where('user_id',$this->session->userdata('id'));
        $a = $this->db->update('cart',$arr);
        if($a){
           return $a;
        }else{
            return 0;
        }
    }
    public function del($id,$user_id){
        $this->db->where("prod_id",$id);
        $this->db->where("user_id",$user_id);
        $this->db->where('order_status','');
        $a = $this->db->delete("cart");
        if($a){
            return $a;
        }else{
            return 0;
        }
    }

}