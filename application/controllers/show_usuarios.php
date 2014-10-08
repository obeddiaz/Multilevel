<?php

class Show_usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model('modificar_model');
        $this->load->library(array('session'));
        $this->load->library(array('form_validation'));
        $this->load->model('menu_model');
        $this->load->helper(array('url'));
        $data['menu'] = $this->menu_model->conseguir_menu();
        $data['titulo'] = 'Usuarios BAGS';
        $data['titulo_pagina'] = 'Usuarios';
        $this->load->view('header', $data);
        $this->load->model('inscripcion_model');
    }

    function index() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $this->load->model('usuarios_model');
            $data['usuarios'] = $this->usuarios_model->obtener();
            $this->load->view('usuarios_view', $data);
            $this->load->view('footer');
        }
    }

    function venta($user) {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $this->load->model('usuarios_model');
            $data['token'] = $this->token();
            $data['user'] = $this->usuarios_model->datos_usuario($user);

            $this->load->model('productos_model');

            $data['usaurio'] = $this->usuarios_model->datos_usuario($user);
            $data['productos'] = $this->productos_model->obtener();
            $this->load->view('venta_view', $data);
            $this->load->view('footer');
        }
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    function modificar() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->load->model('usuarios_model');
            $this->usuarios_model->modificar_usuario($this->input->post('usuarios'),$this->input->post('userid'));
            $this->usuarios_model->modificar_cuenta_usuario($this->input->post('datos_cuenta'),$this->input->post('userid'));
            $this->index();
        } else {
            redirect(base_url() . 'index.php/show_usuarios');
        }
    }

    //función encargada de actualizar los datos     
    /* function actualizar_datos() {
      $id = $this->input->post('id_mensaje');
      $nombre = $this->input->post('nombre');
      $email = $this->input->post('email');
      $asunto = $this->input->post('asunto');
      $mensaje = $this->input->post('mensaje');
      $actualizar = $this->datos_model->actualizar_mensaje($id, $nombre, $email, $asunto, $mensaje);
      //si la actualización ha sido correcta creamos una sesión flashdata para decirlo
      if ($actualizar) {
      $this->session->set_flashdata('actualizado', 'El mensaje se actualizó correctamente');
      redirect('../datos', 'refresh');
      }
      }

      } */

    /* application/controllers/datos.php
     * el controlador datos.php */
}

?>