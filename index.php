<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Olá, eu sou o Rodolfo. Universitário, empreendedor, businessman, desenvolvedor full stack e freelancer! Caso queira saber mais sobre desenvolvimento web e startup terei o maior prazer em ajudar.">
  <meta name="keywords" content="rodolfopeixoto, rodolfo contato, freelancer, empreendedor, desenvolvedor web, sistemas web, blog do rodolfo, rodolfopeixoto, rodolfog.peixoto, desenvolvedor em campos dos goytacazes, desenvolvedor em cabo frio">
  <meta name="author" content="Rodolfo Peixoto">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:locale" content="pt_BR">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Freelancer em Desenvolvimento Web e Apps e Empreendedor - Rodolfo Peixoto">
  <meta property="og:description" content="Olá, eu sou o Rodolfo. Universitário, empreendedor, businessman, desenvolvedor full stack e freelancer! Caso queira saber mais sobre desenvolvimento web e startup terei o maior prazer em ajudar.">
  <meta property="og:url" content="http://rogpe.me/">
  <meta property="og:site_name" content="Rodolfo Peixoto">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:description" content="Olá, eu sou o Rodolfo. Universitário, empreendedor, businessman,  desenvolvedor full stack e freelancer! Caso queira saber mais sobre desenvolvimento web e startup terei o maior prazer em ajudar.">
  <meta name="twitter:title" content="Freelancer em Desenvolvimento Web e Apps e Empreendedor - Rodolfo Peixoto">


  <title>Rodolfo Peixoto</title>
  <!-- [if lt IE 9] >
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <link rel="icon" href="assets/img/favicon.ico">
  <!-- build:css assets/css/style.css -->
  <link inline rel="stylesheet" href="assets/css/reset.css" />
  <link inline rel="stylesheet" href="assets/css/main.css" />
  <link inline rel="stylesheet" href="assets/css/fonts.css" />
  <link inline rel="stylesheet" href="assets/css/header.css" />
  <link inline rel="stylesheet" href="assets/css/index.css" /> 
  <link rel="stylesheet" href="assets/css/project.css" />
  
  <!-- endbuild -->
</head>
<body>

  <?php include_once('header.php'); ?>

  <main>
    <?php
      $page = $_GET['page'];
      
      switch ($page) {
        case 'curriculum':
          include_once('pages/Curriculum.php');
        break;
        case 'contact':
          include_once('pages/Contact.php');
        break;
        case 'projects':
          require('pages/Projects.php');
        break;
        case 'skills':
          require('pages/Skills.php');
        break;
        default:
        require('pages/Home.php');
          break;
      }
    ?>
  </main>

  <script src="assets/javascript/Status.js" ></script>
  <script>
   let check = new Status();
   check.checkSistem(); 
  </script>
</body>
</html>