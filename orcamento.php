<?php
  $name                 = $_POST['name'];
  $email                = $_POST['email'];
  $tel                  = $_POST['tel'];
  $project_name         = $_POST['project_name'];
  $project_description  = $_POST['project_description'];
  $humano               = $_POST['humano'];
  $to                   = "rodolfog.peixoto@gmail.com";
  $subject              = "Orçamento - Site Rodolfo Peixoto";

  $from     = "site@rodolfopeixoto.com.br";

  // Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Oi ,Rodolfo!</h1>';
$message .= '<p style="color:#080;font-size:18px;">Orçamento</p>';
$message .= '<p style="color:#080;font-size:18px;">Nome: $nome</p>';
$message .= '<p style="color:#080;font-size:18px;">Email: $email</p>';
$message .= '<p style="color:#080;font-size:18px;">telefone: $tel</p>';
$message .= '<p style="color:#080;font-size:18px;">Nome do Projeto: $project_name</p>';
$message .= '<p style="color:#080;font-size:18px;">Descrição do Projeto: $project_description</p>';
$message .= '</body></html>';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();



  if($_POST['submit'] && $humano == '5'){
    if(mail($to,$subject, $message, $headers)){
         echo '<p>Orçamento enviado com sucesso. Aguarde no máximo 72 horas úteis para que possa entrar em contato.</p>';
    }else{
    echo '<p>Email não enviado. Envie um email para contato@rodolfopeixoto.com.br</p>';
    }
  }else if ($_POST['submit'] && $humano != '5') {
     echo '<p>A resposta do anti-spam está incorreta.</p>';
    }
?>