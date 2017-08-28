<?php

class welcome_model extends CI_Model {

    private $usuario = 'usuario';

    public function CheckUser($email, $password) {

        $Contrasena = sha1($password);
        $this->db->select('id_usuario,correo,status,tipo_de_usuario_id_tipo_de_usuario');
        $this->db->from('usuario');
        $this->db->where('correo', $email);
        $this->db->where('contrasena', $Contrasena);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function Check($email) {

        $this->db->select('id_usuario,correo,status');
        $this->db->from('usuario');
        $this->db->where('correo', $email);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function add_new_user($Email, $Pwd) {

        $Contrasena = sha1($Pwd);
        $data = array(
            'correo' => $Email,
            'contrasena' => $Contrasena
        );
        $this->db->insert('usuario', $data);
    }

    public function activateAccount() {
        $newData = array(
            'status' => 1
        );
        $this->db->update($this->usuario, $newData);
    }

    public function updateeditinf($data) {

        $id = $data['id'];

        $datainf = array(
            'nombre' => $data['nombre'],
            'apellido_paterno' => $data['apelldiop'],
            'apellido_materno' => $data['apelldiom'],
            'telefono' => $data['tel'],
            'celular' => $data['cel'],
            'callenumero' => $data['dir'],
            'colonia' => $data['colonia'],
            'municipio' => $data['municipio'],
            'estado' => $data['estado']
        );
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $datainf);

        return true;
    }

    public function updatePassword($data) {
        
        $id = $data['id'];
        $pws = $data['restpwd'];
      
        $Contrasena = sha1($pws);
        
        $datanew = array(
            'contrasena' => $Contrasena
        );
        
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $datanew);
        
        return true;
        
    }

}
