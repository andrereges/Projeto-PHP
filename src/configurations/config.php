<?php

    function carregaClasse($nomeDaClasse) {
        $pastas = array("daos", "models");

        foreach ($pastas as $pasta) {
            $arquivo = "../src/{$pasta}/{$nomeDaClasse}.php";
            if(file_exists($arquivo)){
            require_once($arquivo);
            }
        }
    }

    spl_autoload_register("carregaClasse");

    $server = $_SERVER['SERVER_NAME'];
    $path = $server."loja/";
    $url = $_SERVER ['REQUEST_URI'];
   #$urlEspecifica = explode("/", $urlAtual);
    #$RequestMapping = $urlEspecifica[3];
