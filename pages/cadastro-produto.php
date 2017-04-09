<?php 
    require_once("includes/cabecalho.php");
    
    verificaUsuario();

    $categoria = new Categoria();
    $categoria->setId(1);
    
    $produto = new Produto("", "", "", "", $categoria);

    $categoriaDAO = new CategoriaDAO($conexao);
    $categorias = $categoriaDAO->lista();
?>

<h1>Cadastro de Produto</h1>
<form action="adiciona-produto.php" method='POST' class="form-horizontal">

        <?php require_once("produto-formulario-base.php"); ?>

        <button type="submit" class="btn btn-primary" id="btn-cadastrar">
            <span class="glyphicon glyphicon-floppy-disk"/> Cadastrar
        </button>

</form>

<?php require_once("includes/rodape.php"); ?>