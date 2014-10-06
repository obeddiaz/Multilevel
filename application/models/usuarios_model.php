<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
        $data['pago_inicial'] = 1;
        return $this->db->update('usuarios', $data);
    }

    function datos_usuario($id_usuario) {
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    function user_exist($user) {
        $query = $this->db->get_where('usuarios', array('id_usuario' => $user));
        $count = $query->num_rows();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    function obtener_usuario($id_usuario) {
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get('usuarios');
        return $query->row();
    }

    function modificar_usuario($data) {
        $this->db->where('id_usuario', $data['id_usuario']);
        unset($data['token']);
        return $this->db->update('usuarios', $data);
    }

    function get_cuenta_usuario($user) {
        $this->db->where('id_usuario', $user);
        $query = $this->db->get('datos_cuenta');
        if ($query->num_rows() == 0) {
            $query->cuenta = '';
            $query->clave = '';
            return $query->result_array();
        }
        return $query->row();
    }

    function modificar_cuenta_usuario($data) {
        $this->db->where('id_usuario', $data['id_usuario']);
        unset($data['token']);
        return $this->db->update('usuarios', $data);
    }

}
