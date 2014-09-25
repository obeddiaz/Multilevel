<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->database('default');
        $data['menu'] = $this->menu_model->conseguir_menu();
        $data['titulo'] = 'Login BAGS';
        $data['titulo_pagina'] = 'Modificar Datos';
        $this->load->view('header', $data);
    }

    public function index() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $this->load->model('afiliados_model');
            $data['niveles'] = 3;
            for ($a = 1; $a <= $data['niveles']; $a++) {
                $data['afiliados' . $a] = $this->afiliados_model->mostrar_afiliados_nivel_1($this->session->userdata('id_usuario'), $a);
            }
            $this->load->view('afiliados_view', $data);
            $this->load->view('footer');
        }
    }

}