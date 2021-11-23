<?php

header("location: ".$_SERVER['HTTP_ORIGIN'] . "?m=".base64_encode("Logout realizado com sucesso!"));
