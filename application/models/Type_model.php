<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Type_model extends CI_Model 
{
    public function get_pro_type($type){
        $this->db->select('product_table.* , product_image.img_name');
        $this->db->where('type',$type);
        $this->db->from('product_table');
        $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
        $this->db->group_by('product_table.id , product_image.product_id');
        $ab = $this->db->get()->result();
     
        return $ab;
    } 
}