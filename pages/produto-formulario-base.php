        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="nome" value="<?=$produto->getNome()?>" >
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" placeholder="preço" value="<?=$produto->getPreco()?>" >
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" placeholder="descrição do produto"><?=$produto->getDescricao()?></textarea>
        </div>
        
        <div class="form-group">
            <label for="usado">Usado</label>
            <input type="checkbox" class="form-control" name="usado" <?=$usado?> value="true" >
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoria</label>  

            <select name="categoria_id" class="form-control">
                <?php foreach($categorias as $categoria) : 
                    $isCategoria = $produto->getCategoria()->getId() == $categoria->getId();
                    $selecao = $isCategoria ? "selected='selected'" : "";
                ?>
                    <option value="<?=$categoria->getId()?>" <?=$selecao?>>
                        <?=$categoria->getNome()?>
                    </option>
                <?php endforeach ?>

            </select>          
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>  

            <select name="tipo" class="form-control">
                <?php 

                    $tipos = array("Produto", "Livro");

                    foreach($tipos as $tipo) : 
                        $isTipo = get_class($produto) == $tipo;
                        $selecao = $isTipo ? "selected='selected'" : "";
                ?>
                    <option value="<?=$tipo?>" <?=$selecao?>>
                        <?=$tipo?>
                    </option>
               
                <?php endforeach ?>

            </select>          
        </div>

        <div class="form-group">
            <label for="isbn">ISBN (caso seja um livro)</label>
            <input type="text" class="form-control" name="isbn" 
                value="<?php if ($produto->hasIsbn()) { echo $produto->getIsbn(); } ?>" >
        </div>