<?php
    // isset -> serve para saber se uma variável está definida
    include_once('conexao.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id_cs'];
        $data = $_POST['dt_cs'];
        $user = $_POST['usr_cs'];
        $ser = $_POST['ser_cs'];
        $cc = $_POST['cc_cs'];
        $emp = $_POST['emp_cs'];
        $os = $_POST['os_cs'];
        $nf = $_POST['nf_cs'];
        $vl = $_POST['vl_cs'];
        $dt_ex = $_POST['dt_ex_cs'];              
        $hi = $_POST['hi_cs'];              
        $hf = $_POST['hf_cs'];              
        $st = $_POST['st_cs'];              
        $obs = $_POST['obs_cs'];              
        $lib = $_POST['lib_cs'];
        
        //$sqlInsert = "UPDATE `tb_controle_servico` SET `dt_cs`='$data',`usr_cs`='$user',`ser_cs`='$ser',`cc_cs`='$cc',`emp_cs`='$emp',`os_cs`='$os',`nf_cs`='$nf',`vl_cs`='$vl',`dt_ex_cs`='$dt_ex',`hi_cs`='$hi',`hf_cs`='$hf',`st_cs`='$st',`obs_cs`='$obs',`lib-cs`='$lib' WHERE id_cs=$id";
        $sqlInsert = "UPDATE `tb_controle_servico` SET `dt_cs`='$data',`usr_cs`='$user',`ser_cs`='$ser',`cc_cs`='$cc',`emp_cs`='$emp',`os_cs`='$os',`nf_cs`='$nf',`vl_cs`='$vl',`dt_ex_cs`='$dt_ex',`hi_cs`='$hi',`hf_cs`='$hf',`st_cs`='$st',`obs_cs`='$obs',`lib_cs`='$lib',`dtr_cs`='' WHERE id_cs=$id";
        //$sqlInsert = "UPDATE `tb_notas` SET `id_nf`='$id',`lj_nf`='$loja',`n_nf`='$nota',`for_nf`='$fornecedor',`dt_nf`='$data',`vt_nf`='$valor',`dt_venc`='$data_vencimento',`usr_conf`='$usuario',`obs`='$obs',`lb_nf`='$liberacao' WHERE id_nf=$id";

       // $sqlInsert = "UPDATE usuarios SET nome='$nome',senha='$senha',email='$email',telefone='$telefone',genero='$sexo',data_nascimento='$data_nasc',cidade='$cidade',estado='$estado',endereco='$endereco' WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: consulta_cs.php');

?>