<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            text-align: center;
            background-color: crimson;
            color: white;
        }
        .texto{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 30%;
            height: 35%;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
        }
        input{
            width: 50%;
            padding: 10px;
        }
        .sub{
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
            background-color: black;
            color: white;
            width: 50%;
        }
        .sub:hover{
            background-color: dodgerblue;
        }

        @media screen and (max-width: 640px) {
        body{
            text-align: center;
            background-color: crimson;
            color: white;
        }
        .texto{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 80%;
            height: 300px;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
        }
        input{
            width: 80%;
            padding: 10px;
        }
        .sub{
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
            background-color: black;
            color: white;
            width: 50%;
        }
        .sub:hover{
            background-color: dodgerblue;
        }
        }

    </style>
</head>
<body>
    <form action="testLog.php" method="POST">
    <div class="texto">
        <h1>Login</h1>
        <br>
        <input type="text" name="email" placeholder="Email"></input>
        <br><br>
        <input type="password" name="senha" placeholder="Senha"></input>
        <br><br>
        <input class="sub" type="submit" name="submit" value="Logar">
    </div>
    </form>
</body>
</html>