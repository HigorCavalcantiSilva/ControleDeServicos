<?php
    include "conexao.php";

    $equip = $_POST['equip'];
    $id = $_POST['id'];

    $db = conexao();

    $db->exec("INSERT INTO equipamento(idCli, equipamento) VALUES ($id,'$equip')");

    echo "<!DOCTYPE html>
    <html lang='pt'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        </head>
        <body>
            <form style='display: none' action='cliente.php' method='POST'>
                <input type='text' name='id' id='id'>
                <input type='submit' id='sub'>
            </form>
            <script>
                var id = document.querySelector('#id');
                var sub = document.querySelector('#sub');
                id.value = $id;
                sub.click();
            </script>
        </body>
    </html>";
?>
