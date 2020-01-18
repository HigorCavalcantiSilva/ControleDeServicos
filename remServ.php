<?php
    include "conexao.php";

    $id = $_GET['id'];
    $idp = $_GET['idp'];
    $nome = $_GET['nome'];

    $db = conexao();
    $db->exec("DELETE FROM servicos WHERE id=$id") or die("<html><body><script>alert('ERRO FATAL!')</script></body></html>");

    echo "<!DOCTYPE html>
    <html lang='pt'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        </head>
        <body>
            <form style='display: none' action='servico.php' method='POST'>
                <input type='text' name='id' value='$idp'>
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