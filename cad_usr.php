<?php
session_start();
include("conexao.php");

$nome_user = mysqli_real_escape_string($conexao, trim($_POST['nome_user']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$senha_rep = mysqli_real_escape_string($conexao, trim($_POST['senha_rep']));




//$sql = "select count(*) as total from tb_notas where tb_notas = '$nf'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['cd_usuario'] = true;
	header('Location: index.html');
	exit;
}

// Validação básica
if ($senha != $senha_rep) {
	echo "As senhas não correspondem!";
} else {

//$sql = "INSERT INTO `cd_usuario`(`id_usr`, `nome_usuario` , `nome_usr`, `senha_usr`, `senha_rep`) VALUES ('','$nome_usuario','$nome_usr','$senha_usr','$senha_rep')";
$sql = "INSERT INTO `cd_usuario`(`id`, `nome_user`, `nome`, `senha`, `senha_rep`, `dat_cad`) VALUES ('','$nome_user','$nome','$senha','$senha_rep','')";
//$sql = "INSERT INTO `cd_usuario`(`id`, `nome_user`, `nome`, `senha`, `senha_rep`) VALUES ('','$nome_user','$nome','$senha','$senha_rep')";


if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	$_SESSION['msg'] = "<p style='color:green;'>Cadastrado com Sucesso!</p>";
}
}

$conexao->close();

header('Location: index.html');
exit;





?>