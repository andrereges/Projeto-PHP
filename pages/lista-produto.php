<?php 
    require_once("includes/cabecalho.php");
    
    #verificaUsuario();
    $produtoDAO = new ProdutoDAO($conexao);
    $produtos = $produtoDAO->lista();

?>
<h1>Lista de Produtos</h1>

<table class="table table-striped table-bordered">

    <th>Produto</th>
    <th>Preço</th>
    <th>Preço Com Desconto</th>
    <th>Descrição</th>
    <th>Isbn</th>
    <th>Categoria</th>
    <th>Usado</th>
    <th>Altera</th>
    <th>Exclui</th>

    <?php
        if(empty($produtos)){
    ?>
            <tr>
                <td colspan="4">Não existe produtos para serem exibidos.</td> 
            </tr>
    <?php      
        } 
        else {
            foreach($produtos as $produto) :
    ?>
        <tr>
            <td><?=$produto->getNome() ?></td>
            <td><?=number_format($produto->getPreco(),2,',','.') ?></td>  
            <td><?=number_format($produto->calculaImposto(),2,',','.') ?></td>
            <td><?=substr($produto->getDescricao(), 0, 255) ?></td>
            
            <td>
            <?php 
                if ($produto->hasIsbn()) {
                    echo $produto->getIsbn();
                }
            ?>
            </td>

            <td><?=$produto->getCategoria()->getNome() ?></td>  
            <td>
                <?php
                    if($produto->isUsado() == true) {echo 'Sim';} else{echo 'Não';} 
                ?>
            </td>
            <td>
                <form action="altera-produto-form.php" method="POST">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>" /> 
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"/></button>
                </form>
            </td>
            <td>
                <form action="exclui.php" method="POST">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>" /> 
                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"/></button>
                </form>
            </td>         
        </tr>
    <?php
        endforeach;
        }
    ?>

</table

<?php require_once("includes/rodape.php"); ?>
