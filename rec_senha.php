<?php
    include("conexao.php");
    if (isset($_POST['ok'])){
        $email = $mysqli->escape_string($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error[] = "E-mail inválido.";
        }
        if(count($erro) == 0){
        $novasenha = substr(md5(time()), 0, 6);
        $nscriptografada = md5(md5($novasenha));    
            if(mail($email, "Sua nova senha", "Sua nova senha: ".$novasenha)){
                $sql_code = "UPDATE usuario SET senha = '$nscriptografada' WHERE email = '$email'";
                $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
            }
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="">
           <label for="email">Email</label>
           <input type="text" placeholder="email"name="email" id="email"><br><br>
           <button value="ok">Enviar</button>  
        </form>   
    </body>
</html>