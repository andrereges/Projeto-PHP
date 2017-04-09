<?php 
    require_once("includes/cabecalho.php"); 
?>

<form action="login.php" method="POST" >
        
    <h1>Página de Index</h1>

    <?php if(isLogged()) : ?>
        <p class="text-success">Você está logado como <?= usuarioLogado() ?></p>

<?php  
    endif;
    require_once("includes/rodape.php"); 
?>