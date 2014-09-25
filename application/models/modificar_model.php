<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Modificar_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function obtener($id) {
        $this->db->where('id_usuario', $id);
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }
    function modificar_usuario($data,$id) {
        $this->db->where('id_usuario', $id);
        unset($data['token']);
        return $this->db->update('usuarios', $data);
    }
}