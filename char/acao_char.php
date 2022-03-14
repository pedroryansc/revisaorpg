<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

    $id_usuario = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : "";
    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        excluir($id, $id_usuario);
    }
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id == 0){
            $forca = rand(3,20);
            $destreza = rand(3,20);
            $constituicao = rand(3,20);
            $inteligencia = rand(3,20);
            $sabedoria = rand(3,20); 
            $carisma = rand(3,20);
            $pontosdevida = 10 + $constituicao;
            inserirPersonagem($id, $id_usuario, $pontosdevida);
            $pdo = Conexao::getInstance();
            $consulta = $pdo->query("SELECT id FROM personagem");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $id_personagem = $linha["id"];
            }
            inserirProficiencias($id_personagem, $forca, $destreza, $constituicao, $inteligencia, $sabedoria, $carisma, $id_usuario);
            $magia1 = rand(1,5);
            $magia2 = rand(1,5);
            $magia3 = rand(1,5);
            while($magia1 == $magia2 || $magia1 == $magia3 || $magia2 == $magia3){
                $magia1 = rand(1,5);
                $magia2 = rand(1,5);
                $magia3 = rand(1,5);
            }
            $nivel1 = rand(1,5);
            $nivel2 = rand(1,5);
            $nivel3 = rand(1,5);
            inserirMagias($id_personagem, $id_usuario, $magia1, $magia2, $magia3, $nivel1, $nivel2, $nivel3);
        } else
            editar($id, $id_usuario);
    }

    function inserirPersonagem($id, $id_usuario, $pontosdevida){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("INSERT INTO personagem (id_usuario, nome, classe, raca, pontosdevida, alinhamento)
                                VALUES($id_usuario, :nome, :classe, :raca, $pontosdevida, :alinhamento)");
        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
        $nome = $dados["nome"];
        $stmt->bindParam(":classe", $classe, PDO::PARAM_STR);
        $classe = $dados["classe"];
        $stmt->bindParam(":raca", $raca, PDO::PARAM_STR);
        $raca = $dados["raca"];
        $stmt->bindParam(":alinhamento", $alinhamento, PDO::PARAM_STR);
        $alinhamento = $dados["alinhamento"];
        $stmt->execute();
    }
    function inserirProficiencias($id_personagem, $forca, $destreza, $constituicao, $inteligencia, $sabedoria, $carisma){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("INSERT INTO proficiencias (id_personagem, forca, destreza, constituicao, inteligencia, sabedoria, carisma)
                                VALUES($id_personagem, $forca, $destreza, $constituicao, $inteligencia, $sabedoria, $carisma)");
        $stmt->execute();
    }
    function inserirMagias($id_personagem, $id_usuario, $magia1, $magia2, $magia3, $nivel1, $nivel2, $nivel3){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("INSERT INTO personagem_magia (id_personagem, id_magia, nivel)
                                VALUES($id_personagem, $magia1, $nivel1)");
        $stmt->execute();
        $stmt = $pdo->prepare("INSERT INTO personagem_magia (id_personagem, id_magia, nivel)
                                VALUES($id_personagem, $magia2, $nivel2)");
        $stmt->execute();
        $stmt = $pdo->prepare("INSERT INTO personagem_magia (id_personagem, id_magia, nivel)
                                VALUES($id_personagem, $magia3, $nivel3)");
        $stmt->execute();
        header("location:personagens.php?id=$id_usuario");
    }
    function editar($id, $id_usuario){
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE personagem SET nome = :nome, classe = :classe, raca = :raca, alinhamento = :alinhamento WHERE id = $id");
        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
        $nome = $dados["nome"];
        $stmt->bindParam(":classe", $classe, PDO::PARAM_STR);
        $classe = $dados["classe"];
        $stmt->bindParam(":raca", $raca, PDO::PARAM_STR);
        $raca = $dados["raca"];
        $stmt->bindParam(":alinhamento", $alinhamento, PDO::PARAM_STR);
        $alinhamento = $dados["alinhamento"];
        $stmt->execute();
        header("location:personagens.php?id=$id_usuario");
    }
    function excluir($id, $id_usuario){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("DELETE from proficiencias WHERE id_personagem = $id");
        $stmt->execute();
        $stmt = $pdo->prepare("DELETE from personagem_magia WHERE id_personagem = $id");
        $stmt->execute();
        $stmt = $pdo->prepare("DELETE from personagem WHERE id = $id");
        $stmt->execute();
        header("location:personagens.php?id=$id_usuario");
    }
    function buscarDados($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM personagem
                                WHERE id = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados["nome"] = $linha["nome"];
            $dados["classe"] = $linha["classe"];
            $dados["raca"] = $linha["raca"];
            $dados["alinhamento"] = $linha["alinhamento"];
        }
        return $dados;
    }
    function dadosForm(){
        $dados = array();
        $dados["nome"] = $_POST["nome"];
        $dados["classe"] = $_POST["classe"];
        $dados["raca"] = $_POST["raca"];
        $dados["alinhamento"] = $_POST["alinhamento"];
        return $dados;
    }
?>