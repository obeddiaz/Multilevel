<?php

class Modificar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model('modificar_model');
        $this->load->library(array('session'));
        $this->load->library(array('form_validation'));
        $this->load->model('menu_model');
        $this->load->helper(array('url'));
        $data['menu'] = $this->menu_model->conseguir_menu();
        $data['titulo'] = 'Modificar BAGS';
        $data['titulo_pagina'] = 'Modificar mis Datos';
        $this->load->view('header', $data);
        $this->load->model('inscripcion_model');
    }

    function index() {
        
    }

//función encargada de mostrar los formularios por ajax
//dependiendo el botón que hayamos pulsado
    function mostrar_datos() {
        $data['token'] = $this->token();
        $data['edicion'] = $this->modificar_model->obtener($this->session->userdata('id_usuario'));
        $this->load->view('modificar_view', $data);
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

//función encargada de actualizar los datos     
    function actualizar_datos() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $actualizar = $this->modificar_model->modificar_usuario($this->input->post(), $this->session->userdata('id_usuario'));
//si la actualización ha sido correcta creamos una sesión flashdata para decirlo
            if ($actualizar) {
                $this->session->set_flashdata('actualizado', 'Tus datos han sido modificados correctamente');
                redirect('/modificar/mostrar_datos', 'refresh');
            }
        }
    }

}

/* application/controllers/datos.php
 * el controlador datos.php */
?>