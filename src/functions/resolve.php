<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 * Função Auxiliar que verifica se a
 * URI que o usuário tenta acessar está especificada
 * no lista de rotas;
 * @param string $route
 * @return bool
 */
function resolve(string $route):bool{

    $path = $_SERVER["PATH_INFO"] ?? "/";

    $rule = "/^". str_replace("/","\/",$route) ."$/";

    $match = preg_match($rule,$path,$param);
    return ($match) ? true : false;

}
