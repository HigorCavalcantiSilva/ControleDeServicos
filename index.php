<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="appindex.css">
        <title>Controle de Serviços em Elétrodomésticos</title>
        <?php
            include "pegarDados.php";

            $db = conexao();
            $db->exec("CREATE TABLE IF NOT EXISTS dados(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, nome TEXT, cep VARCHAR(9), endereco TEXT, numero INT, bairro TEXT, cidade TEXT, uf VARCHAR(2), telefone TEXT)");
            $db->exec("CREATE TABLE IF NOT EXISTS equipamento(id INTEGER PRIMARY KEY AUTOINCREMENT, idCli INTEGER, equipamento TEXT)");
            $db->exec("CREATE TABLE IF NOT EXISTS servicos(id INTEGER PRIMARY KEY AUTOINCREMENT, idAr INTEGER, dia DATETIME, valor DECIMAL(5,2), observacoes TEXT)");
        ?>
    </head>
    <body class="container">
        <h1><div style="color: darkred;">Controle de Serviços em Elétrodomésticos</div><br>Clientes</h1><br>
        <a href="cadastro.php" class="btn btn-success bt">Cadastrar Cliente</a>
        <a href="receita.php" class="btn btn-primary bt">Ver Receita</a>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nome do Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = pegarDados("");

                        while($row = $result->fetchArray(SQLITE3_ASSOC)){
                            echo "<tr class='sel'>";
                            echo "<td class='id' style='display: none'>".$row['id']."</td>";
                            echo "<td>".$row['nome']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div style="display: none">
            <form action="cliente.php" method="POST">
                <input type="text" id="id" name="id">
                <input type="submit" id="bt">
            </form>
        </div>
        <footer>
            <h3 style="float: left; text-align: center; margin-top: 100px">Desenvolvedor: Higor Cavalcanti Silva</h3>
        </footer>
        <script type="text/javascript">
            var sel = document.querySelectorAll(".sel");
            var sel1 = document.querySelectorAll(".id");
            var bt = document.querySelector("#bt");
            var id = document.querySelector("#id");
            for(x=0;x<sel.length;x++){
                // arranjo os listeners com os index das linhas
                (function(index){
                    sel[x].addEventListener("click", function(){
                        id.value = sel1[index].textContent;
                        bt.click();
                    });
                })(x);
            }
        </script>
    </body>
</html>