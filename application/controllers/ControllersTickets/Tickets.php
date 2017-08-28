<?php

class Tickets extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ModelTickets');
        $this->load->library('pagination');
    }

    public function AltaTickets() {
        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {

            $status = $data['Status'] = $this->session->userdata('Status');
            $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');
            $data['FechaProx'] = $this->session->userdata('FechaProx');
            if ($status == 1 && $admin == NULL) {

                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;
                $data['errores'] = $this->ModelTickets->GetErrorName();
                $this->load->view('header', $data);
                $this->load->view('ViewsTickets/AltaTickets');
                $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function MonitoreoTickets() {
        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {

            $status = $data['Status'] = $this->session->userdata('Status');
            $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');
            $data['FechaProx'] = $this->session->userdata('FechaProx');
            if ($status == 1 && $admin == NULL) {

                $config = array();
                $config['base_url'] = base_url() . 'MonitoreoTickets';
                $config['total_rows'] = $this->ModelTickets->count($id);
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

                $data['query'] = $this->ModelTickets->fecth($id, $config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();

                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;
                if (!$this->input->is_ajax_request())
                    $this->load->view('header', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('ViewsTickets/MonitoreoTickets');
                $this->load->view('ViewsTickets/PaginadoTickets', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function AddTickets() {
        $id = $data['Id'] = $this->session->userdata('Id');

        if (empty($id)) {
            redirect("welcome/Login");
        } else {

            $idperson = $this->input->post('id');
            $error = $this->input->post('Error');
            $descripcion = $this->input->post('Descripcion');
            $fechainicio = $this->input->post('fecha');

            $codeerror = $this->ModelTickets->GetError($error);

            $iderror = $codeerror->id_errores;


            $this->ModelTickets->InsertTicket($descripcion, $fechainicio, $idperson, $iderror);
        }
    }

}
