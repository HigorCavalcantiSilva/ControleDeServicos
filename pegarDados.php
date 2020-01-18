<?php
    include "conexao.php";

    function pegarDados($id){
        $db = conexao();
        if($id == ""){
            $result = $db->query("SELECT * FROM dados");
        } else {
            $result = $db->query("SELECT * FROM dados WHERE id=$id");
        }
        return $result;
    }

    function pegarEquip($id){
        $db = conexao();
        if($id == ""){
            $result = $db->query("SELECT * FROM equipamento");
        } else {
            $result = $db->query("SELECT * FROM equipamento WHERE idCli=$id");
        }
        return $result;
    }

    function pegarServ($id){
        $db = conexao();
        $result = $db->query("SELECT * FROM servicos WHERE idAr=$id");
        return $result;
    }

    function pegarServ1($id){
        $db = conexao();
        $result = $db->query("SELECT * FROM servicos WHERE id=$id");
        return $result;
    }

    function pegarReceita(){
        $db = conexao();
        $result = $db->query("SELECT dia,valor FROM servicos");
        return $result;
    }

    function pegarReceitaCli($id){
        $db = conexao();
        $result = $db->query("SELECT id FROM equipamento WHERE idCli=$id");
        return $result;
    }

    function pegarReceitaCli1($id){
        $db = conexao();
        $result = $db->query("SELECT * FROM servicos WHERE idAr=$id");
        return $result;
    }

    function pegarReceitaCli2($id){
        $db = conexao();
        $result = $db->query("SELECT * FROM equipamento WHERE id=$id");
        return $result;
    }

    function pegarReceitaCli3($id){
        $db = conexao();
        $result = $db->query("SELECT * FROM servicos WHERE idAr=$id");
        return $result;
    }
?>