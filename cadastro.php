<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="appindex.css">
        <title>Cadastro</title>
    </head>
    <body class="container">
        <h1>Cadastro de Clientes</h1><br>
        <a href="index.php" class="btn btn-danger bt">Voltar</a>
        <form action="addCliente.php" method="POST">
            <div class="campos">
            <label for="nome"><b>Nome:</b></label>
            <input class="form-control" type="text" id="nome" name="nome">
            </div>
            <div class="campos">
            <label for="telefone"><b>Telefone:</b></label>
            <input class="form-control" type="text" id="telefone" name="telefone" value="">
            </div>
            <div class="campos">
            <label for="cep"><b>CEP:</b></label>
            <input class="form-control" type="text" id="cep" name="cep" placeholder="XXXXX-XXX">
            </div>
            <div class="campos">
            <label for="endereco"><b>Endereço:</b></label>
            <input class="form-control" type="text" id="endereco" name="endereco">
            </div>
            <div class="campos">
            <label for="numero"><b>Número:</b></label>
            <input class="form-control" type="number" id="numero" name="numero">
            </div>
            <div class="campos">
            <label for="bairro"><b>Bairro:</b></label>
            <input class="form-control" type="text" id="bairro" name="bairro">
            </div>
            <div class="campos">
            <label for="cidade"><b>Cidade:</b></label>
            <input class="form-control" type="text" id="cidade" name="cidade">
            </div>
            <div class="campos">
            <label for="uf"><b>UF:</b></label>
            <input class="form-control" type="text" id="uf" name="uf">
            </div>
            <input style="margin-top: 10px; margin-left: 50%; transform: translate(-50%);" class="btn btn-primary" value="Salvar" type="submit">
        </form>
        <script src="jquery.js"></script>
        <script type="text/javascript">
            $("#cep").focusout(function(){
                $.ajax({
                    url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
                    dataType: 'json',
                    success: function(resposta){
                        $("#endereco").val(resposta.logradouro);
                        $("#bairro").val(resposta.bairro);
                        $("#cidade").val(resposta.localidade);
                        $("#uf").val(resposta.uf);
                        $("#numero").focus();
                    }
                });
            });
        </script>
    </body>
</html>