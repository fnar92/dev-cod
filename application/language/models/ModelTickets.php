<?php

class ModelTickets extends CI_Model {

    private $ctrl_errores = 'ctrl_errores';
    private $ticket = 'ticket';

    public function GetError($error) {

        $this->db->select('id_errores');
        $this->db->from('ctrl_errores');
        $this->db->where('nombre_error', $error);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function GetErrorName() {

        $this->db->select('nombre_error');
        $this->db->from('ctrl_errores');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertTicket($descripcion, $fechainicio, $idperson, $iderror) {

        $newdata = array(
            'descripcion' => $descripcion,
            'fecha_inicio' => $fechainicio,
            'estado_tickets' => "inicio",
            'usuario_id_usuario' => $idperson,
            'ctrl_errores_id_errores' => $iderror
        );
        $this->db->insert('ticket', $newdata);
        return true;
    }

    public function count($id) {
        $this->db->select('id_ticket,descripcion,fecha_inicio,estado_tickets,ctrl_errores_id_errores');
        $this->db->from('ticket');
        $this->db->where('usuario_id_usuario', $id);
        $this->db->where('estado_tickets', "inicio", "OR", "intermedio");
        return $this->db->count_all_results();
    }

    public function fecth($id, $limit, $offset) {
        $this->db->select('id_ticket,descripcion,fecha_inicio,estado_tickets,ctrl_errores_id_errores');
        $this->db->from('ticket');
        $this->db->where('usuario_id_usuario', $id);
        $this->db->where('estado_tickets', "inicio", "OR", "intermedio");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

}
