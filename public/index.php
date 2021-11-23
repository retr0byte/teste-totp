
<?php
isset($_SESSION) ? session_destroy() : null;

if(isset($_GET['m'])){
    echo "<script>
            alert(`".base64_decode($_GET['m'])."`)
            location.replace(`/public`)
        </script>";
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReCAPTCHA</title>

    <style>
        body{
            overflow-x: hidden;
        }

        div.fake-login{
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
            padding: 20px;
        }

        div.formContent{
            border-radius: 10px 10px 10px 10px;
            background: #fff;
            padding: 30px;
            width: 90%;
            max-width: 450px;
            position: relative;
            box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            text-align: center;
        }

        div#fake-login-logo img{
            width: 150px;
        }

        div#login-status-message{
            padding: 20px;
        }

        .success{
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            margin: 10px 0;
        }

        .error{
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            margin: 10px 0;
        }

        #formCAPTCHA button{
            background-color: #56baed;
            border: none;
            color: white;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
            border-radius: 5px 5px 5px 5px;
            margin: 5px 20px 40px 20px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        #formCAPTCHA input[type=text],
        #formCAPTCHA input[type=password] {
            background-color: #f6f6f6;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            width: 85%;
            border: 2px solid #f6f6f6;
            transition: all 0.5s ease-in-out;
            border-radius: 5px 5px 5px 5px;
        }
    </style>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function testeCAPTCHA (token){
            document.getElementById('formCAPTCHA').submit()
        }

    </script>
</head>
<body>

<div class="fake-login">
    <div class="formContent">
        <div id="fake-login-logo"><img src="/images/logo.png" alt=""></div>
        <div id="login-status-message"></div>
        <form action="/services/checkCAPTCHA.php" method="post" id="formCAPTCHA">
            <input type="text" name="username" id="username" placeholder="Usuário: ">
            <input type="password" name="passwd" id="passwd" placeholder="Senha: ">
            <input type="hidden" name="form-captcha-submit">

            <button class="g-recaptcha" data-sitekey="6LeA3SodAAAAAAIi5OjtLy5PrBVbvnf275L-tguu" data-callback='testeCAPTCHA'>Acessar</button>
        </form>
    </div>
</div>

</body>
</html>
