<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Crerado por Obed Isai Díaz Rodriguez.
 * todos los derechos reservados.
 */
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('menu_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('default');
        $data['menu'] = $this->menu_model->conseguir_menu();
        $data['titulo_pagina'] = 'Inicio de Sesión';
        $data['titulo'] = 'Login BAGS';
        $this->load->view('header', $data);
    }

    public function index() {
        switch ($this->session->userdata('perfil')) {
            case '':
                $data['token'] = $this->token();
                $this->load->view('login_view', $data);
                $this->load->view('footer');
                break;
            case '1':
                redirect(base_url() . 'index.php/principal');
                break;
            case '2':
                redirect(base_url() . 'index.php/principal');
                break;
            case '3':
                redirect(base_url() . 'index.php/principal');
                break;
            default:
                $this->load->view('index.php/login_view', $data);
                $this->load->view('footer');
                break;
        }
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function new_user() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');

            //lanzamos mensajes de error si es que los hay
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login_view');
            } else {
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));
                $check_user = $this->login_model->login_user($username, $password);
                if ($check_user == TRUE) {
                    if ($check_user->pago_inicial == 1||$check_user->pago_inicial == 0) {
                        $data = array(
                            'is_logued_in' => TRUE,
                            'id_usuario' => $check_user->id_usuario,
                            'perfil' => $check_user->id_tipo_usuario,
                            'username' => $check_user->usuario
                        );
                        $this->session->set_userdata($data);
                        $this->index();
                    } else {
                        $this->session->set_flashdata('pago_inicial', "No puedes iniciar sesión si no has pagado tu inscripción.");
                        redirect(base_url() . 'index.php/login', 'refresh');
                    }
                }
            }
        } else {
            redirect(base_url() . 'index.php/login');
        }
    }

    public function logout_ci() {
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php');
    }

}