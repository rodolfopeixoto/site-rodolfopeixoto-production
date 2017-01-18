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
$message .= '<p style="color:#444;font-size:18px;">Formulário de Orçamento</p>';

$message .= '<p style="color:#444;font-size:15px;">Nome: ' . $name . ' </p>';
$message .= '<p style="color:#444;font-size:15px;">Email: ' . $email . ' </p>';
$message .= '<p style="color:#444;font-size:15px;">telefone: ' . $tel . ' </p>';
$message .= '<p style="color:#444;font-size:15px;">Nome do Projeto:<br> ' . $project_name . ' </p>';
$message .= '<p style="color:#444;font-size:15px;">Descrição do Projeto:<br> ' . $project_description . ' </p>';

$message .= '</body></html>';


// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Create email headers
$headers .= 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$status = mail($to,$subject, $message, $headers);

  if($_POST['submit'] && $humano == '5'){
    if($status){
         header('Refresh: 1; URL=orcamento.html');
         echo '<p>Orçamento enviado com sucesso. Aguarde no máximo 72 horas úteis para que possa entrar em contato.</p>';
    }else{
     header('Refresh: 0.5; URL=orcamento.html');
     echo "<script> alert('Email não enviado. Envie um email para contato@rodolfopeixoto.com.br'); </script>";
    }
  }else if ($_POST['submit'] && $humano != '5') {
     header('Refresh: 1; URL=orcamento.html');
     echo "<script> alert('A resposta do anti-spam está incorreta.'); </script>";
     header('Location: orcamento.html');
    }
?>