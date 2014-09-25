<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Usuarios_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    function obtener() {
        $this->db->where('id_tipo_usuario', '2');
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }
    function imagen_usuario($id_usuario) {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->select('id_usuario');
        $this->db->select('foto');
        $this->db->select('nombre');
        $this->db->select('apellido_paterno');
        $this->db->select('apellido_materno');
        $query = $this->db->get('usuarios');
        return $query->row();
    }
    function confirmar_pago($id_usuario) {
        $this->db->where('id_usuario', $id_usuario);
        $data['pago_inicial']=1;
        return $this->db->update('usuarios', $data);
    }
    function datos_usuario($id_usuario) {
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }
}