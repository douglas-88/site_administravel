<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função Auxiliar para conexão ao Banco de Dados.
 *
 * @param array $config
 * @return PDO
 */
function connection():PDO
{

    $file = __DIR__ . "/../../config.ini";

    $config = parse_ini_file($file,true);

    extract($config["database"]);

    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    return new PDO("mysql:host=".$host.";dbname=".$dbname,$username,$password,$options);
}

$db = connection();