<?php

class ModelTrazabilidad extends CI_Model {

    private $cabeza_ganado = 'cabeza_ganado';
    private $comprador = 'comprador';
    private $factura = 'factura';
    private $ctrl_vacunas = 'ctrl_vacunas';

    public function Insertvaca($data) {

        $newdata = array(
            'procedencia' => $data['procedencia'],
            'nombre' => $data['nombre'],
            'fecha_nacimiento' => $data['fec_nac'],
            'sexo' => $data['genero'],
            'raza' => $data['raza'],
            'color' => $data['color'],
            'padre' => $data['padre'],
            'raza_padre' => $data['raza_padre'],
            'codigo_padre' => $data['codigo_padre'],
            'madre' => $data['madre'],
            'raza_madre' => $data['raza_madre'],
            'codigo_madre' => $data['codigo_madre'],
            'observaciones' => $data['observaciones'],
            'usuario_id_usuario' => $data['id']
        );
        $this->db->insert('cabeza_ganado', $newdata);
        return true;
    }

    public function Insertvendedor($data) {

        $this->db->select('nombre,usuario_id_usuario');
        $this->db->from('comprador');
        $this->db->where('nombre', $data['nombre']);
        $this->db->where('usuario_id_usuario', $data['id']);
        $checkquery = $this->db->get();

        if ($checkquery->num_rows() == 0) {

            $newvendedor = array(
                'nombre' => $data['nombre'],
                'usuario_id_usuario' => $data['id']
            );
            $this->db->insert('comprador', $newvendedor);
            return true;
        } else {

            return true;
        }
    }

    public function checkvendedor($nombre, $iduser) {

        $this->db->select('id_comprador');
        $this->db->from('comprador');
        $this->db->where('nombre', $nombre);
        $this->db->where('usuario_id_usuario', $iduser);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function InsertFact($datafact) {

        $newdatafact = array(
            'num_factura' => $datafact['numfact'],
            'costo' => $datafact['costo'],
            'comprador_id_comprador' => $datafact['id']
        );
        $this->db->insert('factura', $newdatafact);
        return true;
    }

    public function count($id) {
        $this->db->select('id_cabeza,nombre');
        $this->db->from('cabeza_ganado');
        $this->db->where('usuario_id_usuario', $id);
        $this->db->where('des_procedencia', NULL);
        return $this->db->count_all_results();
    }

    public function fecth($id, $limit, $offset) {
        $this->db->select('id_cabeza,nombre');
        $this->db->from('cabeza_ganado');
        $this->db->where('usuario_id_usuario', $id);
        $this->db->where('des_procedencia', NULL);
        $this->db->order_by("nombre", "asc");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenervacunas($id) {
        $this->db->select('nombre');
        $this->db->from('vacunas');
        $this->db->where('usuario_id_usuario', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerraza($id) {

        $this->db->distinct();
        $this->db->select('raza');
        $this->db->from('cabeza_ganado');
        $this->db->where('usuario_id_usuario', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenercolor($id) {

        $this->db->distinct();
        $this->db->select('color');
        $this->db->from('cabeza_ganado');
        $this->db->where('usuario_id_usuario', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function checkuservacuna($idcode) {

        $this->db->select('usuario_id_usuario');
        $this->db->from('cabeza_ganado');
        $this->db->where('id_cabeza', $idcode);
        $query = $this->db->get();

        return $query->row();
    }

    public function catalagodepadres($key, $iduser) {

        $this->db->select('id_cabeza');
        $this->db->from('cabeza_ganado');
        $this->db->like('nombre', $key);
        $this->db->where('usuario_id_usuario', $iduser);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function catalagodename($key, $iduser) {

        $this->db->select('nombre');
        $this->db->from('cabeza_ganado');
        $this->db->where('nombre', $key);
        $this->db->where('usuario_id_usuario', $iduser);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function catalagodeidcows($key, $iduser) {

        $this->db->select('nombre');
        $this->db->from('cabeza_ganado');
        $this->db->where('id_cabeza', $key);
        $this->db->where('usuario_id_usuario', $iduser);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function catalagodepadresraza($key, $iduser) {

        $this->db->select('raza');
        $this->db->from('cabeza_ganado');
        $this->db->like('nombre', $key);
        $this->db->where('usuario_id_usuario', $iduser);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function catalagovacuna($vacuna, $idusuario) {

        $this->db->select('id_vacunas');
        $this->db->from('vacunas');
        $this->db->where('nombre', $vacuna);
        $this->db->where('usuario_id_usuario', $idusuario);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {

            $newdata = array(
                'nombre' => $vacuna,
                'usuario_id_usuario' => $idusuario
            );

            $this->db->insert('vacunas', $newdata);

            $this->db->select('id_vacunas');
            $this->db->from('vacunas');
            $this->db->where('nombre', $vacuna);
            $this->db->where('usuario_id_usuario', $idusuario);
            $queryvacuna = $this->db->get();

            if ($queryvacuna->num_rows() == 0) {
                return false;
            } else {
                return $queryvacuna->row();
            }
        } else {
            return $query->row();
        }
    }

    public function insertvacuna($fecha, $observacion, $fecha_prox, $costo, $idcode, $codevacuna) {

        $newdata = array(
            'fecha' => $fecha,
            'observaciones' => $observacion,
            'fecha_prox' => $fecha_prox,
            'costo' => $costo,
            'cabeza_ganado_id_cabeza' => $idcode,
            'vacunas_id_vacunas' => $codevacuna
        );
        $this->db->insert('ctrl_vacunas', $newdata);

        return true;
    }

    public function borrarvacuna($fecha, $observacion, $fecha_prox, $costo, $idcode) {

        $where['fecha'] = $fecha;
        $where['observaciones'] = $observacion;
        $where['fecha_prox'] = $fecha_prox;
        $where['costo'] = $costo;
        $where['cabeza_ganado_id_cabeza'] = $idcode;
        $this->db->delete('ctrl_vacunas', $where);

        return true;
    }

    public function Insertdestinofinal($codecows, $costobuy, $tipodemuerto) {

        $newdatafinal = array(
            'tipo_final' => $tipodemuerto,
            'costo' => $costobuy,
            'cabeza_ganado_id_cabeza' => $codecows
        );
        $this->db->insert('destino', $newdatafinal);

        return true;
    }

    public function Updatedestinofinal($fecha, $codecows, $tipodemuerto) {
        $datainf = array(
            'des_procedencia' => $tipodemuerto,
            'fecha_destino' => $fecha
        );
        $this->db->where('id_cabeza', $codecows);
        $this->db->update('cabeza_ganado', $datainf);

        return true;
    }

    public function DeleteGeo($codecows) {
        $this->db->where('cabeza_ganado_id_cabeza', $codecows);
        $this->db->delete('geo_posicion');
    }

    public function fecthall($id) {
        $this->db->select('id_cabeza');
        $this->db->from('cabeza_ganado');
        $this->db->where('usuario_id_usuario', $id);
        $this->db->where('des_procedencia', NULL);
        $query = $this->db->get();
        return $query->result();
    }

}
