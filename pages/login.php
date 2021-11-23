
<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '');

include_once __DIR__."/../vendor/autoload.php";

use Google\Authenticator\GoogleAuthenticator;

$g = new GoogleAuthenticator();

$secret = 'XVQ2UIGO75XRUKJO';

?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login ACME</title>
</head>
<body>
<h1>Autentique-se</h1>
<img src="<?php echo $g->getUrl('acmecalcados','testetotp.herokuapp.com', $secret) ?>" alt="">
</body>
</html>