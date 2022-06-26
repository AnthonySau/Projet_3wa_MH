<?php

namespace MonsterHunterBlog;

abstract class Manager
{
    protected \PDO $connection;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $dbConfig = require './config/database.php';

        $db = new \PDO(
            "mysql:host=" . $dbConfig['host'] . ";port=" . $dbConfig['port'] . ";dbname=" . $dbConfig['dbname'],
            $dbConfig['username'],
            $dbConfig['password']
        );

        //Gestion des erreurs à la base de donnée.
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        //Mode de récupération -> Tableau associatif.
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        //Evite le problème de convertion d'arguments des requètes 'prepare' et 'execute'.
        $db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, FALSE);
        $db->exec('SET NAMES utf8');
        $this->connection = $db;
    }
}
