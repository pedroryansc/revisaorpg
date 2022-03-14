<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = 0;
        inserir($id);
    }

    function inserir($id){
        $dados = dadosForm();
        //var_dump($dados);
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, sobrenome, username, email, senha) VALUES(:nome, :sobrenome, :username, :email, :senha)");
        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
        $nome = $dados["nome"];
        $stmt->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
        $sobrenome = $dados["sobrenome"];
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $username = $dados["username"];
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $email = $dados["email"];
        $stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
        $senha = $dados["senha"];
        $stmt->execute();
        header("location:login.php");
    }

    function dadosForm(){
        $dados = array();
        $dados["id"] = $_POST["id"];
        $dados["nome"] = $_POST["nome"];
        $dados["sobrenome"] = $_POST["sobrenome"];
        $dados["username"] = $_POST["username"];
        $dados["email"] = $_POST["email"];
        $dados["senha"] = $_POST["senha"];
        return $dados;
    }
?>