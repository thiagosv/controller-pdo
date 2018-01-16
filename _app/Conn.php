<?php

/**
 * Conn.class [ CONEXÃO ]
 * Classe abstrata de conexão. Padrão SingleTon.
 * Retorna um objeto PDO pelo método estático getConn();
 * 
 */
namespace ThiagoSV\ControllerPDO;

abstract class Conn {

    private static $Host = 'localhost';
    private static $User = 'root';
    private static $Pass = '';
    private static $Dbsa = 'mysql';

    /** @var PDO */
    private static $Connect = null;

    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto PDO!
     */
    private static function Conectar() {
        try {
            if (self::$Connect == null):
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
                $options = [ \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$Connect = new \PDO($dsn, self::$User, self::$Pass, $options);
            endif;
        } catch (PDOException $e) {
            $mensagem = [
                'mensagem' => "<b>Erro ao consultar:</b> {$e->getCode()}, {$e->getMessage()}, {$e->getFile()}, {$e->getLine()}",
                'classe' => 'error'
            ];
            echo json_encode($mensagem);
            die;
        }

        self::$Connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    /** Retorna um objeto PDO Singleton Pattern. */
    protected static function getConn() {
        return self::Conectar();
    }

}
