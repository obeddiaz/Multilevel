<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->database('default');
        $data['menu'] = $this->menu_model->conseguir_menu();
        $data['titulo'] = 'Login BAGS';
        $data['titulo_pagina'] = 'Ventas';
        $this->load->view('header', $data);
    }

    public function index() {
        if ($this->session->userdata('is_logued_in') == TRUE) {
            $this->load->model('ventas_model');
            $year=2013;
            $month=12;
            $data['ventas'] = $this->ventas_model->ventas_mes($year,$month);
            $this->load->view('ventas_mes_view', $data);
            $this->load->view('footer');
        }
    }

}