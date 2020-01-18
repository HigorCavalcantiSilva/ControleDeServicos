<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="appindex.css">
        <title>Cadastro de Equipamentos</title>
    </head>
    <body class="container">
        <h1>Cadastrar Equipamento</h1>
        <form style="border: 0px" action="cliente.php" method="POST">
            <input style="display: none" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="submit" class="btn btn-danger bt" value="Voltar">
        </form>
        <form action="addEquip.php" method="POST">
            <div class="campos">
            <label for="equip"><b>Nome do Equipamento:</b></label>
            <input class="form-control" type="text" name="equip">
            <input style="display: none" class="form-control" type="text" name="id" value="<?php echo $_GET['id']; ?>">
            </div>
            <input style="margin-top: 10px; margin-left: 50%; transform: translate(-50%);" class="btn btn-success" value="Cadastrar" type="submit">
        </form>
    </body>
</html>