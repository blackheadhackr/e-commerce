<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Log_in extends CI_Model 
{
    public function check($name, $pass){
        $this->db->where('user_name',$name);
        $this->db->where('password',$pass);
        $log = $this->db->get('user');
        return $log;
    }
}