<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Wish_list_model extends CI_Model 
{       
    public function addwish($data,$pro_id){

        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->where('pro_id', $pro_id);
        $a = $this->db->get('wishlist')->result();
        if(count($a) <= 0){
            $a = $this->db->insert('wishlist',$data);
        return $a;
        }else{
            return 0;
        }
        
        
    }
    public function get_wish(){
        $all_data = array();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('id'));
        $a = $this->db->get('wishlist')->result();
            foreach($a as $data){
                $id =  $data->pro_id;

                $this->db->select('product_table.*,  product_image.img_name');
                $this->db->from('product_table');
                $this->db->where('id',$id);
                $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
                $this->db->group_by('product_table.id , product_image.product_id');
                $all_data[] = $this->db->get()->result();
                               
            }
            // echo "<pre>";
            // var_dump($all_data);
            // print_r($all_data);
            // exit;
        return $all_data;
    }
    public function del_wish($data,$pro_id){
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->where('pro_id', $pro_id);
        $a = $this->db->delete('wishlist');
        return $a;
    }
}