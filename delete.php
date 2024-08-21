<?php

    if(!empty($_GET['id_cs']))
    {
        include_once('conexao.php');

        $id = $_GET['id_cs'];

        $sqlSelect = "SELECT * FROM tb_controle_servico WHERE id_cs=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM tb_controle_servico WHERE id_cs=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: consulta_cs.php');
   
?>