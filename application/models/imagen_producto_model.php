<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imagen_producto_model extends CI_Model {

    public function construct() {
        parent::__construct();
    }

    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
    function subir($titulo, $imagen, $descripcion) {
        $data = array(
            'nombre' => $titulo,
            'ruta_imagen' => $imagen,
            'descripcion' => $descripcion
        );
        return $this->db->insert('productos', $data);
    }

    function conseguir() {
        $query = $this->db->get('productos');
        return $query->result_array();
    }

    function obtener_producto($id) {
        $query = $this->db->get_where('productos', array('id_producto' => $id));
        return $query->row();
    }

    function modificar_producto($data,$imagen) {
        $this->db->where('id_producto', $data['id_producto']);
        unset($data['id_producto']);
        unset($data['token']);
        unset($data['userfile']);
        unset($data['imagen_pasada']);
        $data+=array(
            'ruta_imagen' => $imagen,
        );
        return $this->db->update('productos', $data);
    }
    function modificar_producto_sin_imagen($data) {
        $this->db->where('id_producto', $data['id_producto']);
        unset($data['id_producto']);
        unset($data['token']);
        unset($data['userfile']);
        unset($data['imagen_pasada']);
        return $this->db->update('productos', $data);
    }
    function eliminar_producto($id) {
        $this->db->delete('productos', array('id_producto' => $id)); 
    }

}