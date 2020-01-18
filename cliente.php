<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="appindex.css">
        <title>Painel do Cliente</title>
    </head>
    <body class="container">
        <?php
            include "pegarDados.php";

            $id = $_POST['id'];

            $result = pegarDados($id);

            while($row = $result->fetchArray(SQLITE3_ASSOC)){
                $dados['nome'] =  $row['nome'];
                $dados['telefone'] =  $row['telefone'];
                $dados['cep'] = $row['cep'];
                $dados['endereco'] = $row['endereco'];
                $dados['numero'] = $row['numero'];
                $dados['bairro'] = $row['bairro'];
                $dados['cidade'] = $row['cidade'];
                $dados['uf'] = $row['uf'];
                break;
            }
        ?>
        <h1>Dados de <?php echo $dados['nome'];?></h1><br>
        <div class="row">
            <?php                
                echo "<div class='col-md-3'><label style='font-weight: bold'>Nome: </label><h3 style='color: darkred'>".$dados['nome']."</h3></div>";
                echo "<div class='col-md-3'><label style='font-weight: bold'>Telefone: </label><h3 style='color: darkred'>".$dados['telefone']."</h3></div>";
                echo "<div class='col-md-3'><label style='font-weight: bold'>CEP: </label><h3 style='color: darkred'>".$dados['cep']."</h3></div>";
                echo "<div class='col-md-3'><label style='font-weight: bold'>Endereço: </label><h3 style='color: darkred'>".$dados['endereco']."</h3></div>";
                echo "<div class='col-md-3'><label style='font-weight: bold'>Numero: </label><h3 style='color: darkred'>".$dados['numero']."</h3></div>";
                echo "<div class='col-md-3'><label style='font-weight: bold'>Bairro: </label><h3 style='color: darkred'>".$dados['bairro']."</h3></div>";
                echo "<div class='col-md-3'><label style='font-weight: bold'>Cidade: </label><h3 style='color: darkred'>".$dados['cidade']."</h3></div>";
                echo "<div class='col-md-3'><label style='font-weight: bold'>UF: </label><h3 style='color: darkred'>".$dados['uf']."</h3></div>";
            ?>
        </div><br>
        <a style="color: white" class="btn btn-danger bt" id="rem">Excluir Cliente</a>
        <br>
        <form style="border: 0px" action="receitasep.php" method="POST">
            <input style="display: none" name="num" value="0">
            <input style="display: none" name="id" value="<?php echo $id; ?>">
            <input type="submit" class="bt btn btn-primary" value="LUCRO MENSAL COM ESSE CLIENTE">
        </form>
        </div>
        <div>
            <h3 style="text-align: center; color: black">Selecione um equipamento</h3><br>
            <table>
                <thead>
                    <tr>
                        <th>Ar Condicionado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $resultEquip = pegarEquip($id);

                        while($row = $resultEquip->fetchArray(SQLITE3_ASSOC)){
                            echo "<tr class='item'>";
                            echo "<td class='iditem' style='display: none'>".$row['id']."</td>";
                            echo "<td class='equip'>".$row['equipamento']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div><br>
        <a class="bt btn btn-success" href="cadastroEquip.php?id=<?php echo $id; ?>">Novo Equipamento</a>
        <a class="bt btn btn-danger" href="index.php">Voltar</a>
        <br><br>
        <form method="POST" action="remCliente.php" style="display: none">
            <input type="text" id="id" name="id">
            <input type="submit" id="bt">
        </form>
        <form method="POST" action="servico.php" style="display: none">
            <input type="text" id="idit" name="id">
            <input type="text" value="<?php echo $id ?>" name="idp">
            <input type="text" id="equip1" name="equip">
            <input type="submit" id="bt1">
        </form>
        <script>
            var rem = document.querySelector("#rem");
            var id = document.querySelector("#id");
            var bt = document.querySelector("#bt");
            rem.addEventListener("click", function(){
                r = confirm("DESEJA TODOS OS DADOS DESSE CLIENTE?");
                if(r == true){
                    id.value = <?php echo $id; ?>;
                    bt.click();
                }
            });

            var item = document.querySelectorAll(".item");
            var iditem = document.querySelectorAll(".iditem");
            var equip = document.querySelectorAll(".equip");
            var idit = document.querySelector("#idit");
            var equip1 = document.querySelector("#equip1");
            var bt1 = document.querySelector("#bt1");
            for(x=0;x<item.length;x++){
                // arranjo os listeners com os index das linhas
                (function(index){
                    item[x].addEventListener("click", function(){
                        idit.value = iditem[index].textContent;
                        equip1.value = equip[index].textContent;
                        bt1.click();
                    });
                })(x);
            }
        </script>
    </body>
</html>