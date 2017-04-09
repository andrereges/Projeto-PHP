<?php require_once("includes/cabecalho.php"); ?>

    <h1>Contato</h1>
    
    <form action="envia-contato.php" method='POST' class="form-horizontal">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="nome" value="<?=$_SESSION["usuario_nome"]?>">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" step="any" class="form-control" name="email" placeholder="email" value="<?=$_SESSION["usuario_email"]?>">
        </div>

        <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea class="form-control" name="mensagem" placeholder="mensagem"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="btn-enviar">
            <span class="glyphicon glyphicon-send"/> Enviar
        </button>
</form>

<?php require_once("includes/rodape.php"); ?>