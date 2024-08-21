<?php
define('HOST', 'mysql.hostinger.co.uk');
define('USUARIO', 'u891725411_grupohipperr');
define('SENHA', '#Grupo@1');
define('DB', 'u891725411_grupo');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

