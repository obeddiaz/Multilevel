<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Afiliados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('usuarios_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->database('default');
    }

    public function index() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $data['menu'] = $this->menu_model->conseguir_menu();
            $data['titulo'] = 'Afiliados BAGS';
            $data['titulo_pagina'] = 'Afiliados de ' . $this->session->userdata('username') . ' Id: ' . $this->session->userdata('id_usuario');
            $this->load->view('header', $data);
            $this->load->model('afiliados_model');
            $data['compartir'] = $this->session->userdata('id_usuario');
            $data['niveles'] = 5;
            for ($a = 1; $a <= $data['niveles']; $a++) {
                $data['afiliados' . $a] = $this->afiliados_model->mostrar_afiliados_nivel_1($this->session->userdata('id_usuario'), $a);
            }
            $this->load->view('afiliados_view', $data);
            $this->load->view('footer');
        }
    }

    public function invitados() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $data['menu'] = $this->menu_model->conseguir_menu();
            $data['titulo'] = 'Invitados BAGS';
            $data['titulo_pagina'] = 'Invitados de ' . $this->session->userdata('username');
            $this->load->view('header', $data);
            $this->load->model('afiliados_model');
            $data['invitados'] = $this->afiliados_model->get_invitados($this->session->userdata('id_usuario'));
            $this->load->view('invitados_view', $data);
            $this->load->view('footer');
        }
    }

    public function show_user_levels($user) {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $data['menu'] = $this->menu_model->conseguir_menu();
            $data['titulo'] = 'Afiliados BAGS';
            $usuario = $this->usuarios_model->datos_usuario($user);
            $data['titulo_pagina'] = 'Afiliados de "' . $usuario[0]['usuario'] . '" : ' . $usuario[0]['nombre'] . ' ' . $usuario[0]['apellido_paterno'] . ' ' . $usuario[0]['apellido_materno'];
            $this->load->view('header', $data);
            $this->load->model('afiliados_model');
            $data['niveles'] = 5;
            for ($a = 1; $a <= $data['niveles']; $a++) {
                $data['afiliados' . $a] = $this->afiliados_model->mostrar_afiliados_nivel_1($user, $a);
            }
            $this->load->view('afiliados_view_admin', $data);
            $this->load->view('footer');
        }
    }

}
