<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_structure extends CI_Model { 
  
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
   public function getDataStructureLeader()
   {
    // return $this->db->get('structure')->result_array();
    $sql = "structure where structure_id = '1'";
    // echo "<pre>";
    return $this->db->get($sql)->result_array();
   }

   public function getDataStructureTeam()
   {
    $sql = "structure where NOT structure_id = '1'";
    return $this->db->get($sql)->result_array();
   }
 
 
}