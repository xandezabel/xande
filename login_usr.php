<?php
session_start();
include('conexao.php');

if(empty($_POST['nome']) || empty($_POST['senha'])) {
	header('Location: index.html');
	exit();
}

$nome_user = mysqli_real_escape_string($conexao, $_POST['nome_user']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senha_rep = mysqli_real_escape_string($conexao, $_POST['senha_rep']);

$query = "select nome from cd_usuario where nome = '{$nome}' and senha = ('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);


// visualizar se retorna  0 ou 1
//echo $row;exit;

if($row == 1) {
	$_SESSION['nome'] = $nome;
	header('Location: controle_servico.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: cad_login.html');
	exit();
}