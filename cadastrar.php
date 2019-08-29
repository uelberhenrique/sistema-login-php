<?php
    
    require_once 'classes/usuarios.php';
    $users = new Usuario;

?>


<html lang="PT-BR">

    <head>
        <meta charset="UTF-8"/>
        <title> Projeto Login </title>
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body>
        <div id="corpo-form-cad">
            <h1> Cadastrar </h1>

            <form method="POST" >

                <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
                <input type="telefone" name="telefone" placeholder="Telefone" maxlength="30">
                <input type="email" name="email" placeholder="E-mail" maxlength="40">
                <input type="password" name="senha" placeholder="Senha" maxlength="15"> 
                <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

<?php

    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);
    
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){

        $users -> conectar("projeto_login", "localhost", "root", ""); //Banco de Dados MYSQL com xampp

        if($users -> msgErro == ""){

            if($senha == $confirmarSenha){

                if($users -> cadastrar($nome, $telefone, $email, $senha)){

                    echo "Cadastrado com Sucesso! Acesse para entrar";

                }else {

                    echo "Email já cadastrado!";
                }
                
            }else {

                Echo "Senha e Confirma Senha não correspondem!";
            }

        }else {

            echo "Erro: ".$users -> msgErro;

        }

    }else {

        Echo "Preencha todos os campos!";
    }
}
?>
    </body>

</html>