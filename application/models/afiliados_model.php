<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Afiliados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function mostrar_afiliados_nivel_1($id_usuario, $nivel) {
        //obtener las personas dependiendo del nivel ingresado
        $this->db->where('id_usuario', $id_usuario);
        $this->db->select('id_usuario_inv');
        $this->db->from('usuario_afiliado');
        $query = $this->db->get();
        //echo $this->db->last_query() . '<br>';
        for ($a = 1; $a < $nivel; $a++) {
            $c = 0;
            foreach ($query->result() as $q) {
                if ($c == 0) {
                    $c = 1;
                    $this->db->where('id_usuario', $q->id_usuario_inv);
                } else {
                    $this->db->or_where('id_usuario', $q->id_usuario_inv);
                }
            }
            if ($query->num_rows() == 0) {
                $query->nombre = '';
                $query->apellido_paterno = '';
                $query->apellido_materno = '';
                return $query->result_array();
            }
            $this->db->select('id_usuario_inv');
            $this->db->from('usuario_afiliado');
            $query = $this->db->get();
            //echo $this->db->last_query() . '<br>';
        }
        $c = 0;
        if ($query->num_rows() != 0) {
            foreach ($query->result() as $q) {
                if ($c == 0) {
                    $c = 1;
                    $this->db->where('id_usuario', $q->id_usuario_inv);
                } else {
                    $this->db->or_where('id_usuario', $q->id_usuario_inv);
                }
            }
            $this->db->select('nombre,apellido_paterno,apellido_materno');
            $this->db->from('usuarios');
            $query = $this->db->get();
        } else {
            $query->nombre = '';
            $query->apellido_paterno = '';
            $query->apellido_materno = '';
        }
        return $query->result_array();
    }

    public function get_invitados($user) {
        $this->db->select('u.nombre, u.apellido_paterno,u.apellido_materno');
        $this->db->from('usuarios u ');
        $this->db->join('invitados_directos id', 'id.id_usuario_inv=u.id_usuario');
        $this->db->where('id.id_usuario',$user);
        $query = $this->db->get();
        return $query->result_array();
    }

}
