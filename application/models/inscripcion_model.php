<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Inscripcion_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function verificar($user)
    {
        $this->db->where('usuario',$user);
        $query = $this->db->get('usuarios');
        if($query->num_rows() == 1)
        {
            return 'El usuario no esta disponible';
        }else{
            return 'Disponible';
        }
    }
    public function estados()
    {
        $query = $this->db->get('estados');
            return $query->result_array();
    }
    public function verifica_email($email) {
        $this->db->where('email',$email);
        $consulta = $this->db->get('usuarios');
        if($consulta->num_rows() == 1)
        {
            $row = $consulta->row();
            return $row->email;
        }
    }
    public function verifica_username($username) {
        $this->db->where('usuario',$username);
        $consulta = $this->db->get('usuarios');
        if($consulta->num_rows() == 1)
        {
            $row = $consulta->row();
            return $row->usuario;  
        }
    }
    public function verifica_nombre_usuario($id_usuario) {
        $this->db->where('id_usuario',$id_usuario);
        $consulta = $this->db->get('usuarios');
        if($consulta->num_rows() == 1)
        {
            $row = $consulta->row();
            $nombre_usuario=$row->nombre." ".$row->apellido_paterno." ".$row->apellido_materno;
            return $nombre_usuario;
        }
    }
    public function ingresar_usuario($data,$password) {
        $id_persona['id_usuario']=$data['invitado'];
        unset($data['invitado']);
        unset($data['password_conf']);
        unset($data['token']);
        unset($data['registro']);
        $data['password']=$password;
        $data['id_tipo_usuario']='2';
        $data['pago_inicial']='0';
        $data['fecha_nacimiento']=$data['year']."-".$data['month']."-".$data['day'];
        unset($data['day']);
        unset($data['month']);
        unset($data['year']);
        $this->db->insert('usuarios',$data);  
        $id_persona['id_usuario_inv']=$this->db->insert_id();
        $this->db->insert('usuario_afiliado',$id_persona); 
        return TRUE;
    }
    public function add_user($data,$password) {
        unset($data['invitado']);
        unset($data['password_conf']);
        unset($data['token']);
        unset($data['registro']);
        $data['password']=$password;
        $data['id_tipo_usuario']='2';
        $data['pago_inicial']='0';
        $data['fecha_nacimiento']=$data['year']."-".$data['month']."-".$data['day'];
        unset($data['day']);
        unset($data['month']);
        unset($data['year']);
        $this->db->insert('usuarios',$data);  
        return TRUE;
    }
}