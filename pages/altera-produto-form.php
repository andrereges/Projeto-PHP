<?php 
    require_once("includes/cabecalho.php");

    $id = $_POST['id'];

    $produtoDAO = new ProdutoDAO($conexao);
    $produto = $produtoDAO->buscaPorId($id);
    
    $categoriaDAO = new CategoriaDAO($conexao);
    $categorias = $categoriaDAO->lista();

    # Função PHP para o checkbox -->
    $produto->isUsado() ? $usado = "checked= 'checked'" : $usado = "";

?>

<h1>Alteração de Produto</h1>
<form action="altera-produto.php" method='POST' class="form-horizontal">
       
        <input type="hidden" name="id" value="<?=$produto->getId()?>">
        
        <?php require_once("produto-formulario-base.php"); ?>

        <button type="submit" class="btn btn-primary" id="btn-alterar">
            <span class="glyphicon glyphicon-floppy-disk"/> Alterar
        </button>

</form>

<?php require_once("includes/rodape.php"); ?>