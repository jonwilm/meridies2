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

  $name = $_POST['name'];
  $mail = $_POST['mail'];
  $consulta = $_POST['consulta'];

  $to = 'jparedes84@gmail.com';
  $email_subject = "Contacto desde el Sitio Web - Meridies 2";
  $email_body = "Has recibido un nuevo correo desde el sitio web Meridies 2.\n\n"."
  Nombre: $name\n
  Email: $mail\n
  Consulta: $consulta\n";

  $headers = "From: info@meridies2.com\n";
  $headers .= "Reply-To: $mail";

  $a = mail($to,$email_subject,$email_body,$headers);
  var_dump($a);
  return true;
?>