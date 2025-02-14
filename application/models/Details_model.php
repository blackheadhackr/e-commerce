<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Details_model extends CI_Model 
{
    public function get_img($pro_id){
       $this->db->select('*');
       $this->db->where('product_id',$pro_id);
       $this->db->from('product_image');
       $a = $this->db->get()->result();
       return $a;
    }
    public function get_data($pro_id){
        $this->db->select('product_table.* , product_image.img_name');
        $this->db->from('product_table');
        $this->db->where('id',$pro_id);
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.id , product_image.product_id');
        $this->db->limit(12);
        $ab = $this->db->get()->result();
     
        return $ab;
    }
    public function get_releted_pro($pro_id){
        $this->db->select('type');
        $this->db->where('id',$pro_id);
        $a = $this->db->get('product_table')->row();
        $type = $a->type;

        $this->db->select('product_table.* , product_image.img_name');
        $this->db->where('type',$type);
        $this->db->from('product_table');
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.id , product_image.product_id');
        $this->db->limit(4);
        $ab = $this->db->get()->result();
        return $ab;
       
        
    }
}