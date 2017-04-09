<?php
    require_once("logica-usuario.php");
    require_once("../src/configurations/config.php");
    require_once("../src/connectionFactory/conexao.php");

    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $senha = $_POST["senha"];

    $usuario = new Usuario($email, $senha);

    $usuarioDAO = new UsuarioDAO($conexao);
    $usuario = $usuarioDAO->buscaUsuario($usuario);

    if($usuario->getEmail() == null) {
        $_SESSION["danger"] = "Usuário e/ou senha inválidos!";
        header("Location: login-form.php");
    } else {
        login($usuario);
        header("Location: index.php");
    }
    die();
?>

  