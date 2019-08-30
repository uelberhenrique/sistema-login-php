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
        <div id="corpo-form">
            <h1> Entrar </h1>

            <form method="POST">

                <input type="email" name="email" placeholder="Usuário">
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit" value="Entrar">
                <a href="cadastrar.php">Ainda não é Inscrito? <strong>Cadastre-se!</strong></a>

            </form>
        </div>

        <?php

            if(isset($_POST['email'])){
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);

                if (!empty($email) && !empty($senha)) {
                    
                    $users -> conectar("projeto_login", "localhost", "root", "");

                    if($users -> msgErro == ""){

                        if ($users -> logar($email, $senha)) {
                            
                            header("location: areaPrivada.php");

                        } else {

                            ?>
                            <div class="msg-erro">
                                Email e/ou senha estão incorretos!
                            </div>
                            <?php
                        }
                    }else{
                        
                        ?>

                        <div class="msg-erro">
                            <?php 
                                echo "Erro: ".$users -> msgErro;
                            ?>

                        </div>

                        <?php
                    }

                } else {

                    ?>

                    <div class="msg-erro">
                        Preencha todos os campos!
                    </div>
                    
                   <?php
                }
                
            }
            
        ?>
    </body>

</html>