<?php 
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../pages/logica-usuario.php");
    require_once("mostra-alert.php");
    require_once("../src/connectionFactory/conexao.php");

    require_once("../src/configurations/config.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Minha loja</title>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    -->
    <link href="../resources/css/bootstrap.css" rel="stylesheet" />
    <link href="../resources/css/loja.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="nav navbar-nav" href="index.php">
                    <img alt="Brand" src="../resources/imagens/logo.png" height="50" width="100" >
                </a>
            </div>
           
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"/> Home</a></li>
                    <li class="active"><a href="cadastro-produto.php"><span class="glyphicon glyphicon-plus"/> Cadastro Produto</a></li>
                    <li class="active"><a href="lista-produto.php"> <span class="glyphicon glyphicon-th-list"/> Lista de Produtos</a></li>
                    <li class="active"><a href="contato.php"><span class="glyphicon glyphicon-envelope"/> Contato</a></li>
                    <li class="active"><a href="sobre.php"><span class="glyphicon glyphicon-paperclip"/> Sobre</a></li>
                </ul>
                <div class="navbar-text navbar-right">
                    <? if(isLogged()) { ?>
                        
                        <a href="#" class="navbar-link"><span class="glyphicon glyphicon-user"/> <?= usuarioLogado()?></a> 
                        <a href="logout.php" class=" navbar-btn"><span class="glyphicon glyphicon-off"/> <strong>Logout</strong></a>
                        
                    <?} else { ?>
                       <a href="login-form.php" class="navbar-btn"><span class="glyphicon glyphicon-user"/><strong> Login</strong></a>
                    <? } ?>
                </div>
            </div>

        </div> <!-- container acaba aqui -->
    </nav>

    <div class="container">

        <div class="principal">

        <?php mostraAlerta("success"); ?>
        <?php mostraAlerta("danger"); ?>