<?php 
    require_once("../src/connectionFactory/conexao.php");
    require_once("../src/configurations/config.php");

    $id = mysqli_real_escape_string($conexao, $_POST['id']);

    $produtoDAO = new ProdutoDAO($conexao);
    $produtoDAO->exclui($id);
    
    $_SESSION["success"] = "Produto excluído com sucesso!";
    header("Location: lista-produto.php");
    die();
 ?>