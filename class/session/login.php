<?php

namespace Class\Session;

use Class\Database\Conexao;

class Login
{

    /**
     * RECEBE O EMAIL DE LOGIN DO USUÁRIO
     * @var string 
     */

    public string $email;

    /**
     * RECEBE A SENHA DE LOGIN DO USUÁRIO
     * @var string;
     */

    public string $senha;

    /**
     * SETA O VALOR DA PROPRIEDADE EMAIL
     * @param $email O email do usuário
     */

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * SETA O VALOR DA PROPRIEDADE EMAIL
     * @param $senha A senha do usuário
     */

    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * RETORNA O VALOR DA PROPRIEDADE EMAIL
     * 
     */

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * SETA O VALOR DA PROPRIEDADE SENHA
     *
     */

    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * MÉTODO VERIFICA SE CREDENCIAS DIGITADAS PELO USUÁRIO EXISTEM NO BANCO
     * @param $email O email digitado pelo usuário
     * @param $senha A senha digitada pelo usuário
     * @return boolean 
     */

    public static function verificaLogin ($email, $senha){

        $sql = "SELECT * FROM USUARIO WHERE email = '$email' AND senha = '$senha'";
        $linhasAfetadas = Conexao::leituraDeLinhas($sql);

        return $linhasAfetadas;
    }


}
