<?php
    session_start();
    include('conexao.php');
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: index_aluno.php');
    }

    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        
    $query = "select usuario_id, usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

    $result = mysqli_query($conexao, $query);

    $row = mysqli_num_rows($result);

    if($row == 1){
        $_SESSION['usuario'] = $usuario;
        header('Location: painel_aluno.php');
        exit();
    }else{
        $_SESSION['not_auth'] = true;
        header('Location: index_aluno.php');
        exit();
    }
    if(isset($_SESSION['usuario'])){
        header('Location: painel_aluno.php');
    }
?>
