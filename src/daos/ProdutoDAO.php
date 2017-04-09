<?php
   
class ProdutoDAO {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
   
   public function lista() {

        $query = "select p.*, c.nome as categoria_nome from produto p 
                        join categoria c where p.categoria_id = c.id";
        $result = mysqli_query($this->conexao, $query);

        $produtos = array();

        while($produto_array = mysqli_fetch_assoc($result)) {
            
            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);

            $id = $produto_array['id'];
            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];
            $isbn = $produto_array['isbn'];
            $tipo = $produto_array['tipo'];

            if ($tipo == "Livro") {
                $produto = new Livro($nome, $preco, $descricao, $usado, $categoria);
                $produto->setIsbn($isbn);
            } else {
                $produto = new Produto($nome, $preco, $descricao, $usado, $categoria);
            }
            $produto->setId($id);

            array_push($produtos, $produto);
        }

        return $produtos;
    }

    public function buscaPorId($id) {

        $query = "select * from produto where id={$id}";
        $result = mysqli_query($this->conexao, $query);
        $produto_encontrado = mysqli_fetch_assoc($result);

        $categoria = new Categoria();
        $categoria->setId($produto_encontrado['categoria_id']);

        $id = $produto_encontrado['id'];
        $nome = $produto_encontrado['nome'];
        $preco = $produto_encontrado['preco'];
        $descricao = $produto_encontrado['descricao'];
        $usado = $produto_encontrado['usado'];
        $isbn = $produto_encontrado['isbn'];
        $tipo = $produto_encontrado['tipo'];

        if ($tipo == "Livro") {
            $produto = new Livro($nome, $preco, $descricao, $usado, $categoria);
            $produto->setIsbn($isbn);
        } else {
            $produto = new Produto($nome, $preco, $descricao, $usado, $categoria);
        }
        $produto->setId($id);


        return $produto;
    }

    public function insere(Produto $produto) {

        $isbn = "";
        if ($produto->hasIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $tipo = get_class($produto);
        
        $query = "insert into produto (nome, preco, descricao, usado, categoria_id, isbn, tipo) values 
                    ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', 
                        {$produto->isUsado()}, {$produto->getCategoria()->getId()}, 
                        '{$isbn}', '{$tipo}')";
        
        return mysqli_query($this->conexao, $query);   
    } 

    public function altera(Produto $produto) {

        $isbn = "";
        if ($produto->hasIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $tipo = get_class($produto);

        $query = "update produto set nome='{$produto->getNome()}', preco={$produto->getPreco()}, 
                        descricao='{$produto->getDescricao()}', usado={$produto->isUsado()}, 
                            categoria_id={$produto->getCategoria()->getId()}, 
                                isbn='{$isbn}', tipo='{$tipo}' 
                                    where id= {$produto->getId()}";
    
        return mysqli_query($this->conexao, $query);   
    }

    public function exclui($id) {
        $query = "delete from produto where id={$id}";
        
        return mysqli_query($this->conexao, $query);
    }
}