<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_geolocalizacion extends CI_Controller {

    public function index() {
        /* Call function mapa */
        $this->mapa();
    }

    public function mapa() {
        /* Get Data from Session */
        $data['Id'] = $this->session->userdata('Id');
        /* Validate the Session */
        if (empty($data['Id'])) {
            redirect("Login");
        }

        $status = $data['Status'] = $this->session->userdata('Status');
        $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');

        if ($status == 1 && $admin == NULL) {

            /* Get Data from Session */
            $data['Email'] = $this->session->userdata('Email');
            $data['FechaProx'] = $this->session->userdata('FechaProx');
            /* Validate login */
            $data['login_failed'] = TRUE;
            $data['login_log'] = TRUE;
            $this->load_map($data);
        } else {
            redirect("Login");
        }
    }

    public function load_map($data) {
        /* Var for Point-In-Polygon Algorithm */
        $polySides = 0; //how many corners the polygon has
        $polyX = array(); //horizontal coordinates of corners
        $polyY = array(); //vertical coordinates of corners
        /* Load the library for Maps */
        $this->load->library('googlemaps');
        /* Set the properties */
        $config = array();
        /* Initialize the config for map */
        $this->googlemaps->initialize($config);
        /* Initialize the limit */
        $aux = $polygon = array(); //var for library
        $data['puntos'] = $this->setLimit(); //call function
        if (sizeof($data['puntos']) > 0) {
            foreach ($data['puntos'] as $object) {
                //Add to array AUX
                array_push($aux, $object->latitud . ", " . $object->longitud); //Add to aux
                $polySides = $polySides + 1; //Sum for Point-In-Polygon Algorithm*
                array_push($polyX, floatval($object->latitud)); //add array (X) to Point-In-Polygon Algorithm*
                array_push($polyY, floatval($object->longitud)); //add array (Y) to Point-In-Polygon Algorithm*
            }
            $polygon['points'] = $aux; //Format Googlemaps library
            $this->googlemaps->add_polygon($polygon);
        }

        /* Initialize the cows */
        $data['vacas'] = $this->setCows();
        $data['alerta'] = "";
        $cont = 0;
        if (sizeof($data['vacas']) > 0) {
            foreach ($data['vacas'] as $object) {
                $marker['id'] = $object->id_cabeza;
                $marker['infowindow_content'] = $object->nombre;
                $marker['position'] = $object->lat . ", " . $object->lng;
                if (!($this->pointInPolygon($polySides, $polyX, $polyY, $object->lat, $object->lng))) {
                    if($cont == 0) {
                        $data['alerta'] = $data['alerta'].'<div class="footerwrap alarma ">';
                        $data['alerta'] = $data['alerta'].'<div class="container">';
                        $data['alerta'] = $data['alerta'].'<div class="row">';
                        $data['alerta'] = $data['alerta'].'<div style="float:left"><img src="'.base_url().'/assets/img/alarm_icon.png"></div>';
                        $data['alerta'] = $data['alerta'].'<h3>Alarmas:</h3>';
                        $data['alerta'] = $data['alerta'].'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
                        $data['alerta'] = $data['alerta']."<p><b>¡Cuidado!</b> ";
                        $cont = $cont + 1;
                    }

                    $data['alerta'] = $data['alerta'].$object->nombre." está fuera de tu perímetro. ";
                    
                }
                if($cont > 0) {
                     $data['alerta'] = $data['alerta']."</p>" ;
                     $data['alerta'] = $data['alerta'].'</div></div></div>';
                }
                $this->googlemaps->add_marker($marker);
            }
        }

        /* Create map */
        $data['mapa'] = $this->googlemaps->create_map();
        $this->load_view($data);
    }

    public function setCows() {
        $id = $this->session->userdata('Id');
        $this->load->model('model_geolocalizacion');
        /* Get the data from the DB */
        return $this->model_geolocalizacion->getCows($id);
    }

    public function setLimit() {
        $id = $this->session->userdata('Id');
        $this->load->model('model_geolocalizacion');
        /* Data for limits */
        return $this->model_geolocalizacion->getLimit($id);
    }

    function insert_Point() {
        $this->load->model('model_geolocalizacion');
        $data = array(
            'latitud' => $this->input->post('latitud'),
            'longitud' => $this->input->post('longitud'),
            'usuario_id_usuario' => $this->input->post('usuario_id_usuario')
        );
        $this->model_geolocalizacion->insertPoint($data);
        redirect("Mapa");
    }

    /* Delete a point in the limit */

    function delete_Point($id_limite) {
        $this->load->model('model_geolocalizacion');
        $this->model_geolocalizacion->deletePoint($id_limite);
        redirect("Mapa");
    }

    public function load_view($data) {
        $this->load->view('header', $data);
        $this->load->view('ViewsMapa/View_geolocalizacion');
        $this->load->view('footer');
    }

    //Based on http://alienryderflex.com/polygon/
    //Point-In-Polygon Algorithm
    function pointInPolygon($polySides, $polyX, $polyY, $x, $y) {
        $j = $polySides - 1;
        $oddNodes = 0;
        for ($i = 0; $i < $polySides; $i++) {
            if ($polyY[$i] < $y && $polyY[$j] >= $y || $polyY[$j] < $y && $polyY[$i] >= $y) {
                if ($polyX[$i] + ($y - $polyY[$i]) / ($polyY[$j] - $polyY[$i]) * ($polyX[$j] - $polyX[$i]) < $x) {
                    $oddNodes = !$oddNodes;
                }
            }
            $j = $i;
        }
        return $oddNodes;
    }
    
    
    function addpointcows(){
        
      $this->load->model('model_geolocalizacion');
        
      date_default_timezone_set("America/Mexico_City");

      $data = json_decode(file_get_contents('php://input'), true);
          
      echo json_encode(json_decode(file_get_contents('php://input'), true));
      echo json_encode($data);

    
       $temBat = $data["temBat"];
       $tempCow = $data["tempCow"];
       $volBat = $data["volBat"];
       $activity = $data["activity"];
       $lat = $data["lat"];
       $lon = $data["lon"];
       $idUser = $data["idUser"];
       $idCow = $data["idCow"];
       $idDevice =  $data["idDevice"];
     
        
      $Date = date("Y-m-d H:i:s",time());
        
      $this->model_geolocalizacion->addpointcow($temBat, $tempCow, $volBat, $activity, $lat , $lon , $idUser, $idCow, $idDevice , $Date);
      
    } 
    
    function getpointcows(){
        
        $this->load->model('model_geolocalizacion');
        
        $Cow1 = $this->model_geolocalizacion->getpointcow();
        
        echo json_encode($Cow1);
      
    }

}
