<!DOCTYPE html>
<?php 
	include_once "acao_char.php";
	$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
	$dados;
	$id = isset($_GET["id"]) ? $_GET["id"] : 0;
    if($acao == "editar"){
        if($id > 0){
            $dados = buscarDados($id);
        }
    }
	$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
	$classe = isset($_POST["classe"]) ? $_POST["classe"] : "";
	$raca = isset($_POST["raca"]) ? $_POST["raca"] : "";
	$alinhamento = isset($_POST["alinhamento"]) ? $_POST["alinhamento"] : "";
	$magia1 = isset($_POST["magia1"]) ? $_POST["magia1"] : "";
	$magia2 = isset($_POST["magia2"]) ? $_POST["magia2"] : "";
	$magia3 = isset($_POST["magia3"]) ? $_POST["magia3"] : "";
	$id_usuario = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de personagem</title>
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
            <h2>Criação de Personagem</h2>
        </header>
		<br>
		<form method="post" action="acao_char.php?id=<?php echo $id; ?>&id_usuario=<?php echo $id_usuario; ?>">
			<div class="form-floating">
				<input required="true" type="text" class="form-control" name="nome" id="nome" placeholder="nome"
				value="<?php if($acao == "editar"){ echo $dados["nome"]; } ?>"><br>
				<label for="nome">Nome do personagem</label>
			</div>
			Classe
			<div>
				<select class="form-select" name="classe" id="classe">
					<option value="Bárbaro" <?php if($acao == "editar" && $dados["classe"] == "Bárbaro") echo "selected"; ?>>Bárbaro</option>
					<option value="Bardo" <?php if($acao == "editar" && $dados["classe"] == "Bardo") echo "selected"; ?>>Bardo</option>
					<option value="Bruxo" <?php if($acao == "editar" && $dados["classe"] == "Bruxo") echo "selected"; ?>>Bruxo</option>
					<option value="Clérigo" <?php if($acao == "editar" && $dados["classe"] == "Clérigo") echo "selected"; ?>>Clérigo</option>
					<option value="Druida" <?php if($acao == "editar" && $dados["classe"] == "Druida") echo "selected"; ?>>Druida</option>
					<option value="Feiticeiro" <?php if($acao == "editar" && $dados["classe"] == "Feiticeiro") echo "selected"; ?>>Feiticeiro</option>
					<option value="Guerreiro" <?php if($acao == "editar" && $dados["classe"] == "Guerreiro") echo "selected"; ?>>Guerreiro</option>
					<option value="Ladino" <?php if($acao == "editar" && $dados["classe"] == "Ladino") echo "selected"; ?>>Ladino</option>
					<option value="Mago" <?php if($acao == "editar" && $dados["classe"] == "Mago") echo "selected"; ?>>Mago</option>
					<option value="Monge" <?php if($acao == "editar" && $dados["classe"] == "Monge") echo "selected"; ?>>Monge</option>
					<option value="Paladino" <?php if($acao == "editar" && $dados["classe"] == "Paladino") echo "selected"; ?>>Paladino</option>
					<option value="Patrulheiro" <?php if($acao == "editar" && $dados["classe"] == "Patrulheiro") echo "selected"; ?>>Patrulheiro</option>
				</select>
			</div>
			<br>
			Raça:
			<div>
				<select class="form-select" name="raca" id="raca">
					<option value="Anão" <?php if($acao == "editar" && $dados["raca"] == "Anão") echo "selected"; ?>>Anão</option>
					<option value="Draconato" <?php if($acao == "editar" && $dados["raca"] == "Draconato") echo "selected"; ?>>Draconato</option>
					<option value="Elfo" <?php if($acao == "editar" && $dados["raca"] == "Elfo") echo "selected"; ?>>Elfo</option>
					<option value="Gnomo" <?php if($acao == "editar" && $dados["raca"] == "Gnomo") echo "selected"; ?>>Gnomo</option>
					<option value="Halfling" <?php if($acao == "editar" && $dados["raca"] == "Halfling") echo "selected"; ?>>Halfling</option>
					<option value="Humano" <?php if($acao == "editar" && $dados["raca"] == "Humano") echo "selected"; ?>>Humano</option>
					<option value="Meio-elfo" <?php if($acao == "editar" && $dados["raca"] == "Meio-elfo") echo "selected"; ?>>Meio-elfo</option>
					<option value="Meio-orc" <?php if($acao == "editar" && $dados["raca"] == "Meio-orc") echo "selected"; ?>>Meio-orc</option>
					<option value="Tiefling" <?php if($acao == "editar" && $dados["raca"] == "Tiefling") echo "selected"; ?>>Tiefling</option>
				</select>
			</div>
			<br>
			Alinhamento:
			<div>
				<select class="form-select" name="alinhamento" id="alinhamento">
					<option value="Leal e Bom" <?php if($acao == "editar" && $dados["alinhamento"] == "Leal e Bom") echo "selected"; ?>>Leal e Bom</option>
					<option value="Neutro e Bom" <?php if($acao == "editar" && $dados["alinhamento"] == "Neutro e Bom") echo "selected"; ?>>Neutro e Bom</option>
					<option value="Caótico e Bom" <?php if($acao == "editar" && $dados["alinhamento"] == "Caótico e Bom") echo "selected"; ?>>Caótico e Bom</option>
					<option value="Leal e Neutro" <?php if($acao == "editar" && $dados["alinhamento"] == "Leal e Neutro") echo "selected"; ?>>Leal e Neutro</option>
					<option value="Neutro" <?php if($acao == "editar" && $dados["alinhamento"] == "Neutro") echo "selected"; ?>>Neutro</option>
					<option value="Caótico e Neutro" <?php if($acao == "editar" && $dados["alinhamento"] == "Caótico e Neutro") echo "selected"; ?>>Caótico e Neutro</option>
					<option value="Leal e Mau" <?php if($acao == "editar" && $dados["alinhamento"] == "Leal e Mau") echo "selected"; ?>>Leal e Mau</option>
					<option value="Neutro e Mau" <?php if($acao == "editar" && $dados["alinhamento"] == "Neutro e Mau") echo "selected"; ?>>Neutro e Mau</option>
					<option value="Caótico e Mau" <?php if($acao == "editar" && $dados["alinhamento"] == "Caótico e Mau") echo "selected"; ?>>Caótico e Mau</option>
				</select>
    		</div>
			<br>
        	<div class="d-grid gap-2 d-md-flex mx-auto justify-content-md-end">
            	<a class="btn btn-dark btn-lg" href="personagens.php?id=<?php echo $id_usuario; ?>">Voltar à página principal</a>
            	<button type="submit" class="btn btn-danger btn-lg" name="acao" id="acao" value="salvar">Salvar</button>
        	</div>
		</form>
	</div>
	<br><br><br><br><br>
    <br><br><br><br><br>
	<br><br><br><br><br>
	<br><br>
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