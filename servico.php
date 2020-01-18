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

            $idp = $_POST['idp'];
        ?>    
        <div>
            <h1 style="color: darkred;"><?php echo $_POST['equip']; ?></h1><br>
            <a style="color: white" class="bt btn btn-danger" id="rem">Remover Equipamento</a>
            <form style="border: 0px" action="receitasep.php" method="POST">
                <input style="display: none" name="num" value="1">
                <input style="display: none" name="equip" value="<?php echo $_POST['equip']; ?>">
                <input style="display: none" name="id" value="<?php echo $id; ?>">
                <input type="submit" class="bt btn btn-primary" value="LUCRO MENSAL COM ESSE CLIENTE">
            </form>
            <h3 style="text-align: center; color: black">Edite/Adicione um Serviço</h3><br>
            <table>
                <thead>
                    <tr>
                        <td style="background-color: #CCC; font-weight: bold">Data</td>
                        <td style="background-color: #CCC; font-weight: bold">Valor</td>
                        <td style="background-color: #CCC; font-weight: bold">Observações</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $resultServ = pegarServ($id);

                        while($row = $resultServ->fetchArray(SQLITE3_ASSOC)){
                            echo "<tr class='item'>";
                            echo "<td class='iditem' style='display: none'>".$row['id']."</td>";
                            echo "<td>".date('d/m/Y', strtotime($row['dia']))."</td>";
                            echo "<td>R$ ".number_format($row['valor'],2,",",".")."</td>";
                            echo "<td>".$row['observacoes']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div><br>
        <a class="bt btn btn-success" href="cadastroServ.php?id=<?php echo $id; ?>&nome=<?php echo $_POST['equip']; ?>">Novo Serviço</a>
        <form style="border: 0px; margin-top: -20px;" action="cliente.php" method="POST">
            <input style="display: none" name="id" value="<?php echo $idp;?>">
            <input class="bt btn btn-danger" type="submit" value="Voltar">
        </form>
        <br><br>
        <script>
            var item = document.querySelectorAll(".item");
            var iditem = document.querySelectorAll(".iditem");
            for(x=0;x<item.length;x++){
                // arranjo os listeners com os index das linhas
                (function(index){
                    item[x].addEventListener("click", function(){
                        var id = iditem[index].textContent;
                        location.href = "editarServ.php?id=" + id + "&nome=<?php echo $_POST['equip']; ?>&idp=<?php echo $id?>";
                    });
                })(x);
            }

            var rem = document.querySelector("#rem");
            rem.addEventListener("click", function(){
                r = confirm("DESEJA REMOVER ESTE EQUIPAMENTO?");
                if(r == true){
                    location.href = "remEquip.php?id=<?php echo $id; ?>";
                }
            });
        </script>
    </body>
</html>