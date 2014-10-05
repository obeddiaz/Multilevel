<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Inscripcion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model('menu_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->library(array('session', 'form_validation'));
        $data['menu'] = $this->menu_model->conseguir_menu();
        $data['titulo'] = 'inscripcion BAGS';
        $data['titulo_pagina'] = 'Inscripcion';
        $this->load->view('header', $data);
        $this->load->model('inscripcion_model');
        $this->load->library('encrypt');
    }

    public function index() {
        if ($this->input->get('u') && is_numeric($this->input->get('u'))) {
            $this->load->model('usuarios_model');
            $noexist = $this->usuarios_model->user_exist($this->input->get('u'));
            if ($noexist){
                $data['link_invitado'] = $this->input->get('u');
            }
        }
        $estados = $this->inscripcion_model->estados();
        foreach ($estados as $e) {
            $data['estados'][$e['id_estado']] = $e['nombre_estado'];
        }
        $data['token'] = $this->token();
        $this->load->view('inscripcion_view', $data);
        $this->load->view('footer');
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function alta_inscripcion() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|min_length[4]|max_length[25]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[password_conf]');
            $this->form_validation->set_rules('password_conf', 'Confirmacion password', 'required');
            $this->form_validation->set_rules('invitado', 'Invitado', 'required|xss_clean');
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('matches', 'El password introducido no coinside');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s no debe tener mas de %s carácteres');
            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                $password = sha1($this->input->post('password'));
                $resultado = $this->inscripcion_model->ingresar_usuario($this->input->post(), $password);
            }
        } else {
            redirect(base_url() . 'index.php/inscripcion');
        }
    }

    public function nuevo_afiliado() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $data['id_usuario'] = $this->session->userdata('id_usuario');
            $estados = $this->inscripcion_model->estados();
            foreach ($estados as $e) {
                $data['estados'][$e['id_estado']] = $e['nombre_estado'];
            }
            $data['token'] = $this->token();
            $this->load->view('inscripcion_directo_view', $data);
            $this->load->view('footer');
        } else {
            redirect(base_url() . 'index.php/login');
        }
    }

    public function nuevo_afiliado_main($user) {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            if ($user) {
                $data['id_usuario'] = $user;
                $estados = $this->inscripcion_model->estados();
                foreach ($estados as $e) {
                    $data['estados'][$e['id_estado']] = $e['nombre_estado'];
                }
                $data['token'] = $this->token();
                $this->load->view('inscripcion_directo_view', $data);
                $this->load->view('footer');
            }
        } else {
            redirect(base_url() . 'index.php/login');
        }
    }

    public function alta_inscripcion_directo() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|min_length[4]|max_length[25]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[password_conf]');
            $this->form_validation->set_rules('password_conf', 'Confirmacion password', 'required');
            $this->form_validation->set_rules('invitado', 'Invitado', 'required|xss_clean');
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('matches', 'El password introducido no coinside');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s no debe tener mas de %s carácteres');
            if ($this->form_validation->run() == FALSE) {
                $this->nuevo_afiliado();
            } else {
                $password = sha1($this->input->post('password'));
                $resultado = $this->inscripcion_model->ingresar_usuario($this->input->post(), $password);
            }
        } else {
            redirect(base_url() . 'index.php/inscripcion/nuevo_afiliado');
        }
    }

}
