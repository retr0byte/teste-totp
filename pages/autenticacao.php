
<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '');

?>


<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Autenticação</title>
</head>
<body>
	<h1>Informe o token do app abaixo:</h1>
	<form action="/services/checkTOTP.php" method="post">
        <input type="text" name="token" id="" maxlength="6">
        <button type="submit">Autenticar</button>
    </form>
</body>
</html>
