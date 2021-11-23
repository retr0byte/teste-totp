<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . "?m=".base64_encode("Logout realizado com sucesso!"));
