<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop_model extends CI_Model 
{
    public function get_product(){
        $this->db->select('product_table.* , product_image.img_name');
        $this->db->from('product_table');
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.id , product_image.product_id');
        $this->db->limit(12);
        $ab = $this->db->get()->result();
     
        return $ab;
    }
    public function type_pro(){
        $this->db->select('product_table.* , product_image.img_name');
        $this->db->from('product_table');
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.discount');
        $this->db->limit(12);
        $ab = $this->db->get()->result();
     
        return $ab;
    }
}