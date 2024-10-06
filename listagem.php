<script>
    
    function excluir(id)
    {
        confirm('Deseja mesmo excluir?');
        document.location = "salvar.php?acao=excluir&id="+id;
    }

    function pesquisar()
    {
        const pesquisa = $("#pesquisa").val();
        
        $.ajax({
            url: "pesquisar.php",
            method: "POST",
            data: { pesquisa },
            success: (res) => {
                $("#result").html(res);
            },
            error: () =>{
                $("#result").html('<b>Erro ao carregar os dados!</b>');
            }
        });
    }

</script>

<?php

    include_once "db.php";

    $pdo = new db();

    $sql = "SELECT * FROM formulario ORDER BY login";

    $r = $pdo->conn->prepare($sql);
    $r->execute();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <title>CRUD SIMPLES</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-5 mb-4">Cadastro de Usuários</h1>
            </div>    
            <br>
            <a href="formulario.php?acao=incluir" class="btn btn-primary btn-block mt-3">Incluir novo Registro</a>
            <br><br>
            <form class="row mt-5 mb-5" action="">
                <div class="col-12">
                    <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Faça sua Pesquisa" oninput="pesquisar();">
                </div>    
            </form>
            <?php if($resposta == 'incluido'): ?>
    
            <div class='alert alert-success'><b>Item incluido com sucesso!</b></div>

            <?php elseif($resposta == 'alterado'): ?>    

            <div class='alert alert-warning'><b>Item alterado com sucesso!</b></div>

            <?php elseif($resposta == 'excluido'): ?>    

            <div class='alert alert-danger'><b>Item excluído com sucesso!</b></div>

            <?php endif; ?>
            <br><br>
            <div id="result"></div>
            
        </div>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
            pesquisar();
        });

        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    </script>
</body>
</html>
