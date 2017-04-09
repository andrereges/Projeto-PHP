<?php

class UsuarioDAO {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function buscaUsuario($usuario) {

        $senhaMd5 = md5($usuario->getPassword());
        $query = "select * from usuario where email='{$usuario->getEmail()}' and senha='{$senhaMd5}'";

        $result = mysqli_query($this->conexao, $query);
        $usuario_encontrado = mysqli_fetch_assoc($result);
        
        $id = $usuario_encontrado['id'];
        $nome = $usuario_encontrado['nome'];
        $email = $usuario_encontrado['email'];
        $senha = $usuario_encontrado['senha'];

        $usuario = new Usuario($email, $senha);
        $usuario->SetId($id);
        $usuario->SetNome($nome);

        return $usuario;
    }
}