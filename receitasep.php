<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="appindex.css">
        <title>Receitas Mensais</title>
    </head>
    <body class="container">
        <?php
        include "pegarDados.php";
            $num = $_POST['num'];
            $id = $_POST['id'];

            $label = Array("LUCRO MENSAL DESSE CLIENTE", "LUCRO MENSAL DESTE EQUIPAMENTO");

            if($num == 0){
                echo " <form style='border: 0px' action='cliente.php' method='POST'>
                <input style='display: none' name='id' value='$id'>
                <input type='submit' class='btn btn-danger bt' value='Voltar'>
            </form>";
            } else {
                echo " <form style='border: 0px' action='servico.php' method='POST'>
                <input style='display: none' name='id' value='$id'>
                <input style='display: none' name='id' value='".$_POST['equip']."'>
                <input type='submit' class='btn btn-danger bt' value='Voltar'>
            </form>";
            }
        ?>
        <h1><?php echo $label[$num] ?></h1>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Mês/Ano</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ar = Array();
                    $meses = ["", "Janeiro", "Fevereiro", "MarÇo", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
                    $soma = ["",0,0,0,0,0,0,0,0,0,0,0,0];
                    if($num == 0){
                        $result = pegarReceitaCli($id);
                    } else {
                        $result = pegarReceitaCli2($id);
                    }
                    while($row = $result->fetchArray(SQLITE3_ASSOC)){
                        $ar[] = $row['id'];
                    }
                    if(count($ar) != 0){
                        for($i=0;$i<count($ar);$i++){
                            if($num == 0){
                                $result = pegarReceitaCli1($ar[$i]);
                            } else {
                                $result = pegarReceitaCli3($ar[$i]);
                            }
                            for($f=0;$f<12;$f++){
                                while($row = $result->fetchArray(SQLITE3_ASSOC)){
                                    $mes = date("m") - $f;
                                    if($mes < 1){
                                        $mes = 12 + $mes;
                                        $ano = date("Y") - 1;
                                    } else {
                                        $ano = date("Y");
                                    }
                                    if(date("m/Y", strtotime($row["dia"])) == ($mes<10?"0".$mes:$mes)."/".$ano){
                                        $soma[$mes] += $row["valor"];
                                    }
                                } 
                            }
                        }   
                    }                    
                    for($t=date('m');$t>=(date('m')-11);$t--){
                        $mes1 = $t;
                        if($mes1 < 1){
                            $mes1 = 12 + $mes1;
                            $ano = date("Y") - 1;
                        } else {
                            $ano = date("Y");
                        }
                        echo "<tr><td>".strtoupper($meses[intval($mes1)])."/".$ano."</td><td>R$ ".number_format($soma[intval($mes1)],2,",",".")."</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <br><br>        
    </body>
</html>