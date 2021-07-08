<?php

namespace Class\Database;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PDO;
use PDOException;

class Conexao
{

    /**
     * HOST DO SERVIDOR DO BANCO DE DADOS
     * @var string 
     * @access private
     */

    private string $host;

    /**
     * NOME DO BANCO DE DADOS QUE SERÁ ACESSADO NO SERVIDOR
     * @var string
     * @access private
     */

    private string $db_nome;

    /**
     * NOME DE USUÁRIO DA CONTA QUE IRÁ LOGAR NO SERVIDOR
     * @var string
     * @access private
     */

    private string $usuario_banco;

    /**
     * SENHA DA CONTA QUE IRÁ LOGAR NO SERVIDOR 
     * @var string
     * @access private
     */

    private string $senha;

    /**
     * PROPRIEDADE RECEBE O OBJETO DE CONEXÃO COM O BANCO DE DADOS
     * @var string;
     */

    public string $conexao;

    /**
     * MÉTODO SETA HOST DO SERVIDOR DO BANCO
     * 
     */

    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * MÉTODO SETA NOME DO BANCO QUE SERÁ ACESSADO NO SERVIDOR
     * 
     */

    public function setDbName($db_nome)
    {
        $this->db_nome = $db_nome;
        return $this;
    }

    /**
     * MÉTODO SETA USUÁRIO QUE IRÁ LOGAR NO SERVIDOR
     * 
     */

    public function setUsuarioBanco($root)
    {
        $this->usuario_banco = $root;
        return $this;
    }

    /**
     * MÉTODO SETA SENHA DO USUÁRIO QUE IRÁ LOGAR NO SERVIDOR
     * 
     */

    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }

    public function setConexao($conexao){
        $this->conexao = $conexao;
        return $this;
    }

    public function __construct()
    {

        $this->setHost("localhost:80");
        $this->setDbName("APLICACAO_TESTE");
        $this->setUsuarioBanco("root");
        $this->setSenha("16814532");

    }

    /**
     * MÉTODO REALIZA CONEXÃO COM O BANCO DE DADOS ATRAVÉS DA INTERFACE PDO
     * @return $conexao O objeto de conexão com o banco de dados
     * 
     */

    public static function conecta()
    {

        $c = new Conexao();
        $host = $c->host;
        $db_nome = $c->db_nome;
        $usuario_banco = $c->usuario_banco;
        $senha = $c->senha;

        try {

            $host = 'mysql:host=' . $host . 'dbname=' . $db_nome . ';';

            $conexao = new PDO("mysql:host=localhost;dbname=APLICACAO_TESTE", 'root', '16814532');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexao;

        } catch (PDOException $erro) {

            echo "Não foi possível se conectar ao BD. " . $erro->getMessage();
            throw new PDOException($erro);
        }
    }

    /**
     * MÉTODO REALIZA UMA LEITURA NO BANCO DE DADOS
     * @return $retonor O array retornado pela consulta ao banco de dados
     * 
     */

    public static function leitura ($sql)
    {

       $conexao = self::conecta();
       $consulta = $conexao->query($sql);
       $retorno = $consulta->fetchAll();

       return $retorno;

    }

    /**
     * MÉTODO REALIZA UMA LEITURA DE LINHAS AFETADAS COM CONSULTA NO BANCO DE DADOS
     * @return $retonor O array retornado pela consulta ao banco de dados
     * 
     */

    public static function leituraDeLinhas(string $sql)
    {
        $conexao = self::conecta();
        $consulta = $conexao->query($sql);
        $retorno = $consulta->fetchAll();

        return count($retorno);
    }

    /**
     * MÉTODO REALIZA UMA INSERÇÃO NO BANCO DE DADOS
     * @return $retorno O array retornado pela consulta ao banco de dados
     * 
     */

    public static function insere ($sql)
    {
        $conexao = self::conecta();
         
        $consulta = $conexao->query($sql);
        $retorno = $consulta->fetchAll();
        return $retorno;
    }

}





