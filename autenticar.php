<?php

include_once "vendor/autoload.php";

use Google\Authenticator\GoogleAuthenticator;

$g = new GoogleAuthenticator();

$secret = 'XVQ2UIGO75XRUKJO';

if(isset($_POST['token'])){
    $token = $_POST["token"];

    if($g->checkCode($secret,$token)){
        echo "Autenticação OK";
    }else{
        echo "Autenticação RECUSADA";
        echo "<br>";
        echo "Token inválido ou expirado";
    }
    die();
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Informe o token</h1>
	<form method="post">
        <input type="text" name="token" id="" maxlength="6">
        <button type="submit">Autenticar</button>
    </form>
</body>
</html>
