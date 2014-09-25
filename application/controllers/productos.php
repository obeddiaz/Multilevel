<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model('imagen_producto_model');
        $this->load->model('menu_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->library(array('session', 'form_validation'));
        $data['menu'] = $this->menu_model->conseguir_menu();
        $data['titulo'] = 'Alta Productos BAGS';
        $data['titulo_pagina'] = 'Alta Productos';
        $this->load->view('header', $data);
        $this->load->model('inscripcion_model');
    }

    function index() {
        if ($this->session->userdata('is_logued_in') == TRUE && $this->session->userdata('perfil') == 3) {
            //CARGAMOS LA VISTA DEL FORMULARIO
            $data['productos'] = $this->imagen_producto_model->conseguir();
            $data['token'] = $this->token();
            $this->load->view('alta_productos_view', $data);
            $this->load->view('footer');
        }
    }

    //FUNCIÓN PARA SUBIR LA IMAGEN Y VALIDAR EL TÍTULO
    function do_upload() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[5]|max_length[20]|trim|xss_clean');
            $this->form_validation->set_message('required', 'El %s no puede ir vacío!');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
            //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './productos_imagenes/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2000';
                $config['max_width'] = '2024';
                $config['max_height'] = '2008';
                $this->load->library('upload', $config);
                //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('productos_view', $error);
                } else {
                    //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                    //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                    $file_info = $this->upload->data();
                    //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                    //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
                    $this->create_thumbnail($file_info['file_name']);
                    $data = array('upload_data' => $this->upload->data());
                    $titulo = $this->input->post('titulo');
                    $descripcion = $this->input->post('descripcion');
                    $imagen = $file_info['file_name'];
                    $this->imagen_producto_model->subir($titulo, $imagen, $descripcion);
                    $this->index();
                }
            } else {
                //SI EL FORMULARIO NO SE VÁLIDA LO MOSTRAMOS DE NUEVO CON LOS ERRORES
                $this->index();
            }
        } else {
            redirect(base_url() . 'index.php/productos');
        }
    }

    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function create_thumbnail($filename) {
        $config['image_library'] = 'GD2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = './productos_imagenes/' . $filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image'] = './productos_imagenes/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function eliminar_producto($producto) {
        $this->imagen_producto_model->eliminar_producto($producto);
        redirect(base_url() . 'index.php/productos');
    }

    public function example() {
        
    }

    function modificar() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            /* $this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[5]|max_length[20]|trim|xss_clean');
              $this->form_validation->set_message('required', 'El %s no puede ir vacío!');
              $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
              $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres'); */
            //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
            $file1 = "./productos_imagenes/" . $this->input->post('imagen_pasada');
            $file2 = "./productos_imagenes/thumbs/" . $this->input->post('imagen_pasada');
            $config['upload_path'] = './productos_imagenes/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['max_width'] = '2024';
            $config['max_height'] = '2008';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $titulo = $this->input->post('titulo');
                $descripcion = $this->input->post('descripcion');
                $this->imagen_producto_model->modificar_producto_sin_imagen($this->input->post());
                $this->index();
            } else {
                if (file_exists($file1) && file_exists($file2)) {
                    unlink($file1);
                    unlink($file2);
                }
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
                $this->create_thumbnail($file_info['file_name']);
                $data = array('upload_data' => $this->upload->data());
                $titulo = $this->input->post('titulo');
                $descripcion = $this->input->post('descripcion');
                $imagen = $file_info['file_name'];
                $this->imagen_producto_model->modificar_producto($this->input->post(), $imagen);
                $this->index();
            }
        } else {
            redirect(base_url() . 'index.php/productos');
        }
    }

    function nueva_venta() {
        var_dump($this->input->post());
    }

}