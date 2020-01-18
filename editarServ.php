<?php
    include "pegarDados.php";
    $id = $_GET['id'];
    $idp = $_GET['idp'];
    $nome = $_GET['nome'];
    $result = pegarServ1($id);

    $ar = Array();
    while($row = $result->fetchArray(SQLITE3_ASSOC)){
        $ar[] = $row['id'];
        $ar[] = $row['dia'];
        $ar[] = $row['valor'];
        $ar[] = $row['observacoes'];
    }
    echo "<!DOCTYPE html>
    <html lang='pt'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
            <link rel='stylesheet' href='bootstrap.min.css'>
            <link rel='stylesheet' href='appindex.css'>
            <title>Editar Serviço</title>
        </head>
        <body class='container'>
            <h1>Editar Serviço</h1>
            <form action='addEditServ.php' method='POST'>
                <label for='data'><b>Data do Serviço:</b></label>
                <input class='form-control' type='date' value='".$ar[1]."' name='data'>
                <label for='valor'><b>Valor(R$):</b></label>
                <input class='form-control' type='number' value='".$ar[2]."' name='valor'>
                <label for='observacoes'><b>Observações:</b></label>
                <input class='form-control' type='text' value='".$ar[3]."' name='observacoes'>
                <input style='display: none' value='".$ar[0]."' name='id'>
                <input style='display: none' value=".$nome." name='nome'>
                <input style='display: none' value=".$idp." name='idp'>
                <input style='margin-top: 10px; margin-left: 50%; transform: translate(-50%);' class='btn btn-success' value='Cadastrar' type='submit'>
                <input style='margin-top: 10px; margin-left: 50%; transform: translate(-50%);' class='btn btn-danger' id='apg' value='Apagar' type='button'>
            </form>
            <script>
                var apg = document.querySelector('#apg');
                apg.addEventListener('click', function(){
                    r = confirm('DESEJA APAGAR ESTE SERVIÇO?');
                    if(r == true){
                        location.href = 'remServ.php?id=".$id."&nome=".$nome."&idp=".$idp."';
                    }
                });
            </script>
        </body>";

?>