<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '');

include_once __DIR__."/../vendor/autoload.php";

use Google\Authenticator\GoogleAuthenticator;

$g = new GoogleAuthenticator();

//$secret = 'XVQ2UIGO75XRUKJO';

if(isset($_POST['token']) && isset($_POST['seckey'])){
    $token = $_POST["token"];
    $secret = $_POST["seckey"];

    if($g->checkCode($secret,$token)){
        header("location: ".$_SERVER['HTTP_ORIGIN'] . "/pages/inicial.php");
    }else{
        header("location: ".$_SERVER['HTTP_ORIGIN'] . "?m=".base64_encode("Token inválido ou expirado!"));
    }
    die();
}

?>