<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '');

include_once __DIR__."/../vendor/autoload.php";

use Google\Authenticator\GoogleAuthenticator;
use Source\Class\RandomString;

$g = new GoogleAuthenticator();

$rs = new RandomString();
$secret = $rs->generate();

$_SESSION['seckey'] = $secret;

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