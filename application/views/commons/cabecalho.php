<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tutorial ensinando a montar um CRUD com CodeIgniter">
    <meta name="author" content="Universidade CodeIgniter">
    <link rel="icon" href="<?=base_url('assets/images/unici/favicon.png')?>">

    <title>Criando um CRUD com CodeIgniter</title>

    <!-- Folha de estilo do Boostrap 3.3.6 -->
    <link href="<?=base_url('assets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet">

    <!-- IE10 viewport hack para Surface/desktop Windows 8 -->
    <link href="<?=base_url('assets/css/plugins/ie10-viewport-bug-workaround.css')?>" rel="stylesheet">

    <!-- Folha de estilo com as configurações da fonte Source Sans Pro -->
    <link rel='stylesheet' id='hexa-source-sans-pro-css'  href='http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C700%2C300italic%2C400italic%2C700italic&#038;ver=4.4.2' type='text/css' media='all' />

    <!-- Folha de estilo padrão dos exemplos -->
    <link href="<?=base_url('assets/css/estilo.css')?>" rel="stylesheet">

    <!--[if lt IE 9]><script src="<?=base_url('assets/js/plugins/ie8-responsive-file-warning.js')?>"></script><![endif]-->
    <script src="<?=base_url('assets/js/plugins/ie-emulation-modes-warning.js')?>"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php $this->load->view('commons/cabecalho-unici'); ?>
