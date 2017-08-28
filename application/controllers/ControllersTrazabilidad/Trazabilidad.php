<?php

class Trazabilidad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ModelTrazabilidad');
        $this->load->library('pagination');
    }

    public function Alta() {
        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {

            $status = $data['Status'] = $this->session->userdata('Status');
            $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');
            $data['FechaProx'] = $this->session->userdata('FechaProx');
            if ($status == 1 && $admin == NULL) {
                $data['fetchraza'] = $this->ModelTrazabilidad->obtenerraza();

                $data['fetchcolor'] = $this->ModelTrazabilidad->obtenercolor($id);

                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;
                $this->load->view('header', $data);
                $this->load->view('ViewsTrazabilidad/AltaAnimales');
                $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function AdministracionVacunas() {
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
                $config['base_url'] = base_url() . 'AdministracionVacunas';
                $config['total_rows'] = $this->ModelTrazabilidad->count($id);
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

                $data['query'] = $this->ModelTrazabilidad->fecth($id, $config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();

                $data['fetchvacunas'] = $this->ModelTrazabilidad->obtenervacunas($id);

                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;
                if (!$this->input->is_ajax_request())
                    $this->load->view('header', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('ViewsTrazabilidad/FormVacuna');
                $this->load->view('ViewsTrazabilidad/Vacunas', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function AdministracionProduccion() {
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
                $config['base_url'] = base_url() . 'AdministracionProduccion';
                $config['total_rows'] = $this->ModelTrazabilidad->count($id);
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

                $data['query'] = $this->ModelTrazabilidad->fecth($id, $config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();

                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;

                if (!$this->input->is_ajax_request())
                    $this->load->view('header', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('ViewsTrazabilidad/FormProduccion');
                $this->load->view('ViewsTrazabilidad/Produccion', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function AdministracionReproduccion() {
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

                $config = array();
                $config['base_url'] = base_url() . 'AdministracionReproduccion';
                $config['total_rows'] = $this->ModelTrazabilidad->count($id);
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

                $data['query'] = $this->ModelTrazabilidad->fecth($id, $config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();

                $data['fasespendientes'] = $this->ModelTrazabilidad->fasependientes($id);

                if (!$this->input->is_ajax_request())
                    $this->load->view('header', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('ViewsTrazabilidad/FormReproduccion');
                $this->load->view('ViewsTrazabilidad/Reproduccion', $data);
                if (!$this->input->is_ajax_request())
                    $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function fasespendientesvacas() {

        $toro = $this->input->post('toro');
        $fecha = $this->input->post('fecha');
        $concesion = $this->input->post('concesion');

        $data['vacas'] = $this->ModelTrazabilidad->fasependientesvacas($toro, $fecha, $concesion);

        echo'<label>Vacas Que Fueron Preñadas la fecha ' . $fecha . ' por el Toro: ' . $toro . '</label>';
        echo'<select multiple class = "form-control" disabled>';

        foreach ($data['vacas'] as $row) {

            echo '<option>';
            echo $row->nombre . " ";
            echo $row->cabeza_ganado_id_cabeza;
            echo '</option>';
        }
    }

    public function insertreproduccion() {

        $toro = $this->input->post('toro');
        $fecha = $this->input->post('fecha');
        $concesion = $this->input->post('concesion');
        $numnac = $this->input->post('numnacido');
        $nummue = $this->input->post('numeromuerto');
        $fechaparto = $this->input->post('fechaparto');

        if ($this->ModelTrazabilidad->insertreproduccionfinal($toro, $fecha, $concesion, $numnac, $nummue, $fechaparto)) {
            echo 'Informacion Guardada Correctamente';
        } else {
            echo 'Error al Guardar dicha Informacion';
        }
    }

    public function Baja() {
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
                $this->load->view('header', $data);
                $this->load->view('ViewsTrazabilidad/BajaAnimales');
                $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function Reportes() {
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

                $this->load->view("header", $data);
                $this->load->view("ViewsTrazabilidad/Reportes");
                $this->load->view("ViewsTrazabilidad/ResultadoReportes");
                $this->load->view("footer");
            } else {
                redirect("Login");
            }
        }
    }

    public function AddVaca($id) {

        $data['procedencia'] = $this->input->post('Procedencia');

        if ($data['procedencia'] == 'adquisicion') {
            $data['procedencia'] = 0;
        } else {
            $data['procedencia'] = 1;
        }

        $data['nombre'] = $this->input->post('Nombre');
        $data['fec_nac'] = $this->input->post('FechaNac');
        $data['genero'] = $this->input->post('sexo');
        $data['raza'] = $this->input->post('Razas');
        $data['color'] = $this->input->post('Color');

        $data['padre'] = $this->input->post('NombrePadre');
        $data['raza_padre'] = $this->input->post('RazasPadre');
        $data['codigo_padre'] = $this->input->post('CodigoPurezaPadre');

        $data['madre'] = $this->input->post('NombreMadre');
        $data['raza_madre'] = $this->input->post('RazasMadre');
        $data['codigo_madre'] = $this->input->post('CodigoPurezaMadre');

        $data['observaciones'] = $this->input->post('comentario');
        $data['id'] = $id;

        if ($this->ModelTrazabilidad->Insertvaca($data)) {
            echo "<script>
        alert('Recien Nacido Registrado Correctamente');
        window.location.href = '../../../AltaAnimales';
</script>";
        } else {
            echo "<script>
    alert('Error en la Alta del nuevo recien nacido !Try Again¡');
</script>";
        }
    }

    public function AddVendedor() {

        $id = $data['id'] = $this->input->post('id');

        $nombre = $data['nombre'] = $this->input->post('nombre');
        $numfact = $data['numerofact'] = $this->input->post('numerofactura');

        if ($this->ModelTrazabilidad->Insertvendedor($data)) {

            $idvendedor = $this->ModelTrazabilidad->checkvendedor($nombre, $id);

            $idseller = $idvendedor->id_comprador;

            $datafact['numfact'] = $numfact;
            $costo = $datafact['costo'] = $this->input->post('costo');

            $negativo = 0 - $costo;

            $datafact['costo'] = $negativo;

            $datafact['id'] = $idseller;

            if ($this->ModelTrazabilidad->InsertFact($datafact)) {

                echo "<script>
    alert('Alta de Vendedor');
</script>";
            } else {
                echo "<script>
    alert('Error en la Alta del Factura !Try Again¡');
</script>";
            }
        } else {
            echo "<script>
    alert('Error en la Alta del Vendedor !Try Again¡');
</script>";
        }
    }

    public function controlreproduccion() {

        $toro = $this->input->post('Codigo');
        $concesion = $this->input->post('concesion');
        $fecha = $this->input->post('FechaSecado');
        $vaca = $this->input->post('vaca');

        if ($this->ModelTrazabilidad->insertreproduccion($toro, $fecha, $concesion, $vaca)) {
            echo 'Informacion Guardada Correctamente';
        } else {
            echo 'Error al Guardar dicha Informacion';
        }
    }

    public function controlvacunas() {

        $vacuna = $this->input->post('vacuna');
        $idcode = $this->input->post('idcode');

        $iduser = $this->ModelTrazabilidad->checkuservacuna($idcode);

        $idusuario = $iduser->usuario_id_usuario;


        $idvacuna = $this->ModelTrazabilidad->catalagovacuna($vacuna, $idusuario);

        $codevacuna = $idvacuna->id_vacunas;


        $fecha = $this->input->post('fecha');
        $observacion = $this->input->post('observacion');
        $fecha_prox = $this->input->post('fecha_prox');
        $costo = $this->input->post('costo');


        if ($this->ModelTrazabilidad->insertvacuna($fecha, $observacion, $fecha_prox, $costo, $idcode, $codevacuna)) {
            echo 'Informacion Guardada Correctamente';
        } else {
            echo 'Error al Guardar dicha Informacion';
        }
    }

    public function controlproduccion() {

        $id = $data['Id'] = $this->session->userdata('Id');

        if (empty($id)) {
            redirect("Login");
        } else {

            $idcode = $this->input->post('idcode');
            $litros = $this->input->post('litros');
            $vendida = $this->input->post('vendedo');
            $costo = $this->input->post('costo');

            $idvendedor = $this->ModelTrazabilidad->catalagovendedor($vendida, $id);

            $codevendedor = $idvendedor->id_comprador;


            if ($this->ModelTrazabilidad->insertproduccion($litros, $codevendedor, $costo, $idcode)) {
                echo 'Informacion Guardada Correctamente';
            } else {
                echo 'Error al Guardar dicha Informacion';
            }
        }
    }

    public function searchpadres() {

        $id = $data['Id'] = $this->session->userdata('Id');

        if (empty($id)) {
            redirect("Login");
        } else {

            $key = $this->input->post('key');
            $iduser = $this->input->post('id');

            $idvacuna = $this->ModelTrazabilidad->catalagodepadres($key, $iduser);

            $idraza = $this->ModelTrazabilidad->catalagodepadresraza($key, $iduser);

            $codevacuna = $idvacuna->id_cabeza;
            $coderaza = $idraza->raza;


            echo $codevacuna . " " . $coderaza;
        }
    }

    public function deletevacuna() {

        $fecha = $this->input->post('fecha');
        $observacion = $this->input->post('observacion');
        $fecha_prox = $this->input->post('fecha_prox');
        $costo = $this->input->post('costo');
        $idcode = $this->input->post('idcode');

        if ($this->ModelTrazabilidad->borrarvacuna($fecha, $observacion, $fecha_prox, $costo, $idcode)) {
            echo 'Informacion Borrada Correctamente';
        } else {
            echo 'Error al querer quitar dicho dato';
        }
    }

    public function deleteproduccion() {

        $id = $data['Id'] = $this->session->userdata('Id');

        if (empty($id)) {
            redirect("Login");
        } else {

            $idcode = $this->input->post('idcode');
            $litros = $this->input->post('litros');
            $vendida = $this->input->post('vendedo');
            $costo = $this->input->post('costo');

            $idvendedor = $this->ModelTrazabilidad->catalagovendedor($vendida, $id);

            $codevendedor = $idvendedor->id_comprador;

            if ($this->ModelTrazabilidad->borrarproduccion($litros, $codevendedor, $costo, $idcode)) {
                echo 'Informacion Borrada Correctamente';
            } else {
                echo 'Error al querer quitar dicho dato';
            }
        }
    }

    public function deletereproduccion() {

        $toro = $this->input->post('Codigo');
        $concesion = $this->input->post('concesion');
        $fecha = $this->input->post('FechaSecado');
        $vaca = $this->input->post('vaca');

        if ($this->ModelTrazabilidad->borrarreproduccion($toro, $concesion, $fecha, $vaca)) {
            echo 'Informacion Borrada Correctamente';
        } else {
            echo 'Error al querer quitar dicho dato';
        }
    }

    public function Addcomprador() {

        $id = $data['id'] = $this->input->post('id');
        $nombre = $data['nombre'] = $this->input->post('name');
        $numfact = $data['numerofact'] = $this->input->post('numerofactura');
        $costo = $datafact['costo'] = $this->input->post('costo');

        if ($this->ModelTrazabilidad->Insertvendedor($data)) {

            $buy = $this->ModelTrazabilidad->checkvendedor($nombre, $id);

            $codebuy = $buy->id_comprador;

            $datafact['costo'] = $costo;
            $datafact['numfact'] = $numfact;
            $datafact['id'] = $codebuy;

            if ($this->ModelTrazabilidad->InsertFact($datafact)) {

                echo "<script>
    alert('Alta de Comprador');
</script>";
            } else {
                echo "<script>
    alert('Error en la Alta del Factura !Try Again¡');
</script>";
            }
        } else {
            echo "<script>
    alert('Error en la Alta del Factura !Try Again¡');
</script>";
        }
    }

    public function deletecabeza() {

        $id = $data['Id'] = $this->session->userdata('Id');

        $fecha = $this->input->post('fecha');
        $costobuy = $this->input->post('costobuy');
        $codecows = $this->input->post('codecows');
        $tipodemuerto = $this->input->post('tipodemuerto');
        $comentario = $this->input->post('comentario');

        if ($this->ModelTrazabilidad->Insertdestinofinal($codecows, $costobuy, $tipodemuerto)) {

            if ($this->ModelTrazabilidad->Updatedestinofinal($fecha, $codecows, $tipodemuerto, $id)) {

                $this->ModelTrazabilidad->DeleteGeo($codecows);
            }
        }
    }

    public function controlvacunasall() {
        $idcode = $this->input->post('idcode');

        $vacuna = $this->input->post('vacuna');
        $fecha = $this->input->post('fecha');
        $observacion = $this->input->post('observacion');
        $fecha_prox = $this->input->post('fecha_prox');
        $costo = $this->input->post('costo');

        $data['all'] = $this->ModelTrazabilidad->fecth($idcode);

        $idvacuna = $this->ModelTrazabilidad->catalagovacuna($vacuna, $idcode);

        $codevacuna = $idvacuna->id_vacunas;

        foreach ($data['all'] as $row) {

            $codecows = $row->id_cabeza;

            $this->ModelTrazabilidad->insertvacuna($fecha, $observacion, $fecha_prox, $costo, $codecows, $codevacuna);
        }
        echo " " . $codecows;
    }

    public function controlreproduccionall() {

        $toro = $this->input->post('Codigo');
        $concesion = $this->input->post('concesion');
        $fecha = $this->input->post('FechaSecado');
        $idcode = $this->input->post('idcode');

        $data['all'] = $this->ModelTrazabilidad->fecth($idcode);

        foreach ($data['all'] as $row) {

            $codecows = $row->id_cabeza;

            $this->ModelTrazabilidad->insertreproduccion($toro, $fecha, $concesion, $codecows);
        }
        echo " " . $codecows;
    }

    public function controlproduccionall() {

        $idcode = $this->input->post('idcode');
        $litros = $this->input->post('litros');
        $vendida = $this->input->post('vendedo');
        $costo = $this->input->post('costo');

        $data['all'] = $this->ModelTrazabilidad->fecth($idcode);

        $idvendedor = $this->ModelTrazabilidad->catalagovendedor($vendida, $idcode);

        $codevendedor = $idvendedor->id_comprador;

        foreach ($data['all'] as $row) {

            $codecows = $row->id_cabeza;

            $this->ModelTrazabilidad->insertproduccion($litros, $codevendedor, $costo, $codecows);
        }
        echo " " . $codecows;
    }

    public function controlreproduccionalldelete() {

        $toro = $this->input->post('Codigo');
        $concesion = $this->input->post('concesion');
        $fecha = $this->input->post('FechaSecado');
        $idcode = $this->input->post('idcode');

        $data['all'] = $this->ModelTrazabilidad->fecth($idcode);

        foreach ($data['all'] as $row) {

            $codecows = $row->id_cabeza;

            $this->ModelTrazabilidad->borrarreproduccion($toro, $concesion, $fecha, $codecows);
        }
    }

    public function controlvacunasalldelete() {

        $idcode = $this->input->post('idcode');
        $fecha = $this->input->post('fecha');
        $observacion = $this->input->post('observacion');
        $fecha_prox = $this->input->post('fecha_prox');
        $costo = $this->input->post('costo');

        $data['all'] = $this->ModelTrazabilidad->fecth($idcode);

        foreach ($data['all'] as $row) {

            $codecows = $row->id_cabeza;

            $this->ModelTrazabilidad->borrarvacuna($fecha, $observacion, $fecha_prox, $costo, $codecows);
        }
    }

    public function controlproduccionalldelete() {
        $idcode = $this->input->post('idcode');
        $litros = $this->input->post('litros');
        $vendida = $this->input->post('vendedo');
        $costo = $this->input->post('costo');

        $data['all'] = $this->ModelTrazabilidad->fecth($idcode);

        $idvendedor = $this->ModelTrazabilidad->catalagovendedor($vendida, $idcode);

        $codevendedor = $idvendedor->id_comprador;


        foreach ($data['all'] as $row) {

            $codecows = $row->id_cabeza;

            $this->ModelTrazabilidad->borrarproduccion($litros, $codevendedor, $costo, $codecows);
        }
    }

    public function searchname() {

        $id = $data['Id'] = $this->session->userdata('Id');

        if (empty($id)) {
            redirect("Login");
        } else {

            $key = $this->input->post('key');
            $iduser = $this->input->post('id');

            if ($this->ModelTrazabilidad->catalagodename($key, $iduser)) {
                echo "Este Nombre Ya Exsiste";
            } else {
                echo 'Continual';
            }
        }
    }

    public function searchidcows() {

        $id = $data['Id'] = $this->session->userdata('Id');

        if (empty($id)) {
            redirect("Login");
        } else {

            $key = $this->input->post('key');
            $iduser = $this->input->post('id');

            if ($this->ModelTrazabilidad->catalagodeidcows($key, $iduser)) {

                $name = $this->ModelTrazabilidad->catalagodeidcows($key, $iduser);
                $codename = $name->nombre;
                echo "Este Nombre Si Exsiste";
            } else {
                echo 'Continual';
            }
        }
    }

    public function paycuenta() {

        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {
            $data['FechaProx'] = $this->session->userdata('FechaProx');
            $data['login_failed'] = TRUE;
            $data['login_log'] = TRUE;

            $this->load->view('header', $data);
            $this->load->view('ViewsTrazabilidad/PayPal');
            $this->load->view('footer');
        }
    }

    public function paypalcancel() {

        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {

            $data['login_failed'] = TRUE;
            $data['login_log'] = TRUE;

            $this->load->view('header', $data);
            $this->load->view('ViewsTrazabilidad/PayPal');
            $this->load->view('footer');
        }
    }

    public function accomplishment() {

        $idsession = $data['Id'] = $this->session->userdata('Id');

        $id = $this->input->get('id');
        $email = $this->input->get('email');

        if (empty($idsession)) {
            redirect("Login");
        } else {

            if ($idsession == $id) {

                $email = $this->input->get('email');

                $User = $this->ModelTrazabilidad->Checkall($id, $email);

                $cid = $User->id_usuario;
                $cemail = $User->correo;

                if ($id == $cid && $email == $cemail) {

                    $this->ModelTrazabilidad->activateAccountpay($id);
                    $User = $this->ModelWelcome->Check($email);

                    $session = array(
                        'auth' => true,
                        'Id' => $User->id_usuario,
                        'Email' => $User->correo,
                        'Status' => $User->status,
                        'Fecha' => $User->fecha_paga,
                        'FechaProx' => $User->fecha_paga_prox
                    );
                    $this->session->set_userdata($session);

                    redirect("PayPal");
                } else {
                    redirect("Login");
                }
            } else {
                redirect("Login");
            }
        }
    }

    public function ReporteVacunas() {
        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {

            $data['login_failed'] = TRUE;
            $data['login_log'] = TRUE;

            $codecows = $this->input->post('CodigoCows');
            $evento = $this->input->post('Evento');

            if (empty($codecows)) {
                
            } else {
                $session = array(
                    'codecows' => $codecows,
                    'evento' => $evento,
                );
                $this->session->set_userdata($session);

                $this->session->userdata('codecows');
                $this->session->userdata('evento');
            }

            $config = array();
            $config['base_url'] = base_url() . 'ReporteVacunas';
            $config['total_rows'] = $this->ModelTrazabilidad->countvacunas($this->session->userdata('codecows'),$id);
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

            $data['query'] = $this->ModelTrazabilidad->fecthvacunas($this->session->userdata('codecows'),$id, $config['per_page'], $page);
            $links = $data['links'] = $this->pagination->create_links();

            if (empty($data['query'])) {
                echo '<div class="alert alert-info">
    <strong>Nombre No Exsistente!</strong> Este nombre que ingresastes no esta existente en administracion de Vacunas.
</div>';
            } else {
                echo '<br><br><div id="the-content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha de Vacunacion</th>
                <th>Observaciones</th>
                <th>Fecha Proxima de Vacunacion</th>
                <th>Costo</th>
                <th>Vacuna</th>
            </tr>
        </thead>
        <tbody>';
                foreach ($data["query"] as $row) {
                    echo '<tr>
                <td>';
                    echo $row->fecha;
                    echo '</td>
                <td>';
                    echo $row->observaciones;
                    echo '</td>';
                    echo '<td>';
                    echo $row->fecha_prox;
                    echo '</td>';
                    echo '<td>';
                    echo $row->costo;
                    echo '</td>';
                    echo '<td>';
                    $namevacuna = $this->ModelTrazabilidad->getnamevacuna($row->vacunas_id_vacunas);

                    $name = $namevacuna->nombre;

                    echo $name;

                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>
    </table>';
                echo $links;
                echo '</div>';
            }
        }
    }

    public function ReporteProduccion() {

        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {

            $data['login_failed'] = TRUE;
            $data['login_log'] = TRUE;

            $codecows = $this->input->post('CodigoCows');
            $evento = $this->input->post('Evento');

            if (empty($codecows)) {
                
            } else {
                $session = array(
                    'codecowsproduccion' => $codecows,
                    'eventoproduccion' => $evento,
                );
                $this->session->set_userdata($session);

                $this->session->userdata('codecowsproduccion');
                $this->session->userdata('eventoproduccion');
            }

            $config = array();
            $config['base_url'] = base_url() . 'ReporteProduccion';
            $config['total_rows'] = $this->ModelTrazabilidad->countproduccion($this->session->userdata('codecowsproduccion'),$id);
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

            $data['query'] = $this->ModelTrazabilidad->fecthproduccion($this->session->userdata('codecowsproduccion'),$id,$config['per_page'], $page);
            $links = $data['links'] = $this->pagination->create_links();

            if (empty($data['query'])) {
                echo '<div class="alert alert-info">
    <strong>Nombre No Exsistente!</strong> Este Nombre que ingresastes no esta existente en administracion de Produccion.
</div>';
            } else {

                echo '<br><br><div id="the-content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Litros</th>
                <th>Comprandor</th>
                <th>Vendida</th>
            </tr>
        </thead>
        <tbody>';
                foreach ($data["query"] as $row) {
                    echo '<tr>
                          <td>';
                    echo $row->litros;
                    echo '</td>';
                    echo '<td>';
                    $comprador = $this->ModelTrazabilidad->getnamecomprador($row->comprandor);

                    $empresa = $comprador->nombre;

                    echo $empresa;

                    echo '</td>';
                    echo '<td>';
                    echo $row->vendida;
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>
    </table>';
                echo $links;
                echo '</div>';
            }
        }
    }

    public function ReporteReproduccion() {

        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');

        if (empty($id)) {
            redirect("Login");
        } else {

            $data['login_failed'] = TRUE;
            $data['login_log'] = TRUE;

            $codecows = $this->input->post('CodigoCows');
            $evento = $this->input->post('Evento');

            if (empty($codecows)) {
                
            } else {
                $session = array(
                    'codecowsreproduccion' => $codecows,
                    'eventoreproduccion' => $evento,
                );
                $this->session->set_userdata($session);

                $this->session->userdata('codecowsreproduccion');
                $this->session->userdata('eventoreproduccion');
            }

            $config = array();
            $config['base_url'] = base_url() . 'ReporteReproduccion';
            $config['total_rows'] = $this->ModelTrazabilidad->countreproduccion($this->session->userdata('codecowsreproduccion'),$id);
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

            $data['query'] = $this->ModelTrazabilidad->fecthreproduccion($this->session->userdata('codecowsreproduccion'),$id,$config['per_page'], $page);
            $links = $data['links'] = $this->pagination->create_links();

            if (empty($data['query'])) {
                echo '<div class="alert alert-info">
    <strong>Nombre No Exsistente!</strong> Este nombre que ingresastes no esta existente en administracion de Reproduccion.
</div>';
            } else {

                echo '<br><br><div id="the-content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Codigo del Toro</th>
                <th>Fecha Secado</th>
                <th>Fecha Parto</th>
                <th>Numumero de Nacidos</th>
                <th>Numero de Muertos</th>
                <th>Tipo de Preñes</th>
                <th>Vaca</th>
            </tr>
        </thead>
        <tbody>';
                foreach ($data["query"] as $row) {
                    echo '<tr>
                          <td>';
                    echo $row->nombre_toro;
                    echo '</td>';
                    echo '<td>';
                    echo $row->fecha_secado;
                    echo '</td>';
                    echo '<td>';
                    echo $row->fecha_parto;
                    echo '</td>';
                    echo '<td>';
                    echo $row->num_nacidos;
                    echo '</td>';
                    echo '<td>';
                    echo $row->num_muertos;
                    echo '</td>';
                    echo '<td>';
                    echo $row->tipo;
                    echo '</td>';
                    echo '<td>';
                    $vaca = $this->ModelTrazabilidad->obtenernamevaca($row->cabeza_ganado_id_cabeza);

                    $name = $vaca->nombre;

                    echo $name;
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>
    </table>';
                echo $links;
                echo '</div>';
            }
        }
    }

}
