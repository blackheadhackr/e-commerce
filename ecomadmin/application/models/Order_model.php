<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_model extends CI_Model 
{

    public function get_person_det(){
        $this->db->select('*');
        $this->db->where('order_status','order');
        $a = $this->db->get('order')->result();
        return $a;
    }
    public function get_order(){
        $all_data = array();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->where('order_status','order');
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
    public function acppt_order($id){
        $aa = array();
        $this->db->where('id',$id);
        $this->db->where('order_status','order');
        $a = $this->db->update('order',array('order_status'=>'confirmed'));
        if($a){
            $this->db->select('*');
            $this->db->where('id',$id);
            $a = $this->db->get('order')->row();
           $card = json_decode($a->cart_main_id);
           foreach($card as $row){
            $this->db->where('id',$row);
            $this->db->where('order_status','order');
            $aa[] = $this->db->update('cart',array('order_status'=>'confirmed'));
           }
           return $aa;
        }else{
            return 0;
        }

    }
    public function get_qqty(){
        $this->db->select('*');
        $a = $this->db->get('cart')->result();
        return $a;
    }
    public function get_ord($id){
        $all_data = array();
        $this->db->select('*');
        $this->db->where('id',$id);
        $a = $this->db->get('order')->row();
        
        $isd =  json_decode($a->product_id);
        foreach($isd as $row){
            $this->db->select('product_table.*,  product_image.img_name');
            $this->db->from('product_table');
            $this->db->where('id',$row);
            $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
            $this->db->group_by('product_table.id , product_image.product_id');
            $all_data[] = $this->db->get()->result();
        }
        return $all_data;
    }

    public function get_cart_data(){
        $iid = $this->uri->segment(3);
        $id = base64_decode($iid);
        $adata = array();
        $this->db->select('*');
        $this->db->where('id',$id);
        $a = $this->db->get('order')->row();
        
        $isd =  json_decode($a->cart_main_id);
        foreach($isd as $row){
        $this->db->select('*');
        $this->db->where('id',$row);
        $adata[] = $this->db->get('cart')->result();
        }
        return $adata;
    }
    public function acptorder($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->where('order_status','order');
       $ac =  $this->db->get('cart')->row();
        if($ac){
            $this->db->where('id',$id);
            $this->db->where('order_status','order');
            $a =  $this->db->update('cart',array('order_status' => 'confirmed'));
            return $a;
        }else{
            return 0;
       }
    }


  
}