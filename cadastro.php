<?php

echo "<pre>";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Class\User\Usuario;
use Class\Database\Conexao;

if ($_POST) {

    function verificaPost()
    {

        $chaves = array('nome', 'email', 'senha', 'senhaConfirmada');
        $count = 0;

        foreach ($chaves as $chave) {

            if (isset($_POST[$chave]) == true && empty($_POST[$chave]) == false) {
                $count++;
            }
        }

        if ($count == 4) {
            return true;
        } else {
            return false;
        }
    }

    if (verificaPost() == true) 
    {
        //Instanciando objeto de usuário
        $usuario = new Usuario();

        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $senha_confirmada = filter_input(INPUT_POST, 'senhaConfirmada');

        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        if($usuario->verificaEmail($usuario->getEmail()) == true){
            
            if($usuario->verificaSenha($usuario->getSenha(), $senha_confirmada) == true){

                $campos = "nome, email, senha";
                $valores = "'".$usuario->getNome()."','".$usuario->getEmail()."','".$usuario->getSenha()."'";

                $sql = "INSERT INTO USUARIO ($campos) VALUES ($valores)";

                Conexao::insere($sql);

                header("Location: index.php?status=cadastrado");
                exit();

            }else{

                header("Location: index.php?status=match_senha_falso");
                exit();

            }

        }else{
            header("Location: index.php?status=email_existe");
            exit();
        }
    }else{
        header("Location: index.php?status=vazio");
    }
}

