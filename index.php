<?php
session_start();
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>   
        <form action="login_aluno.php" method="POST">
        <h1>Inyouuniverse</h1><br><br>
        <?php
            if(isset($_SESSION['not_auth'])):
        ?>
        <div class="notificacao">
            <p>Usuario ou Senha Incorretos!</p>
        </div>
        <?php
            endif;
            unset($_SESSION['not_auth']);
        ?>
            <div class="input1">
                <label for="usuario">Login</label>
                <input type="text" id="usuario" name="usuario" placeholder="Insira seu usuario" require><br><br>
                <label for="Senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Insira sua senha" require><br><br>
                <button>Entrar</button><br><br>
                <button>Esqueci a senha</button>
            </div>
        </form>      
    </body>
</html>