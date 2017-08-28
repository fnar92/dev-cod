<?php
/*
    * this class is for playlist
    */
class Model_geolocalizacion extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    /*Return the points of limit by user_id*/
    function getLimit($id) {
        $where['usuario_id_usuario'] = $id;
        $query = $this->db->get_where('geo_limite', $where);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    /*Insert a point in the limit*/
    function insertPoint($data) {
        $this->db->insert('geo_limite', $data);
    }

    /*Delete a point in the limit*/
    function deletePoint($id_limite) {
        $this->db->where('id_limite', $id_limite);
        $this->db->delete('geo_limite');
    }

    /*Get the cows with ID*/
    function getCows($id) {
        $this->db->select('cabeza_ganado.id_cabeza, cabeza_ganado.nombre, geo_posicion.lat, geo_posicion.lng');
        $this->db->from('geo_posicion');
        $this->db->join('cabeza_ganado', 'geo_posicion.cabeza_ganado_id_cabeza  = cabeza_ganado.id_cabeza');
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
}