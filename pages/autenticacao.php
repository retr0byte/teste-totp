
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
        <input type="hidden" name="seckey" id="seckey" value="">
        <input type="text" name="token" id="" maxlength="6">
        <button type="submit">Autenticar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#seckey').attr('value',localStorage.getItem('seckey'))
    </script>
</body>
</html>
