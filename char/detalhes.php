<!DOCTYPE html>
<?php 
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    $id = isset($_GET['id']) ? $_GET['id'] : "1";
    $id_usuario = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes de
        <?php
            $pdo = Conexao::getInstance();
            $consulta = $pdo->query("SELECT id, nome FROM personagem WHERE id = $id");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC))
                echo $linha["nome"];
        ?>
    </title>
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
            <h2>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM personagem
                                            WHERE id = $id");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC))
                        echo $linha["nome"];
                ?>
            </h2>
        </header>
        <br>
        <h4 class='text-light'>
            <table class='table table-dark table-hover'>
                <tr>
                    <th>Nome</th>
                    <th>Classe</th>
                    <th>Raça</th>
                    <th>Pontos de vida (HP)</th>
                    <th>Alinhamento</th>
                </tr>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM personagem
                                            WHERE id = $id");
                    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                ?>
                <tr>
                    <td><?php echo $linha["nome"]; ?></td>
                    <td><?php echo $linha["classe"]; ?></td>
                    <td><?php echo $linha["raca"]; ?></td>
                    <td><?php echo $linha["pontosdevida"]; ?></td>
                    <td><?php echo $linha["alinhamento"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <table class="table table-dark table-hover">
                <tr>
                    <th>Força</th>
                    <th>Destreza</th>
                    <th>Constituição</th>
                    <th>Inteligência</th>
                    <th>Sabedoria</th>
                    <th>Carisma</th>
                </tr>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM proficiencias
                                            WHERE id_personagem = $id");
                    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                ?>
                <tr>
                    <td><?php echo $linha["forca"]; ?></td>
                    <td><?php echo $linha["destreza"]; ?></td>
                    <td><?php echo $linha["constituicao"]; ?></td>
                    <td><?php echo $linha["inteligencia"]; ?></td>
                    <td><?php echo $linha["sabedoria"]; ?></td>
                    <td><?php echo $linha["carisma"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <table class="table table-dark table-hover">
                <tr>
                    <th>Magia</th>
                    <th>Nível</th>
                </tr>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT nome, nivel FROM magia, personagem_magia
                                            WHERE id_personagem = $id
                                            AND personagem_magia.id_magia = magia.id");
                    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                ?>
                <tr>
                    <td><?php echo $linha["nome"]; ?></td>
                    <td><?php echo $linha["nivel"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </h4>
        <a class="btn btn-dark btn-lg" href="personagens.php?id=<?php echo $id_usuario; ?>">Voltar à página principal</a>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>