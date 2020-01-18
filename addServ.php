<?php
    include "conexao.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $observacoes = $_POST['observacoes'];

    $db = conexao();

    $db->exec("INSERT INTO servicos(idAr, dia, valor, observacoes) VALUES($id, '$data', '$valor', '$observacoes')");

    echo "<!DOCTYPE html>
    <html lang='pt'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        </head>
        <body>
            <form action='servico.php' method='POST'>
                <input type='text' name='id' value='$id'>
                <input type='text' name='equip' value='$nome'>
                <input type='submit' id='sub'>
            </form>
            <script>
                var sub = document.querySelector('#sub');
                sub.click();
            </script>
        </body>
    </html>";
?>