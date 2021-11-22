<?php

include_once "vendor/autoload.php";

use Google\Authenticator\GoogleAuthenticator;

$g = new GoogleAuthenticator();

$secret = 'XVQ2UIGO75XRUKJO';

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google Auth Teste</title>
</head>
<body>
	<h1>Autentique-se</h1>
    <img src="<?php echo $g->getUrl('acmecalcados','testetotp.herokuapp.com', $secret) ?>" alt="">
</body>
</html>
