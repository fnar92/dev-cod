<?php

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ModelWelcome');
         $this->load->library('MPHPmailers');
    }

    public function index() {

        $id = $data['Id'] = $this->session->userdata('Id');

        if (empty($id)) {
            $data['login_failed'] = false;
            $data['login_log'] = false;
            $this->load->view('header', $data);
            $this->load->view('index');
            $this->load->view('footer');
        } else {

            $status = $data['Status'] = $this->session->userdata('Status');
            $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');

            if ($status == 1 && $admin == NULL) {
                $data['Email'] = $this->session->userdata('Email');
                redirect("Mapa");
            } else {
                redirect("Login");
            }

            $data['Email'] = $this->session->userdata('Email');
            redirect("Mapa");
        }
    }

    public function Inf() {
        $id = $data['Id'] = $this->session->userdata('Id');
        $data['Email'] = $this->session->userdata('Email');
        $data['FechaProx'] = $this->session->userdata('FechaProx');

        if (empty($id)) {
            redirect("Login");
        } else {

            $status = $data['Status'] = $this->session->userdata('Status');
            $admin = $data['tipo_de_usuario_id_tipo_de_usuario'] = $this->session->userdata('tipo_de_usuario_id_tipo_de_usuario');

            if ($status == 1 && $admin == NULL) {
                $data['login_failed'] = TRUE;
                $data['login_log'] = TRUE;
                $this->load->view('header', $data);
                $this->load->view('EditaInf');
                $this->load->view('footer');
            } else {
                redirect("Login");
            }
        }
    }

    public function login() {
        $data['login_failed'] = false;
        $data['login_log'] = false;
        $this->load->view('header_login', $data);
        $this->load->view('Login');
        $this->load->view('footer');
    }

    public function Regristrar() {

        $Email = $this->input->post('NewEmail');
        $Pwd = $this->input->post('NewPwd');

        $login = $this->ModelWelcome->Check($Email);

        if (!$login) {
            $this->ModelWelcome->add_new_user($Email, $Pwd);

            $NewUser = $this->ModelWelcome->Check($Email);

            $id = $NewUser->id_usuario;
            $email = $NewUser->correo;

            if ($this->sendEmailVerification($id, $email)) {
                echo "<script>
alert('Mensaje Enviado Correctamente, Checa tu Email y Corfima tu Cuenta');
window.location.href='../Login';
</script>";
            } else {
                echo "<script>
alert('Error al Enviarte el Correo');
window.location.href='../Login';
</script>";
            }
        } else {

            echo "<script>
alert('Este Usuario ya Existe');
window.location.href='../Login';
</script>";
        }
    }

    public function logincheck() {

        $this->form_validation->set_rules('Email', 'required|trim|xss_clean');
        $this->form_validation->set_rules('Pws', 'required|trim|xss_clean');

        $Email = $this->input->post('Email');
        $Pwd = $this->input->post('Pws');
        $login = $this->ModelWelcome->CheckUser($Email, $Pwd);

        if (!$login) {
            $data['login_failed'] = TRUE;
            $data['login_log'] = false;
            echo "<script>
alert('Error al ingresar tus datos');
window.location.href='../Login';
</script>";
        } else {
            $datestring = '%Y-%m-%d';
            $time = time();
            mdate($datestring, $time);

            $status = $login->status;
            $typeuser = $login->tipo_de_usuario_id_tipo_de_usuario;

            $fechaprox = $login->fecha_paga_prox;

            if (($status == 1) && ($typeuser == NULL)) {

                if ($fechaprox == mdate($datestring, $time)) {

                    $session = array(
                        'auth' => true,
                        'Id' => $login->id_usuario,
                        'Email' => $login->correo,
                        'Status' => $login->status,
                        'Fecha' => $login->fecha_paga,
                        'FechaProx' => $login->fecha_paga_prox
                    );
                    $this->session->set_userdata($session);
                    echo "<script>
alert('Ultimo Dia Para Renovacion de Cuenta');
window.location.href='../Mapa';
</script>";
                } else if ($fechaprox < mdate($datestring, $time)) {

                    $this->ModelWelcome->bajacuenta($Email, $Pwd);
                    echo "<script>
alert('Lo Lamentamos tu cuenta fue dada de baja por no Pagar');
window.location.href='../Login';
</script>";
                }else{
                    
                   $session = array(
                        'auth' => true,
                        'Id' => $login->id_usuario,
                        'Email' => $login->correo,
                        'Status' => $login->status,
                        'Fecha' => $login->fecha_paga,
                        'FechaProx' => $login->fecha_paga_prox
                    );
                    $this->session->set_userdata($session); 
                    redirect("Mapa");
                    
                }
            } else if (($status == 1) && ($typeuser == 1)) {
                $sessionadmin = array(
                    'auth' => true,
                    'Id' => $login->id_usuario,
                    'Email' => $login->correo,
                    'Status' => $login->status,
                    'tipo_de_usuario_id_tipo_de_usuario' => $login->tipo_de_usuario_id_tipo_de_usuario
                );
                $this->session->set_userdata($sessionadmin);
                redirect("AdminCodiga");
            } else if(($status == 1) && ($typeuser == 2)){
                
              $sessionadmin = array(
                    'auth' => true,
                    'Id' => $login->id_usuario,
                    'Email' => $login->correo,
                    'Status' => $login->status,
                    'tipo_de_usuario_id_tipo_de_usuario' => $login->tipo_de_usuario_id_tipo_de_usuario
                );
                $this->session->set_userdata($sessionadmin);
                redirect("SoporteUsuariosSP");
                
            } else {
                echo "<script>
alert('No Haz Activado Tu Cuenta O Tu cuenta fue dada de baja por no Pagar');
window.location.href='../Login';
</script>";
            }
        }
    }

    public function destroy() {
        $this->session->sess_destroy();
        redirect("Login");
    }

    public function sendEmailVerification($id, $email) {
        $this->load->library('MPHPmailers');
        $mail = new MPHPmailers();
        $inssue = "Confirmación de registro en CODIGA";
        $email_destination = $email;
        $name_destination = "Usuario CODIGA";
        $base = base_url();
        $link = base_url() . "index.php/activate?account_id=" . $id . "&account_email=" . $email_destination;
        $body = "<h4><strong>Estimado usuario:</strong></h4>"
                . "<p>Has recibido este mensaje porque esta dirección de correo electrónico se ha utilizado para el registro en CODIGA. Para completar el proceso de registro, haga clic en el enlace de activación a continuación:</p>"
                . ""
                . "<p><a href='$link'>$link</a></p>"
                . "<h4><strong>Pagina Web: </strong></h4><a href='$base'>$base</a>";
        $alt_body = "<p>Text</p>";
        $data = array(
            'inssue' => $inssue,
            'email_destination' => $email_destination,
            'name_destination' => $name_destination,
            'body' => $body,
            'alt_body' => $alt_body
        );
        $mail->sendMail($data);
        return true;
    }
    

    public function test() {
        $email="pacoooo@t.com";

        $User = $this->ModelWelcome->Check($email);

        $cid = $User->id_usuario;
        $cemail = $User->correo;
        $status = $User->status;
        
        $id=$cid;
        $this->load->library('MPHPmailers');
        $mail = new MPHPmailers();
        $inssue = "Confirmación de registro en CODIGA";
        $email_destination = $email;
        $name_destination = "Usuario CODIGA";
        $base = base_url();
        $link = base_url() . "index.php/activate?account_id=" . $id . "&account_email=" . $email_destination;
        $body = "<h4><strong>Estimado usuario:</strong></h4>"
                . "<p>Has recibido este mensaje porque esta dirección de correo electrónico se ha utilizado para el registro en CODIGA. Para completar el proceso de registro, haga clic en el enlace de activación a continuación:</p>"
                . ""
                . "<p><a href='$link'>$link</a></p>"
                . "<h4><strong>Pagina Web: </strong></h4><a href='$base'>$base</a>";
        $alt_body = "<p>Text</p>";
        $data = array(
            'inssue' => $inssue,
            'email_destination' => $email_destination,
            'name_destination' => $name_destination,
            'body' => $body,
            'alt_body' => $alt_body
        );
        $mail->sendMail($data);
        return true;
        
    }

    public function EditInf() {

        $data['id'] = $this->input->post('id');

        $data['nombre'] = $this->input->post('nombre');
        $data['apelldiop'] = $this->input->post('apelldiop');
        $data['apelldiom'] = $this->input->post('apelldiom');
        $data['tel'] = $this->input->post('tel');
        $data['cel'] = $this->input->post('cel');

        $data['dir'] = $this->input->post('dir');
        $data['colonia'] = $this->input->post('colonia');
        $data['municipio'] = $this->input->post('municipio');
        $data['estado'] = $this->input->post('estado');


        if ($this->ModelWelcome->updateeditinf($data)) {

            echo "<script>
alert('Informacion Editada Correctamente ');
</script>";
        } else {

            echo "<script>
alert('Informacion no subida !try agaid!');
</script>";
        }
    }

    public function resetpws() {

        $EmailPws = $this->input->post('NewEmailPws');

        $login = $this->ModelWelcome->Check($EmailPws);

        if (!$login) {

            echo "<script>
alert('Este Correo no Exsiste');
window.location.href='../Login';
</script>";
        } else {

            $id = $login->id_usuario;

            $EmailPws = $this->input->post('NewEmailPws');

           $this->load->library('MPHPmailers');
        $mail = new MPHPmailers();
        $inssue = "Validación de recuperación de contraseña en CODIGA";
        $email_destination = $EmailPws;
        $name_destination = "Usuario CODIGA";
        $base = base_url();
        $link = base_url() . "index.php/reset?account_id=" . $id . "&account_email=" . $email_destination;
        $body = "<h4><strong>Estimado usuario:</strong></h4>"
                    . "<p>Has recibido este mensaje porque has pedido cambio de contraseña de CODIGA. Para completar el proceso, por favor haga clic en el enlace de recuperación a continuación si pedistes este cambio:</p>"
                    . ""
                    . "<p><a href='$link'>$link</a></p>"
                    . "<h4><strong>Pagina web: </strong></h4><a href='$base'>$base</a>";
        $alt_body = "<p>Text</p>";
        $data = array(
            'inssue' => $inssue,
            'email_destination' => $email_destination,
            'name_destination' => $name_destination,
            'body' => $body,
            'alt_body' => $alt_body
        );
        $send = $mail->sendMail($data);
         
            if ($send) {
                echo "<script>
alert('Mensaje enviado correctamente');
window.location.href='login';
</script>";
            } else {
                echo "<script>
alert('Mensaje Error Try Again');
window.location.href='../Login';
</script>";
            }
        }
    }

    public function resetSetSession() {

        $id = $this->input->get('account_id');
        $email = $this->input->get('account_email');

        $User = $this->ModelWelcome->Check($email);

        $cid = $User->id_usuario;
        $cemail = $User->correo;


        if ($id == $cid && $email == $cemail) {


            $data["id"] = $id;
            $data['login_failed'] = false;
            $data['login_log'] = false;
            $this->load->view('header', $data);
            $this->load->view('ResetPws');
            $this->load->view('footer');
            unset($id);
            unset($cid);
            unset($email);
            unset($cemail);
        } else {
            redirect("../Login");
        }
    }

    public function SaveResetPassword() {

        $id = $this->input->post('id');
        $NewResPwd = $this->input->post('NewPwd');

        $data['id'] = $id;
        $data['restpwd'] = $NewResPwd;

        $Update = $this->ModelWelcome->updatePassword($data);

        unset($NewResPwd);
        unset($id);
        unset($data);

        $this->session->sess_destroy();

        if ($Update) {

            echo "<script>
alert('Contraseña Cambiada correctamente');
window.location.href='../Login';
</script>";
        } else {

            echo "<script>
alert('Error al cambiar tu contraseña');
window.location.href='../Login';
</script>";
        }
    }

}
