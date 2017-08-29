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
            'raza_id' => $data['raza_id'],
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

    public function insertreproduccion($toro, $fecha, $concesion, $vaca) {

        $newdata = array(
            'nombre_toro' => $toro,
            'fecha_secado' => $fecha,
            'tipo' => $concesion,
            'cabeza_ganado_id_cabeza' => $vaca
        );
        $this->db->insert('ctrl_reproductivo', $newdata);
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

    public function countvacunas($codecows,$id) {
        $this->db->select('cabeza_ganado.nombre,ctrl_vacunas.fecha,ctrl_vacunas.observaciones,ctrl_vacunas.fecha_prox,ctrl_vacunas.costo');
        $this->db->from('ctrl_vacunas');
        $this->db->join('cabeza_ganado', 'cabeza_ganado.id_cabeza = ctrl_vacunas.cabeza_ganado_id_cabeza');
        $this->db->where('cabeza_ganado.nombre', $codecows);
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        return $this->db->count_all_results();
    }

    public function countproduccion($codecows,$id) {
        $this->db->select('produccion.litros,produccion.vendida,produccion.comprandor');
        $this->db->from('produccion');
        $this->db->join('cabeza_ganado', 'cabeza_ganado.id_cabeza = produccion.cabeza_ganado_id_cabeza');
        $this->db->where('cabeza_ganado.nombre', $codecows);
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        return $this->db->count_all_results();
    }

    public function countreproduccion($codecows,$id) {
        $this->db->from('ctrl_reproductivo');
        $this->db->join('cabeza_ganado', 'cabeza_ganado.id_cabeza = ctrl_reproductivo.cabeza_ganado_id_cabeza');
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        $this->db->where('cabeza_ganado.nombre', $codecows);
        $this->db->or_where('ctrl_reproductivo.nombre_toro', $codecows);
        return $this->db->count_all_results();     
    }

    public function fecthvacunas($codecows,$id,$limit, $offset) {
        $this->db->select('cabeza_ganado.nombre,ctrl_vacunas.fecha,ctrl_vacunas.observaciones,ctrl_vacunas.fecha_prox,ctrl_vacunas.costo,ctrl_vacunas.vacunas_id_vacunas');
        $this->db->from('ctrl_vacunas');
        $this->db->join('cabeza_ganado', 'cabeza_ganado.id_cabeza = ctrl_vacunas.cabeza_ganado_id_cabeza');
        $this->db->where('cabeza_ganado.nombre', $codecows);
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function fecthproduccion($codecows,$id,$limit, $offset) {
        $this->db->select('produccion.litros,produccion.vendida,produccion.comprandor');
        $this->db->from('produccion');
        $this->db->join('cabeza_ganado', 'cabeza_ganado.id_cabeza = produccion.cabeza_ganado_id_cabeza');
        $this->db->where('cabeza_ganado.nombre', $codecows);
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function fecthreproduccion($codecows,$id,$limit, $offset) {
        $this->db->from('ctrl_reproductivo');
        $this->db->join('cabeza_ganado', 'cabeza_ganado.id_cabeza = ctrl_reproductivo.cabeza_ganado_id_cabeza');
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        $this->db->where('cabeza_ganado.nombre', $codecows);
        $this->db->or_where('ctrl_reproductivo.nombre_toro', $codecows);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function fecth($id, $limit, $offset) {
        $this->db->select('id_cabeza,nombre');
        $this->db->from('cabeza_ganado');
        $this->db->where('usuario_id_usuario', $id);
        $this->db->where('des_procedencia', NULL);
        $this->db->order_by("id_cabeza", "DESC");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function fasependientes($id) {
        $this->db->distinct();
        $this->db->select('ctrl_reproductivo.nombre_toro,ctrl_reproductivo.fecha_secado,ctrl_reproductivo.tipo');
        $this->db->from('ctrl_reproductivo');
        $this->db->join('cabeza_ganado', 'cabeza_ganado.id_cabeza = ctrl_reproductivo.cabeza_ganado_id_cabeza');
        $this->db->where('ctrl_reproductivo.fecha_parto', NULL);
        $this->db->where('ctrl_reproductivo.num_nacidos', NULL);
        $this->db->where('ctrl_reproductivo.num_muertos', NULL);
        $this->db->where('cabeza_ganado.usuario_id_usuario', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function fasependientesvacas($toro, $fecha, $concesion) {

        $this->db->select('cabeza_ganado.nombre, ctrl_reproductivo.cabeza_ganado_id_cabeza');
        $this->db->from('ctrl_reproductivo');
        $this->db->join('cabeza_ganado', 'ctrl_reproductivo.cabeza_ganado_id_cabeza=cabeza_ganado.id_cabeza');
        $this->db->where('ctrl_reproductivo.nombre_toro', $toro);
        $this->db->where('ctrl_reproductivo.fecha_secado', $fecha);
        $this->db->where('ctrl_reproductivo.tipo', $concesion);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertreproduccionfinal($toro, $fecha, $concesion, $numnac, $nummue, $fechaparto) {
        $data = array(
            'fecha_parto' => $fechaparto,
            'num_nacidos' => $numnac,
            'num_muertos' => $nummue
        );
        $this->db->where('nombre_toro', $toro);
        $this->db->where('fecha_secado', $fecha);
        $this->db->where('tipo', $concesion);
        $this->db->update('ctrl_reproductivo', $data);
        return true;
    }

    public function obtenervacunas($id) {
        $this->db->select('nombre');
        $this->db->from('vacunas');
        $this->db->where('usuario_id_usuario', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenernamevaca($vaca) {

        $this->db->select('nombre');
        $this->db->from('cabeza_ganado');
        $this->db->where('id_cabeza', $vaca);
        $query = $this->db->get();

        return $query->row();
    }

    public function obtenerraza() {

        $this->db->select('nombre_raza');
        $this->db->from('raza');
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

    public function getnamevacuna($idvacuna) {

        $this->db->select('nombre');
        $this->db->from('vacunas');
        $this->db->where('id_vacunas', $idvacuna);
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
        $this->db->where('nombre', $key);
        $this->db->where('usuario_id_usuario', $iduser);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function catalagodepadresraza($key, $iduser) {

        $this->db->select('raza_id');
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

    public function getnamecomprador($id) {
        $this->db->select('nombre');
        $this->db->from('comprador');
        $this->db->where('id_comprador', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function catalagovendedor($vendida, $id) {

        $this->db->select('id_comprador');
        $this->db->from('comprador');
        $this->db->where('nombre', $vendida);
        $this->db->where('usuario_id_usuario', $id);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {

            $newdata = array(
                'nombre' => $vendida,
                'usuario_id_usuario' => $id
            );

            $this->db->insert('comprador', $newdata);

            $this->db->select('id_comprador');
            $this->db->from('comprador');
            $this->db->where('nombre', $vendida);
            $this->db->where('usuario_id_usuario', $id);
            $queryproduccion = $this->db->get();

            if ($queryproduccion->num_rows() == 0) {
                return false;
            } else {
                return $queryproduccion->row();
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

    public function insertproduccion($litros, $vendida, $costo, $idcode) {

        $newdata = array(
            'litros' => $litros,
            'vendida' => $costo,
            'comprandor' => $vendida,
            'cabeza_ganado_id_cabeza' => $idcode
        );
        $this->db->insert('produccion', $newdata);

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

    public function borrarproduccion($litros, $codevendedor, $costo, $idcode) {

        $where['litros'] = $litros;
        $where['vendida'] = $codevendedor;
        $where['comprandor'] = $costo;
        $where['cabeza_ganado_id_cabeza'] = $idcode;
        $this->db->delete('produccion', $where);

        return true;
    }

    public function borrarreproduccion($toro, $concesion, $fecha, $vaca) {

        $where['nombre_toro'] = $toro;
        $where['fecha_secado'] = $fecha;
        $where['tipo'] = $concesion;
        $where['cabeza_ganado_id_cabeza'] = $vaca;
        $this->db->delete('ctrl_reproductivo', $where);
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

    public function Updatedestinofinal($fecha, $codecows, $tipodemuerto,$id) {
        $datainf = array(
            'des_procedencia' => $tipodemuerto,
            'fecha_destino' => $fecha
        );
        $this->db->where('usuario_id_usuario', $id);
        $this->db->where('nombre', $codecows);
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

    public function Checkall($id, $email) {
        $this->db->select('id_usuario,correo,status');
        $this->db->from('usuario');
        $this->db->where('id_usuario', $id);
        $this->db->where('correo', $email);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function activateAccountpay($id) {

        $datestring = '%Y/%m/%d';
        $time = time();
        mdate($datestring, $time);

        $this->db->select('fecha_paga,fecha_paga_prox');
        $this->db->from('usuario');
        $this->db->where('id_usuario', $id);
        $query = $this->db->get();
        $query->row();

        $fechanext = $query->fecha_paga_prox;
        
        $fechadiv = mdate($datestring, $time)->diff(mdate($datestring, $fechanext));

        $nuevafecha = strtotime('+'.$fechadiv->d.' day,+'.$fechadiv->m.' month', strtotime(mdate($datestring, $fechanext)));

        $data = array(
            'status' => 1,
            'fecha_paga' => mdate($datestring, $time),
            'fecha_paga_prox' => date('Y/m/d', $nuevafecha)
        );

        $this->db->where('id', $id);
        $this->db->update('usuario', $data);
    }

}
