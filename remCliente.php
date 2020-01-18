<?php
    include "conexao.php";

    $id = $_POST['id'];

    $db = conexao();

    $db->exec("DELETE FROM dados WHERE id=$id");
    $db->exec("DELETE FROM equipamento WHERE idCli=$id");
    $db->exec("DELETE FROM servicos WHERE idAr=$id");

    echo "<html><script>location.href = 'index.php'</script></html>";
?>