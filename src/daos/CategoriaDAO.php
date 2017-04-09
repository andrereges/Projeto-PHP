<?php
   
class CategoriaDAO {
   
   private $conexao;

   public function __construct($conexao) {
       $this->conexao = $conexao;
   }

   public function lista() {

        $query = "select * from categoria";
        $result = mysqli_query($this->conexao, $query);
        
        $categorias = array();

        while($categoria_array = mysqli_fetch_assoc($result)) {

            $categoria = new Categoria();
            $categoria->setId($categoria_array['id']);
            $categoria->setNome($categoria_array['nome']);

            array_push($categorias, $categoria);
        }
        return $categorias;
    }
}