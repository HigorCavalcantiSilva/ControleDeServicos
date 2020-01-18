<?php
    include "conexao.php";

    $nome = $_POST['nome'];
    $id = $_POST['id'];
    $idp = $_POST['idp'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $observacoes = $_POST['observacoes'];

    $db = conexao();

    $db->exec("UPDATE servicos SET dia='$data', valor=$valor, observacoes='$observacoes' WHERE id=$id");

    echo "<!DOCTYPE html>
    <html lang='pt'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        </head>
        <body>
            <form style='display: none' action='servico.php' method='POST'>
                <input type='text' name='equip' value='$nome'>
                <input type='text' name='id' value='$idp'>
                <input type='submit' id='sub'>
            </form>
            <script>
                var sub = document.querySelector('#sub');
                sub.click();
            </script>
        </body>
    </html>";
?>