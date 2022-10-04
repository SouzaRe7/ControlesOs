<?php

namespace Src\model;

use Src\VO\LogErroVO;

// Configurações do site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', ''); //Senha
define('DB', 'db_os'); //Banco
/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, Wladimir M. Barros
 */

class Conexao
{

    /** @var PDO */
    private static $Connect;

    private static function Conectar()
    {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null) :

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new \PDO($dsn, USER, PASS, null);
            endif;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return  self::$Connect;
    }

    public function retornaConexao()
    {
        return  self::Conectar();
    }

    public static function GravarLogErro($vo)
    {
        $arquivo = PATH_URL . 'model/logs/Log_Erro.txt';

        if (!file_exists($arquivo)) :
            $arquivo = fopen($arquivo, 'w');
        else :
            $arquivo = fopen($arquivo, 'a+');
        endif;

        $textoMsg = '--------------------------------------------------------' . PHP_EOL;
        $textoMsg .= 'DATA: ' . $vo->getDataErro() . PHP_EOL;
        $textoMsg .= 'HORA: ' . $vo->getHoraErro() . PHP_EOL;
        $textoMsg .= 'FUNÇÃO: ' . $vo->getFuncaoErro() . PHP_EOL;
        $textoMsg .= 'COD. LOGADO: ' . $vo->getIdLogado() . PHP_EOL;
        $textoMsg .= 'ERRO: ' . $vo->getMsgErro() . PHP_EOL;

        fwrite($arquivo, $textoMsg);
        fclose($arquivo);
    }
}
