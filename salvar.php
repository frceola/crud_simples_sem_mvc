<?php
    
    include_once "db.php";

    $id            = isset($_POST['id']) ? $_POST['id'] : $_GET['id']; 
    $login         = ($_POST['login'])         ?? '';
    $senha         = ($_POST['senha'])         ?? '';
    $nome_completo = ($_POST['nome_completo']) ?? '';
    $acao          = $_POST['acao'] ?? $_GET['acao'];

    $pdo = new db();
    
    if($acao == 'incluir')
    {
        $sql = "INSERT INTO formulario(login, senha, nome_completo) 
                VALUES(:login, :senha, :nome_completo)";
        
        $r = $pdo->conn->prepare($sql);
        $r->bindParam(":login", $login, PDO::PARAM_STR);
        $r->bindParam(":senha", $senha, PDO::PARAM_STR);
        $r->bindParam(":nome_completo", $nome_completo, PDO::PARAM_STR);
        $r->execute();

        header('Location: index.php?resposta=incluido');
    }
    elseif($acao == 'alterar')
    {
        $sql = "UPDATE formulario SET 
                login = :login,
                senha = :senha,
                nome_completo = :nome_completo
                WHERE id = :id";
        
        $r = $pdo->conn->prepare($sql);
        $r->bindParam(":login", $login, PDO::PARAM_STR);
        $r->bindParam(":senha", $senha, PDO::PARAM_STR);
        $r->bindParam(":nome_completo", $nome_completo, PDO::PARAM_STR);
        $r->bindParam(":id", $id, PDO::PARAM_STR);
        $r->execute();

        header('Location: index.php?resposta=alterado');
    }
    elseif($acao == 'excluir')
    {
        $sql = "DELETE FROM formulario WHERE id = :id";

        $r = $pdo->conn->prepare($sql);
        $r->bindParam(":id", $id, PDO::PARAM_STR);
        $r->execute();

        header('Location: index.php?resposta=excluido');
    }

?>    