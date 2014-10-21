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

    function modificar_usuario($data, $id) {
        $this->db->where('id_usuario', $id);
        return $this->db->update('usuarios', $data);
    }

    function get_cuenta_usuario($user) {
        $this->db->where('id_usuario', $user);
        $this->db->from('datos_cuenta');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return $query->row();
        }
        return $query->row();
    }

    function modificar_cuenta_usuario($data, $id) {
        $this->db->where('id_usuario', $id);
        $this->db->from('datos_cuenta');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data['id_usuario'] = $id;
            return $this->db->insert('datos_cuenta', $data);
        } else {
            $this->db->where('id_usuario', $id);
            return $this->db->update('datos_cuenta', $data);
        }
    }

    function get_patrocinador($id) {
        $this->db->select('u.id_usuario,u.nombre,u.apellido_paterno,u.apellido_materno', $id);
        $this->db->where('ua.id_usuario_inv', $id);
        $this->db->from('usuarios u');
        $this->db->join('usuario_afiliado ua', 'ua.id_usuario=u.id_usuario');
        $query = $this->db->get();
        return $query->row();
    }

    public function change_password($user_data) {
        $user_data['pass_anterior'] = sha1($user_data['pass_anterior']);
        $user_data['password'] = sha1($user_data['password']);
        $this->db->where('id_usuario', $user_data['id_usuario']);
        $this->db->where('password', $user_data['pass_anterior']);
        $query = $this->db->get('usuarios');
        unset($user_data['pass_anterior']);
        unset($user_data['password_conf']);
        if ($query->num_rows() == 1) {
            $this->db->where('id_usuario', $user_data['id_usuario']);
            $this->session->set_flashdata('contraseña_cambiada', 'La Contraseña a sido Cambiada correctamente');
            return $this->db->update('usuarios', $user_data);
        } else {
            $this->session->set_flashdata('usuario_incorrecto', 'Los datos introducidos son incorrectos');
            redirect(base_url() . 'index.php/login', 'refresh');
        }
    }

    public function verify_password($userid, $password) {
        $this->db->where('id_usuario', $userid);
        $this->db->where('password', $password);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
