<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Confirn_m extends CI_Model 
{
    public function get_person_det(){
        $this->db->select('*');
        $this->db->where('order_status','confirmed');
        $a = $this->db->get('order')->result();
        return $a;
    }
    
    public function get_order(){
        $all_data = array();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->where('order_status','confirmed');
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
    public function get_orderi(){
        $all_data = array();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->where('order_status','dilivered');
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
        $this->db->where('order_status','confirmed');
        $adata[] = $this->db->get('cart')->result();
        }
        return $adata;
    }
    
    public function acppt_order($id){
        $aa = array();
        $this->db->where('id',$id);
        $this->db->where('order_status','confirmed');
        $a = $this->db->update('order',array('order_status'=>'dilivered'));
        if($a){
            $this->db->select('*');
            $this->db->where('id',$id);
            $a = $this->db->get('order')->row();
           $card = json_decode($a->cart_main_id);
           foreach($card as $row){
            $this->db->where('id',$row);
            $this->db->where('order_status','confirmed');
            $aa[] = $this->db->update('cart',array('order_status'=>'dilivered'));
           }
           return $aa;
        }else{
            return 0;
        }

    }
    // diliver code----------------------------------------------------------------------------------------------------
    public function get_person_deti(){
        $this->db->select('*');
        $this->db->where('order_status','dilivered');
        $a = $this->db->get('order')->result();
        return $a;
    }
    public function get_orda($id){
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
    public function get_cart_dataa(){
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
        $this->db->where('order_status','dilivered');
        $adata[] = $this->db->get('cart')->result();
        }
        return $adata;
    }
}