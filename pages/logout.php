<?php

session_start();

if(!$_SESSION['userExists'])
    header("location: ".$_SERVER['HTTP_ORIGIN'] . '');

session_destroy();