<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <title>CRUD SIMPLES</title>
</head>
<body>
<?php

    $pesquisa = $_POST['pesquisa'];

    include_once "db.php";

    $pdo = new db();

    $sql = "SELECT * FROM formulario 
            WHERE login like '%$pesquisa%' OR nome_completo like '%$pesquisa%'
            ORDER BY login";
    
    $r = $pdo->conn->query($sql);
    
    echo '<table class="table table-hover">';
    echo '<thead class="thead">';
    echo '<th scope="col">Login</th>';
    echo '<th scope="col">Nome Completo</th>';
    echo '<th class="text-center" scope="col">Opções</th>';
    echo '</thead>';
    echo '<tbody>';

    while($result = $r->fetch(PDO::FETCH_OBJ))
    {
        echo '<tr>';    
        echo '<td>'.$result->login.'</td>';
        echo '<td>'.$result->nome_completo.'</td>';
        echo '<td class="text-center">';
        echo '<a href="formulario.php?acao=alterar&id='.$result->id.'" class="btn btn-warning">Alterar</a>&nbsp;';
        echo '&nbsp;<a href="javascript:excluir('.$result->id.');" class="btn btn-danger">Excluir</a>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';     
?>

    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>