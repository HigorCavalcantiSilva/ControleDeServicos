<?php
    include "conexao.php";

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $db = conexao();

    $db->exec("INSERT INTO dados(nome,cep,endereco,numero,bairro,cidade,uf,telefone) VALUES('$nome','$cep','$endereco',$numero,'$bairro','$cidade','$uf', '$telefone')") or die("<html><script>alert('ERRO AO ADICIONAR CLIENTE!'); location.href = '../views/index.php'</script></html>");

    echo "<html><script>location.href = 'index.php'</script></html>";
?>