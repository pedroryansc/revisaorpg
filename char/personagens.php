<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $consultar = isset($_POST['consultar']) ? $_POST['consultar'] : "";
    $id_usuario = isset($_GET["id"]) ? $_GET["id"] : "";
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../fav/favicon.ico">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="personagens.php?id=<?php echo $id_usuario; ?>">
                <img src="../img/dndragon.png" alt="" width="50" class="d-inline-block align-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <span class="text-light">Sistema de Criação de Personagens de RPG</span>
            </div>
            <div class="d-flex">
                <a class="btn btn-dark" href="../menu.html">Sair</a>
            </div>
        </div>
    </nav>
    <div id="body">
        <br>
        <header>
            <h2>Meus Personagens</h2>
        </header>
        <br>
        <form method="post">
            <div class="col-3">
				<input type="search" class="form-control me-2" name="consultar" id="consultar" placeholder="Consultar por nome" value="<?php echo $consultar; ?>"><br>
			</div>
            <button type="submit" class="btn btn-danger btn-lg">Pesquisar</button>
            <a class="btn btn-dark btn-lg" href="criacao.php?id_usuario=<?php echo $id_usuario; ?>">Criar</a>
        </form>
        <br>
        <h4 class='text-light'>
            <table class='table table-dark table-hover'>
                <?php
                    $pdo = Conexao::getInstance();
                    $consulta = $pdo->query("SELECT * FROM personagem 
                                            WHERE nome LIKE '$consultar%'
                                            AND id_usuario = $id_usuario
                                            ORDER BY nome");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $linha["nome"]; ?></td>
                    <td><a class="text-light" href="detalhes.php?id=<?php echo $linha['id'];?>&id_usuario=<?php echo $id_usuario; ?>">Detalhes</a></td>
                    <td><a class="text-light" href="criacao.php?acao=editar&id=<?php echo $linha['id'];?>&id_usuario=<?php echo $id_usuario; ?>">Editar</a></td>
                    <td><a class="text-light" href="javascript:excluirRegistro('acao_char.php?acao=excluir&id=<?php echo $linha['id'];?>&id_usuario=<?php echo $id_usuario ?>')">Excluir</a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </h4>
    </div>
    <br><br><br><br><br>
    <br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
    <br><br><br><br>
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
<script>
    function excluirRegistro(url) {
        if (confirm("Excluir personagem? Esta ação não poderá ser desfeita."))
            location.href = url; 
    }
</script>