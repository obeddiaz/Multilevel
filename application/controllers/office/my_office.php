<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_office extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model('modificar_model');
        $this->load->library(array('session'));
        $this->load->library(array('form_validation'));
        $this->load->model('menu_model');
        $this->load->helper(array('url'));
    }

    function index() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $data['menu'] = $this->menu_model->conseguir_menu();
            $data['titulo'] = 'Afiliados BAGS';
            $data['titulo_pagina'] = 'Afiliados de ' . $this->session->userdata('username') . ' Id: ' . $this->session->userdata('id_usuario');
            //$this->load->view('header', $data);
            $this->load->model('afiliados_model');
            $data['compartir'] = $this->session->userdata('id_usuario');
            $data['niveles'] = 5;
            for ($a = 1; $a <= $data['niveles']; $a++) {
                $data['afiliados' . $a] = $this->afiliados_model->mostrar_afiliados_nivel_1($this->session->userdata('id_usuario'), $a);
            }
            $this->load->view('headers/office_header');
            $this->load->view('office/afiliados', $data);
            $this->load->view('footers/office_footer');
        } else {
            redirect(base_url() . 'index.php');
        }
    }

    function show_users() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $this->load->model('usuarios_model');
            $data['usuarios'] = $this->usuarios_model->obtener();
            $this->load->view('headers/office_header');
            $this->load->view('office/usuarios_view', $data);
            $this->load->view('footers/office_footer');
        } else {
            redirect(base_url() . 'index.php');
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
            $this->usuarios_model->modificar_usuario($this->input->post('usuarios'), $this->input->post('userid'));
            $this->usuarios_model->modificar_cuenta_usuario($this->input->post('datos_cuenta'), $this->input->post('userid'));
            $this->index();
        } else {
            redirect(base_url() . 'index.php/show_usuarios');
        }
    }

    function productos() {
        if ($this->session->userdata('is_logued_in') == TRUE && $this->session->userdata('perfil') == 3) {
            $this->load->model('imagen_producto_model');
            $data['productos'] = $this->imagen_producto_model->conseguir();
            $data['token'] = $this->token();
            $this->load->view('headers/office_header');
            $this->load->view('office/productos', $data);
            $this->load->view('footers/office_footer');
        } else {
            redirect(base_url() . 'index.php');
        }
    }

    public function ventas() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $this->load->model('ventas_model');
            $year = 2013;
            $month = 12;
            $data['ventas'] = $this->ventas_model->ventas_mes($year, $month);
            $this->load->view('headers/office_header');
            $this->load->view('office/ventas', $data);
            $this->load->view('footers/office_footer');
        } else {
            redirect(base_url() . 'index.php');
        }
    }

    public function usuarios() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $this->load->model('usuarios_model');
            $data['usuarios'] = $this->usuarios_model->obtener();
            $this->load->view('headers/office_header');
            $this->load->view('office/main', $data);
            $this->load->view('footers/office_footer');
        } else {
            redirect(base_url() . 'index.php');
        }
    }

    public function invitados() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $data['menu'] = $this->menu_model->conseguir_menu();
            $data['titulo'] = 'Invitados BAGS';
            $data['titulo_pagina'] = 'Invitados de ' . $this->session->userdata('username');
            //$this->load->view('header', $data);
            $this->load->model('afiliados_model');
            $data['invitados'] = $this->afiliados_model->get_invitados($this->session->userdata('id_usuario'));
            $this->load->view('headers/office_header');
            $this->load->view('office/invitados', $data);
            $this->load->view('footers/office_footer');
        } else {
            redirect(base_url() . 'index.php');
        }
    }

    function modificar_datos() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $data['token'] = $this->token();
            $data['edicion'] = $this->modificar_model->obtener($this->session->userdata('id_usuario'));
            $this->load->view('headers/office_header');
            $this->load->view('office/modificar_datos', $data);
            $this->load->view('footers/office_footer');
        } else {
            redirect(base_url() . 'index.php');
        }
    }

    function actualizar_datos() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $actualizar = $this->modificar_model->modificar_usuario($this->input->post(), $this->session->userdata('id_usuario'));
            if ($actualizar) {
                $this->session->set_flashdata('actualizado', 'Tus datos han sido modificados correctamente');
                redirect('/office/my_office/modificar_datos', 'refresh');
            }
        } else {
            redirect(base_url() . '/office/my_office/');
        }
    }

    function contabilidad() {
        $this->load->view('headers/office_header');
        $this->load->view('office/contabilidad');
        $this->load->view('footers/office_footer');
    }

}
