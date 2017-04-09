<?php 
    require_once("../src/connectionFactory/conexao.php");
    require_once("../src/configurations/config.php");

    $categoria = new Categoria();
    $categoria->setId(mysqli_real_escape_string($conexao, $_POST['categoria_id']));
    
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $isbn = mysqli_real_escape_string($conexao, $_POST['isbn']);
    $tipo = $_POST['tipo'];
    
    if(!array_key_exists("usado", $_POST)){ 
        $usado = "false";
    } else {
        $usado = "true";
    }

    if ($tipo == "Livro") {
        $produto = new Livro($nome, $preco, $descricao, $usado, $categoria);
        $produto->setIsbn($isbn);
    } else {
        $produto = new Produto($nome, $preco, $descricao, $usado, $categoria);
    }
    $produto->setId($id);

    $produtoDAO = new ProdutoDAO($conexao);

    if($produtoDAO->altera($produto)) {

        $_SESSION["success"] = "Produto alterado com sucesso!";
        header("Location: lista-produto.php");      
    } else {
        $msg = mysqli_error($conexao);
        
        $_SESSION["danger"] = "Erro ao alterar o produto $produto->getNome(), 
                                                Motivo: $msg";
        header("Location: lista-produto.php");
    }
    die();
?>