<?php

class Produto {

    private $id;
    private $nome;
    protected $preco;
    private $descricao;
    private $usado;
    private $categoria;

    public function __construct($nome, $preco, $descricao, $usado, Categoria $categoria) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function isUsado() {
        return $this->usado;
    }

    public function setUsado($usado) {
        $this->usado = $usado;
    }

    public function hasIsbn() {
        return $this instanceof Livro;
    }


    public function precoComDesconto($valor = 0.1) {

        if($valor < 0 || $valor > 0.6) {
            return $this->preco;
        }

        $precoComDesconto = $this->preco - ($this->preco * $valor);
        return $precoComDesconto;
    }

    public function calculaImposto() {
        return $this->preco * 0.195;
    }
    
    function __toString() {
        return "PRODUTO ->  Id: ".$this->id.            
                        " | Nome: ".$this->nome.
                        " | Preço: ". number_format($this->preco, 2, ',', '.').
                        " | Descrição: ".$this->descricao.
                        " | Usado: ".$this->usado.
                        " | Categoria: ".$this->categoria->getId();

    }
}

?>