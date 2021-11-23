<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '');

include_once __DIR__."/../vendor/autoload.php";

use Google\Authenticator\GoogleAuthenticator;

$g = new GoogleAuthenticator();

$secret = 'XVQ2UIGO75XRUKJO';

if(isset($_POST['token'])){
    $token = $_POST["token"];

    if($g->checkCode($secret,$token)){
        header("location: ".$_SERVER['HTTP_ORIGIN'] . "/pages/inicial.php");
    }else{
        header("location: ".$_SERVER['HTTP_ORIGIN'] . "?m=".base64_encode("Token inválido ou expirado!"));
    }
    die();
}

?>