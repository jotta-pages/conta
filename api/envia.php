<?php
include('conexao.php');

     //checar conexão
    
    if(!$mysqli){
        echo"não foi possivel se conectar ao banco";
    } else {
        echo"conectado com sucesso ao banco....";
    }

    //checando se email ja existe
    $email = ($_POST['email']);
    $email = mysqli_real_escape_string($mysqli, $email);
    $sql = "SELECT email FROM login.usuarios WHERE email='$email'";
    $retorno = mysqli_query($mysqli,$sql);

    if(mysqli_num_rows($retorno)>0){
        echo"email ja cadastrado!<br>";
        echo"tente colocar outro email";

    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];

        $sql = "INSERT INTO login.usuarios(email,senha,nome) values('$email', '$senha', '$nome')";
        $resultado = mysqli_query($mysqli, $sql);
        echo"....CADASTRO REALIZADO COM SUCESSO, SEJA BEM VINDO $nome";

        
    }
    error_reporting(E_ALL);
ini_set('display_errors', '1');


?>
<br>
<a href="acessar-conta.html">
<button>FAZER LOGIN</button>
</a>
