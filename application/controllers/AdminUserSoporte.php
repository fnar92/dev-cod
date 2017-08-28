<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserSoporte extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ModelAdminCodiga');
        $this->load->library('pagination');
    }

    public function Admin() {

        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');
        $status = $data['Status'] = $this->session->userdata('Status');
        $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');

        if (empty($id)) {
            redirect("Login");
        } else {

            if ($status == 1 && $admin == 2) {

                $config = array();
                $config['base_url'] = base_url() . 'SoporteUsuariosSP';
                $config['total_rows'] = $this->ModelAdminCodiga->countusuario();
                $config['per_page'] = 2;

                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = false;
                $config['last_link'] = false;
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';

                $this->pagination->initialize($config);

                $page = $this->uri->segment(2);

                $data['query'] = $this->ModelAdminCodiga->fecthusuario($config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();


                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;

                if (!$this->input->is_ajax_request())
                    $this->load->view('AdminCodiga/UserSoporteHeader', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('AdminCodiga/SoporteUsuarios/SoporteUsuarios');
                $this->load->view('AdminCodiga/SoporteUsuarios/Usuarios', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('AdminCodiga/UserSoporteFooter');
            } else {
                redirect("Login");
            }
        }
    }

    public function SoporteTickets() {

        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');
        $status = $data['Status'] = $this->session->userdata('Status');
        $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');

        if (empty($id)) {
            redirect("Login");
        } else {

            if ($status == 1 && $admin == 2) {

                $config = array();
                $config['base_url'] = base_url() . 'SoporteUsuariosSP';
                $config['total_rows'] = $this->ModelAdminCodiga->counttickets();
                $config['per_page'] = 2;

                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = false;
                $config['last_link'] = false;
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';

                $this->pagination->initialize($config);

                $page = $this->uri->segment(2);

                $data['query'] = $this->ModelAdminCodiga->fecthtickets($config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();


                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;

                if (!$this->input->is_ajax_request())
                    $this->load->view('AdminCodiga/UserSoporteHeader', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('AdminCodiga/SoporteTickets/SoporteTickets');
                $this->load->view('AdminCodiga/SoporteTickets/Tickets', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('AdminCodiga/UserSoporteFooter');
            } else {
                redirect("Login");
            }
        }
    }


}