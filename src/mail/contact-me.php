<?php
  var_dump($_POST);
  // Check for empty fields
  if(empty($_POST['name']) ||
    empty($_POST['consulta']) ||
    !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
  {
    echo "Sin datos encontrados!";
    return false;
  }
  
  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
  $recaptcha_secret = '6Lf5TFAgAAAAAP8CGywrq4ck8Za9Lbc1kgu6J0uC'; 
  $recaptcha_response = $_POST['sendToken'];
  $URL = $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response; 
  
  $c = curl_init();
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_URL, $URL);
  $recaptcha = curl_exec($c);
  curl_close($c);

  $recaptcha = json_decode($recaptcha);

  
  if($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == 'contact_form'){
    
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $consulta = $_POST['consulta'];

    $to = 'pmpgarciatedesco@gmail.com';
    // $to = 'jparedes84@gmail.com';
    $email_subject = "Contacto desde el Sitio Web - Meridies 2";
    $email_body  = '<p><strong>Has recibido un nuevo correo desde el sitio web Meridies 2.</strong></p>';
    $email_body .= '<p><strong>Nombre: </strong>' . $name . '</p>';
    $email_body .= '<p><strong>Email: </strong>' . $mail . '</p>';
    $email_body .= '<p><strong>Consulta: </strong></p>';
    $email_body .= '<p>' . $consulta . '</p>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: info@meridies2.com\n";
    $headers .= "Reply-To: $mail";

    $a = mail($to,$email_subject,$email_body,$headers);
    var_dump($a);
    return true;

  }

?>