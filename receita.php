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
        <h1>Receitas Mensais</h1>
        <form style="border: 0px" action="index.php" method="POST">
            <input type="submit" class="btn btn-danger bt" value="Voltar">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Mês</th>
                    <th>Renda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "pegarDados.php";

                    $soma = 0;
                    $meses = ["", "Janeiro", "Fevereiro", "MarÇo", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
                    $result = pegarReceita();
                    while($row = $result->fetchArray(SQLITE3_ASSOC)){
                        $ar[] = $row['dia'];
                        break;
                    }
                    if(empty($ar[0])){
                        for($i=0;$i<12;$i++){
                            echo "<tr><td>TABELAS VAZIAS</td><td>TABELAS VAZIAS</td></tr>";
                        }
                    } else {
                        $fix=0;
                        for($c=-1;$c<12;$c++){
                            while($row = $result->fetchArray(SQLITE3_ASSOC)){
                                $mes = date("m") - $c;
                                if($mes < 1){
                                    $mes = 12 + $mes;
                                    $ano = date("Y") - 1;
                                } else {
                                    $ano = date("Y");
                                }
                                if(date("m/Y", strtotime($row["dia"])) == $mes."/".$ano){
                                    $soma += $row["valor"];
                                }
                            } 
                            if($fix != 0){
                                echo "<tr><td>".strtoupper($meses[$mes])."/".$ano."</td><td>R$ ".number_format($soma,2,",",".")."</td></tr>";
                            }
                                $soma = 0;
                            $fix++;
                        } 
                    }           
                    ?>
            </tbody>
        </table><br><br>
    </body>
</html>