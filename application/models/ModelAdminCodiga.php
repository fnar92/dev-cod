<?php

class ModelAdminCodiga extends CI_Model {

    public function CambiarAdmin($pws, $newpws) {

        $contrasena = sha1($pws);
        $newcontrasena = sha1($newpws);

        $data = array(
            'contrasena' => $newcontrasena
        );

        $this->db->where('correo', 'AdminCodiga@gmail.com');
        $this->db->where('contrasena', $contrasena);
        $this->db->where('status', 1);
        $this->db->where('tipo_de_usuario_id_tipo_de_usuario', 1);
        $this->db->update('usuario', $data);
    }

    public function counttickets() {
        $this->db->from('ticket');
        $this->db->where('fecha_fin', NULL);
        return $this->db->count_all_results();
    }

    public function countusuario() {
        $this->db->from('usuario');
        return $this->db->count_all_results();
    }

    public function countusersoporte() {
        $this->db->from('usuario');
        $this->db->where('tipo_de_usuario_id_tipo_de_usuario', 2);
        return $this->db->count_all_results();
    }

    public function fetchusersoporte($limit, $offset) {

        $this->db->from('usuario');
        $this->db->limit($limit, $offset);
        $this->db->order_by("id_usuario", "desc");
        $this->db->where('tipo_de_usuario_id_tipo_de_usuario', 2);
        $query = $this->db->get();
        return $query->result();
    }

    public function fecthtickets($limit, $offset) {
        $this->db->select('usuario.nombre,ticket.id_ticket,ticket.usuario_id_usuario,ticket.descripcion,ticket.ctrl_errores_id_errores,ticket.fecha_inicio,ticket.estado_tickets');
        $this->db->from('ticket');
        $this->db->join('usuario', 'usuario.id_usuario = ticket.usuario_id_usuario');
        $this->db->where('fecha_fin', NULL);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function fecthusuario($limit, $offset) {
        $this->db->from('usuario');
        $this->db->limit($limit, $offset);
        $this->db->order_by("fecha_paga", "desc");
        $this->db->order_by("fecha_paga_prox", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function cambioticketmedio($cambio, $id) {

        $data = array(
            'estado_tickets' => $cambio
        );

        $this->db->where('id_ticket', $id);
        $this->db->update('ticket', $data);
    }

    public function cambioticketfinal($cambio, $id,$timeend) {

        $data = array(
            'estado_tickets' => $cambio,
            'fecha_fin' => $timeend
        );

        $this->db->where('id_ticket', $id);
        $this->db->update('ticket', $data);
    }

    public function AddSoporte($email, $pws) {

        $contrasena = sha1($pws);

        $data = array(
            'correo' => $email,
            'contrasena' => $contrasena,
            'status' => 1,
            'tipo_de_usuario_id_tipo_de_usuario' => 2
        );

        $this->db->insert('usuario', $data);
    }

    public function DeleteUser($code) {

        $data = array(
            'status' => 2
        );

        $this->db->where('id_usuario', $code);
        $this->db->update('usuario', $data);
    }

    public function ActivateUser($code) {

        $data = array(
            'status' => 1
        );

        $this->db->where('id_usuario', $code);
        $this->db->update('usuario', $data);
    }

    public function DeleteUserSoporte($code) {

        $this->db->where('id_usuario', $code);
        $this->db->delete('usuario');
    }

}
