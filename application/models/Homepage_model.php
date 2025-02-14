<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage_model extends CI_Model 
{
    public function get_product(){
        $this->db->select('product_table.* , product_image.img_name');
        $this->db->from('product_table');
        $this->db->order_by('id', 'desc');
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.id , product_image.product_id');
        $this->db->limit(16);
        $ab = $this->db->get()->result();
     
        return $ab;
    }
    public function type_pro(){
        $this->db->select('product_table.* , product_image.img_name');
        $this->db->from('product_table');
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.type');
        $this->db->limit(12);
        $ab = $this->db->get()->result();
     
        return $ab;
    }
    public function add_cart($cart_data,$u_id,$id){
        $this->db->select('*');
        $this->db->where('prod_id',$id);
        $this->db->where('user_id',$u_id);
        $this->db->where('order_status', '');
        $a = $this->db->get('cart')->result();
        if(count($a) <= 0){
            $a = $this->db->insert('cart',$cart_data);
            return $a;
        }else{
            return 0;
        }    
    }
    public function btwdate(){
        $firstdate = date('y-m-d', strtotime(' -15 day'));
        $secounddate = date('y-m-d');
        
        
        
        $this->db->select('product_table.* , product_image.img_name');
        $this->db->from('product_table');
        $this->db->order_by('id', 'desc');
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.id , product_image.product_id');
        $this->db->where('product_table.date >=',$firstdate);
        $this->db->where('product_table.date <=',$secounddate);
        $this->db->limit(16);
        $ab = $this->db->get()->result();
     
        return $ab;
        
        
        
        
        
        
        
        
        // $this->db->where('date >=',$firstdate);
        // $this->db->where('date <=',$secounddate);
        // $this->db->limit(6);
        // $a =  $this->db->get('product_table')->result();
        // return $a;
    }

}
