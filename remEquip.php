<?php
    include "conexao.php";

    $id = $_GET['id'];

    $db = conexao();
    $db->exec("DELETE FROM equipamento WHERE id=$id");
    $db->exec("DELETE FROM servicos WHERE idAr=$id");
    
    echo "<!DOCTYPE html>
    <html lang='pt'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        </head>
        <body>
            <form style='display: none' action='cliente.php' method='POST'>
                <input type='text' name='id' value='$id'>
                <input type='submit' id='sub'>
            </form>
            <script>
                var sub = document.querySelector('#sub');
                sub.click();
            </script>
        </body>
    </html>";
?>