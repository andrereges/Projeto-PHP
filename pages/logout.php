<?php
    require_once("logica-usuario.php");
    
    logout();
    $_SESSION["success"] = "Logout efetuado com sucesso!";
    Header("Location: index.php");
    die();