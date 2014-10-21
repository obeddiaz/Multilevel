<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Db_updates extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('usuarios_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->database('default');
        $this->load->library(array('session', 'form_validation'));
    }

    public function change_password() {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $array_items = array('token' => '');
            $this->session->unset_userdata($array_items);
            //var_dump($this->input->post('change_data')['password']);
            $_POST['user_post_password_tmp'] = $this->input->post('change_data')['password_conf'];
            $user_id = $this->session->userdata('id_usuario');
            $this->form_validation->set_rules('change_data[pass_anterior]', 'Password', 'trim|required|callback_user_passwordcheck[' . $user_id . ']');
            $this->form_validation->set_rules('change_data[password]', 'Password', 'trim|required|matches[user_post_password_tmp]');
            $this->form_validation->set_rules('change_data[password_conf]', 'Password Confirmation', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect(base_url() . 'index.php/office/my_office/mis_datos');
            } else {
                $array_items = array('token' => '');
                $this->session->unset_userdata($array_items);
                $this->usuarios_model->change_password($this->input->post('change_data'));
                $this->session->set_flashdata('cambio_correcto', 'La contraseña a sido cambiada correctamente');
                redirect(base_url() . 'index.php/office/my_office/mis_datos');
            }
        } else {
            redirect(base_url() . 'index.php/office/my_office/mis_datos');
        }
    }

    public function user_passwordcheck($str, $user_id) {
        if (!$this->usuarios_model->verify_password($user_id, sha1($str))) {
            $this->session->set_flashdata('password_incorrecto', 'La contraseña Anterior no es Correcta.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
