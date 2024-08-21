<?php
session_start();
include("conexao.php");

$dt_cs = mysqli_real_escape_string($conexao, trim($_POST['dt_cs']));
$usr_cs = mysqli_real_escape_string($conexao, trim($_POST['usr_cs']));
$ser_cs = mysqli_real_escape_string($conexao, trim($_POST['ser_cs']));
$cc_cs = mysqli_real_escape_string($conexao, trim($_POST['cc_cs']));
$emp_cs = mysqli_real_escape_string($conexao, trim($_POST['emp_cs']));
$os_cs = mysqli_real_escape_string($conexao, trim($_POST['os_cs']));
$nf_cs = mysqli_real_escape_string($conexao, trim($_POST['nf_cs']));
$vl_cs = mysqli_real_escape_string($conexao, trim($_POST['vl_cs']));
$dt_ex_cs = mysqli_real_escape_string($conexao, trim($_POST['dt_ex_cs']));
$hi_cs = mysqli_real_escape_string($conexao, trim($_POST['hi_cs']));
$hf_cs = mysqli_real_escape_string($conexao, trim($_POST['hf_cs']));
$st_cs = mysqli_real_escape_string($conexao, trim($_POST['st_cs']));
$obs_cs = mysqli_real_escape_string($conexao, trim($_POST['obs_cs']));
$lib_cs = mysqli_real_escape_string($conexao, trim($_POST['lib_cs']));
$dtr_cs = mysqli_real_escape_string($conexao, trim($_POST['dtr_cs']));
$us_cs = mysqli_real_escape_string($conexao, trim($_POST['us_cs']));


//$sql = "select count(*) as total from tb_notas where tb_notas = '$nf'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['tb_notas_existe'] = true;
	header('Location: index.html');
	exit;
}


$sql = "INSERT INTO `tb_controle_servico`(`id_cs`, `dt_cs`, `usr_cs`, `ser_cs`, `cc_cs`, `emp_cs`, `os_cs`, `nf_cs`, `vl_cs`, `dt_ex_cs`, `hi_cs`, `hf_cs`, `st_cs`, `obs_cs`, `lib_cs`, `dtr_cs`, `us_cs`) VALUES ('','$dt_cs','$usr_cs','$ser_cs','$cc_cs','$emp_cs','$os_cs','$nf_cs','$vl_cs','$dt_ex_cs','$hi_cs','$hf_cs','$st_cs','$obs_cs','$lib_cs','$dtr_cs','$us_cs')";
//$sql = "INSERT INTO `tb_notas`(`id_nf`, `lj_nf`, `n_nf`, `for_nf`, `dt_nf`, `vt_nf`, `dt_venc`, `dt_venc2`, `dt_venc3`, `dt_venc4`, `dt_venc5`, `dt_venc6`, `usr_conf`, `obs`, `lib_nf`, `dt_reg`) VALUES ('', '$lj_nf','$n_nf','$for_nf','$dt_nf','$vt_nf','$dt_venc','$dt_venc2','$dt_venc3','$dt_venc4','$dt_venc5','$dt_venc6','$usr_conf','$obs_nf', 'NULL', 'NOW()')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	$_SESSION['msg'] = "<p style='color:green;'>Nota cadastrada com Sucesso!</p>";
}

$conexao->close();

header('Location: controle_servico.php');
exit;



?>