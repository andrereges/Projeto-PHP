<?php

# Cria uma sessão.
session_start();

# Verifica se usuário está logado através da session.
function isLogged() {  
    return isset($_SESSION["usuario_email"]);
}

# Pega o e-mail do usuário logado.
function usuarioLogado() {
    if(isLogged()){
        return $_SESSION["usuario_email"];
    }
}

# Cria uma session do usuário logado.
function login(Usuario $usuario) {
    $_SESSION["usuario_nome"] = $usuario->getName();
    $_SESSION["usuario_email"] = $usuario->getEmail();
}

function logout() {
    session_destroy();
    session_start();
}

# Verifica se usuário está logado para acessar a página php.
function verificaUsuario() {
    if(!isLogged()){
        $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
        Header("Location: login-form.php");
        die();
    }
}