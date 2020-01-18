<?php
    class BaseDados extends SQLite3{
        function __construct(){
            $this->open("Clientes.db");
        }
    }

    function conexao(){ 
        return new BaseDados();
    }
?>