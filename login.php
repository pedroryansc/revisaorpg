<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="fav/favicon.ico">
</head>
<body>
<br><br><br><br><br>
    <center>
        <h2>Login</h2>
    </center>
    <br>
    <form method="post">
        <div class="form-floating col-3 mx-auto">
            <input required="true" type="text" class="form-control" name="email" id="email" placeholder="email"><br>
            <label for="email">E-mail</label>
        </div>
        <div class="form-floating col-3 mx-auto">
            <input required="true" type="password" class="form-control" name="senha" id="senha" placeholder="senha"><br>
            <label for="senha">Senha</label>
        </div>
        <br>
        <div class="d-grid gap-2 d-md-flex col-3 mx-auto justify-content-md-end">
            <a class="btn btn-dark btn-lg" href="menu.html">Voltar à página inicial</a>
            <button type="submit" class="btn btn-danger btn-lg">Entrar</button>
        </div>
    </form>
    <?php
        $sql = "SELECT id, email, senha FROM usuario";
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query($sql);
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($linha["email"] == $email && $linha["senha"] == $senha){
                header("location:char/personagens.php?id={$linha['id']}");
            }
        }
    ?>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <footer class="footer mt-auto py-3 bg-dark">
        <center>  
            <div class="container">
                <span class="text-light"><br> ©2022 3º INFO</span>
            </div>
        </center>
    </footer>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>