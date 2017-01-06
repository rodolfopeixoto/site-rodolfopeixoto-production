<?php
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $tel      = $_POST['tel'];
  $message  = $_POST['message'];
  $humano   = $_POST['humano'];
  $from     = "site@rodolfopeixoto.com.br";
  $to       = "rodolfog.peixoto@gmail.com";
  $subject = "Contato - Site Rodolfo Peixoto";

  $body = "FROM $name\n Email: $email\n Mensagem:\n $message";

  // Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Oi ,Rodolfo!</h1>';
$message .= '<p style="color:#080;font-size:18px;">Contato</p>';
$message .= '<p style="color:#080;font-size:18px;">Nome: $nome</p>';
$message .= '<p style="color:#080;font-size:18px;">Email: $email</p>';
$message .= '<p style="color:#080;font-size:18px;">telefone: $tel</p>';
$message .= '<p style="color:#080;font-size:18px;">Mensagem:<br>
 $message</p>';
$message .= '</body></html>';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();



  if($_POST['submit'] && $humano == '10'){
    if(mail($to,$subject, $body,$headers)){
         echo '<p>Email enviado com sucesso. Aguarde no máximo 1 dia útil para que possa entrar em contato.</p>';
    }else{
    echo '<p>Email não enviado. Envie um email para contato@rodolfopeixoto.com.br</p>';
    }
  }else if ($_POST['submit'] && $humano != '10') {
     echo '<p>A resposta do anti-spam está incorreta.</p>';
    }
?>