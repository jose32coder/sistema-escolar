<?php
date_default_timezone_set('America/Caracas');

function redireccion($route){ header("location: /sistema-escolar-main/$route");}

$conexion = mysqli_connect("localhost", "root", "", "db_school");

if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');

 function Make_code_recovery($id_user){
      $code = generateRandomString();

      $sql = "SELECT * FROM codigos_recuperacion WHERE char_code = '$code';";
      $result = $this->Query($sql);

      if($result->num_rows === 0){
        $datos = $this->Get_array($result);
        $this->Query("UPDATE codigos_recuperacion SET status_code = 0 WHERE id_user = $id_user;");

        $sql = "INSERT INTO codigos_recuperacion(date_cod, status_code, char_code, id_user) VALUES (NOW(),'1','$code',$id_user);";
        $this->Query($sql);

        return $code;
      }

      die("FALLO algo");
      $this->Make_code_recovery($id_user);
    }

     function SendEmail($code, $email){
      if(constant('username_email')  == '') die("Debes de tener configurada una cuenta de Correo electronico");
      
      $mail = new PHPMailer(true);
      $email_user = strtolower($email);
      
      try{
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );

        $mail->SMTPDebug = 0;                              //Enable verbose debug output
        $mail->isSMTP();                                   //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';              //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                          //Enable SMTP authentication
        $mail->Username   = constant('username_email');    //SMTP username
        $mail->Password   = constant('password_email');    //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
        $mail->Port       = constant('port_email');  

        //Recipients
        $mail->setFrom(constant('username_email'), 'Mailer');
        $mail->addAddress($email_user);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Codigo de recuperacion';
        $mail->Body    = "Este es tu código de recuperación: <b>$code</b>";

        if(!$mail->send()) return false; else return true;
        
      }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }

    function generateRandomString($length = 8) { 
      return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 

     function ValidacionCodigo($datos){
      
      $code = $datos['code'];
      $id_user = $datos['id'];

      $sql = "SELECT * FROM codigos_recuperacion WHERE char_code = '$code' AND id_user = $id_user AND status_code = 1;";
      $result = $this->Query($sql);

      if($result->num_rows > 0){

        return [
          'status' => true,
          'next' => 3,
          'id_user' => $id_user,
          'message' => [
            'code' => 'success',
            'msg' => "Código verificado!",
          ]
        ];
      }
      return [
        'status' => false,
        'next' => 2,
        'id_user' => $id_user,
        'message' => [
          'code' => 'error',
          'msg' => "Código incorrecto o invalido",
        ]
      ];
    }