<?php

echo "<pre>";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Class\User\Usuario;
use Class\Database\Conexao;
use Class\Session\Login;

require_once('class/database/conexao.php');
require_once('class/session/login.php');

if($_POST){

    if (isset($_POST['email']) == true && isset($_POST['senha']) == true) {

        $email = isset($_POST['email']);
        $senha = isset($_POST['senha']);

        if(empty($email) == false && empty($senha) == false){

            $L =  new Login();

            $L->setEmail($email);
            $L->setSenha($senha);

            $login = $L->verificaLogin($L->getEmail(), $L->getSenha());

            if($login == 1){
                header("Location: home.php");
            }else{
                header("Location: index.php?status_login=falso");
            }
            
        }else{
            header("Location: index.php?status_login=vazio");
        }  

    }
}

?>