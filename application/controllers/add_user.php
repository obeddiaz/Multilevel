<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Add_user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model('modificar_model');
        $this->load->library(array('session'));
        $this->load->library(array('form_validation'));
        $this->load->model('menu_model');
        $this->load->helper(array('url'));
        $data['menu']=  $this->menu_model->conseguir_menu();
        $data['titulo'] = 'Nuevo Usuario BAGS';
        $data['titulo_pagina'] = 'Añadir Usuario';
        $this->load->view('header',$data);
        $this->load->model('inscripcion_model');
    }

    function index() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $estados=$this->inscripcion_model->estados();
            foreach ($estados as $e){
                $data['estados'][$e['id_estado']]=$e['nombre_estado'];
            }
            $data['token'] = $this->token();
            $this->load->view('new_user_view',$data);
            $this->load->view('footer');
        }
    }
     public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }
    public function add_new_user()
    {
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
        {
            $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|min_length[4]|max_length[25]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[password_conf]');
            $this->form_validation->set_rules('password_conf', 'Confirmacion password',  'required');
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('matches', 'El password introducido no coinside');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s no debe tener mas de %s carácteres');
            if($this->form_validation->run() == FALSE)
            {  
                $this->index();
            }      
            else{
                $password = sha1($this->input->post('password'));
                $resultado = $this->inscripcion_model->add_user($this->input->post(),$password);       
            }
        }
        else{
            redirect(base_url().'index.php/inscripcion');
        }
    }
}