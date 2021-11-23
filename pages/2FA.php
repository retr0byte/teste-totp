<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '/public');

include_once __DIR__."/../vendor/autoload.php";

use Google\Authenticator\GoogleAuthenticator;

$g = new GoogleAuthenticator();

// 16 chars
$secret = 'XVQ2UIGO75XRUKJO';

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>2FA</title>
</head>
<body>
<h1>Escaneie o código abaixo com seu app de autenticação, para continuar com o login:</h1>
<img src="<?php echo $g->getUrl('acmecalcados','testetotp.herokuapp.com', $secret) ?>" alt="">
<p>Já escaneou? Legal! agora é só <a href="/pages/autenticacao.php">proseguir para a autenticação.</a></p>

</body>
</html>