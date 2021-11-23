<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '');

?>


<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Homepage painel</title>
</head>
<body>
	<h1>Parabéns, você concluiu o teste!</h1>
    <p>Durante este teste, você passou por: </p>
    <ol>
	    <li>Autenticação por Google ReCAPTCHA;</li>
	    <li>Autenticação de usuário no Banco de Dados Remoto;</li>
	    <li>Autenticação via Time-based One Time Password (TOTP).</li>
    </ol>

    <a href="/pages/logout.php">Sair do teste</a>
</body>
</html>
