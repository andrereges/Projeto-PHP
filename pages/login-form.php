<?php require_once("includes/cabecalho.php"); ?>

<form action="login.php" method="POST" >
    
    <h1>Sistema de Login</h1>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" placeholder="Senha">
    </div>

    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-log-in"/> Login</button>

</form>

<?php require_once("includes/rodape.php"); ?>