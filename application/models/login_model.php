<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login_user($username,$password)
    {
        $this->db->where('usuario',$username);
        //echo $username." ";
        $this->db->where('password',$password);
        //echo $password." ";
        $query = $this->db->get('usuarios');
        //echo $this->db->last_query()." ";
        //var_dump($query);
        if($query->num_rows() == 1)
        {
            return $query->row();
        }else{
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url().'index.php/login','refresh');
        }
    }
}