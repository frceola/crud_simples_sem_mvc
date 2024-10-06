<?php

    include_once "db.php";
    $pdo = new db();

    if($_GET['acao'] == 'alterar')
    {
        $sql = "SELECT * FROM formulario WHERE id =".$_GET['id'];

        $r = $pdo->conn->prepare($sql);
        $r->execute();

        $result = $r->fetch(PDO::FETCH_OBJ);

        $id = $result->id;
        $nome_completo = $result->nome_completo;
        $login = $result->login;
        $senha = $result->senha;
    }
    else
    {
        $id = '';
        $nome_completo = '';
        $login = '';
        $senha = '';
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-5 mb-4">Formulário</h1>
            </div>    
            <br>
            <form action="salvar.php" method="post">
                <div class="mb-3">
                    <label for="Nome" class="form-label">Nome Completo:</label>
                    <input type="text" name="nome_completo" id="nome_completo" class="form-control" value="<?= $nome_completo ?>">
                </div>
                <div class="mb-3">
                    <label for="Login" class="form-label">Login:</label>
                    <input type="text" name="login" id="login" class="form-control" value="<?= $login ?>">
                </div>
                <div class="mb-3">
                    <label for="Senha">Senha: </label>
                    <input type="password" name="senha" id="senha" class="form-control" value="<?= $senha ?>">
                </div>

                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <input type="hidden" name="acao" id="acao" value="<?= $_GET['acao'] ?>">

                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div> 
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>           
