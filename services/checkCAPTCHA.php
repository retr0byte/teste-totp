<?php

include_once __DIR__."/../vendor/autoload.php";

use Source\Class\PostgreSqlCRUD;

session_start();

if(isset($_POST['form-captcha-submit'])) {
    @$username = $_POST['username'];
    @$password = $_POST['passwd'];

    $captchaSecretKey = '6LeA3SodAAAAAMX6UToI9Cwor7bwsjKJdhFQ960V';
    $captchaResponseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret={$captchaSecretKey}&response={$captchaResponseKey}&remoteip={$userIP}";
    $response = file_get_contents($url);
    $response = json_decode($response);

    if ($response->success) {
        $psqlCRUD = new PostgreSqlCRUD();
        $verificaUsuario = $psqlCRUD->selectFromDB(['*'],'usuarios','WHERE nm_usuario = ? AND ds_senhausuario = ?',[$username, $password]);
        $usuario = $verificaUsuario->fetchAll(PDO::FETCH_ASSOC);



        if(count($usuario) === 1){
            $_SESSION['userExists'] = true;

            $url = $_SERVER['HTTP_ORIGIN'] . "/pages/2FA.php";
            header("location:$url");
        }
    }else{
        header("location: ".$_SERVER['HTTP_ORIGIN'] . "?m=".base64_encode("Usuário não encontrado!"));
    }

}
