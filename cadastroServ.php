<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="appindex.css">
        <title>Cadastro de Serviços</title>
    </head>
    <body class="container">
        <h1>Cadastrar Serviço</h1>
        <form style="border: 0px" action="cliente.php" method="POST">
            <input style="display: none" name="id" value="<?php echo $_GET['id'] ?>">
            <input style="display: none" class="form-control" type="text" name="nome" value="<?php echo $_GET['nome']; ?>">
            <input type="submit" class="btn btn-danger bt" value="Voltar">
        </form>
        <form action="addServ.php" method="POST">
            <label for="data"><b>Data do Serviço:</b></label>
            <input class="form-control" type="date" name="data">
            <label for="valor"><b>Valor(R$):</b></label>
            <input class="form-control" type="number" name="valor">
            <label for="observacoes"><b>Observações:</b></label>
            <input class="form-control" type="text" name="observacoes">
            <input style="display: none" class="form-control" type="text" name="nome" value="<?php echo $_GET['nome']; ?>">
            <input style="display: none" class="form-control" type="text" name="id" value="<?php echo $_GET['id']; ?>">
            <input style="margin-top: 10px; margin-left: 50%; transform: translate(-50%);" class="btn btn-success" value="Cadastrar" type="submit">
        </form>
    </body>
</html>