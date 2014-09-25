<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Productos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function obtener() {
        $this->db->select('id_producto,nombre,precio');
        $query = $this->db->get('productos');
        return $query->result_array();
    }
}