<?php
/*
    * this class is for Map
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
        /*
        $this->db->select('geo_posicion.lat, geo_posicion.lng, cabeza_ganado.nombre, cabeza_ganado.id_cabeza');
        $this->db->from('geo_posicion');
        $this->db->join('cabeza_ganado', 'geo_posicion.cabeza_ganado_id_cabeza  = cabeza_ganado.id_cabeza');
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);*/



        /*Works
        $this->db->select('lat, lng');
        $this->db->from('geo_posicion');
        $this->db->where('cabeza_ganado_usuario_id_usuario', $id);
        */
        $query = $this->db->get();
        return $query->result();
        
    }
    
     /*Insert a point in the Cows*/
    function addpointcow($TempBat, $TempCow, $VBat, $Activity, $Lat, $Lng, $IdUser, $IdCow, $IdDevice, $Date) {
        
        $data = array(
            'bat_temp' => $TempBat,
            'temp' => $TempCow,
            'bat_level' => $VBat,
            'celo' => $Activity,
            'lat' => $Lat,
            'lng' => $Lng,
            'cabeza_ganado_usuario_id_usuario' => $IdUser,
            'cabeza_ganado_id_cabeza' => $IdCow,
            'dispositivo_id_dispositivo' => $IdDevice,
            'fecha_hora' => $Date
        );
        
        $this->db->insert('geo_posicion', $data);
        
    }
    
    function getpointcow(){
        
        
        
        return $Cow1[] = $obj;
        
    }
    
}