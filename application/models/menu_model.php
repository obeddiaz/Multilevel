<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Menu_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function conseguir_menu()
    {
        $query = $this->db->get('menu');
        return $query->result_array();
    }
}