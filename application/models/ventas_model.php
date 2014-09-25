<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Ventas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function nueva_venta($data) {
        $this->db->select('id_producto,nombre,precio');
        $data_venta['id_usuario'] = $data['id_usuario'];
        $data_venta['fecha_venta'] = date('Y-m-d');
        unset($data['id_usuario']);
        $this->db->insert('ventas', $data_venta);
        $id_venta = $this->db->insert_id();
        $data_detalle = array();
        $count = count($data['id_producto']);
        for ($i = 0; $i < $count; $i++) {
            $data_detalle[] = array(
                'id_venta' => $id_venta,
                'id_producto' => $data['id_producto'][$i],
                'cantidad' => $data["cantidad"][$i],
                'precio' => $data["precio"][$i],
            );
        }
        $this->db->insert_batch('detalle_venta', $data_detalle);
        return TRUE;
    }

    function ventas_mes($year,$month) {
        $q = $query = $this->db->query("SELECT v.id_venta, u.usuario, CONCAT( u.nombre,  ' ', u.apellido_paterno,  ' ', u.apellido_materno ) AS Nombre, v.fecha_venta, tv.total
            FROM ventas v
            INNER JOIN usuarios u ON v.id_usuario = u.id_usuario
            INNER JOIN total_venta tv ON tv.id_venta = v.id_venta
            WHERE YEAR( v.fecha_venta ) =$year
            AND MONTH( v.fecha_venta ) =$month");
        return $q->result_array();
    }
    function get_months() {
        $q = $this->db->get('meses');
        return $q->result_array();
    }
    function get_years() {
        $this->db->select('YEAR( fecha_venta ) AS  "year"');
        $this->db->group_by("YEAR(fecha_venta)");
        $q = $this->db->get('ventas');
        return $q->result_array();
    }

}