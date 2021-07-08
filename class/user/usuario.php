<?php

namespace Class\User;

echo "<pre>";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Class\Database\Conexao;

class Usuario
{
    /**
     * VARIÁVEL RECEBE O ID ÚNICO DO USUÁRIO
     * @access private
     * @var int
     */

    private int $id_usuario;

    /**
     * VARIÁVEL RECEBE O NOME DO USUÁRIO
     * @access private
     * @var string
     */

    private string $nome;

    /**
     * VARIÁVEL RECEBE O EMAIL DE CADASTRO DO USUÁRIO
     * @access private
     * @var string 
     */

    private string $email;

    /**
     * VARIÁVEL RECEBE A SENHA DE LOGIN CADASTRADA PELO USUÁRIO
     * @access private
     * @var string
     */

    private string $senha;

    /**
     * 
     * MÉTODO SETA EMAIL DO USUÁRIO
     * @param string $nome O nome do usuário
     * @return self
     */

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * 
     * MÉTODO SETA EMAIL DO USUÁRIO
     * @param string $email O email do usuário
     * @return self
     */

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * 
     * MÉTODO SETA SENHA DO USUÁRIO
     * @param string $senha A senha do usuário
     * @return self
     */

    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * MÉTODO RETORNA A PROPRIEDADE NOME DO USUÁRIO
     * @return $nome 
     */

    public function getNome()
    {
        return $this->nome;
    }

    /**
     * MÉTODO RETORNA A PROPRIEDADE EMAIL DO USUÁRIO
     * @return $email 
     */

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * MÉTODO RETORNA A PROPRIEDADE SENHA DO USUÁRIO
     * @return $senha 
     */

    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * MÉTODO VERIFICA SE EMAIL DO USUÁRIO JÁ EXISTE NO BANCO
     * @param string $email O email digitado pelo usuário que será procurado no banco por segurança, em busca de duplicidde
     * @return $email_valido
     * 
     */

    public function verificaEmail($email)
    {
        $sql = "SELECT * FROM USUARIO WHERE email = '$email'";

        $retorno = Conexao::leituraDeLinhas($sql);

        if ($retorno == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verificaSenha($senha_um, $senha_dois)
    {
        if ($senha_um == $senha_dois) {
            return true;
        } else {
            return false;
        }
    }

}
