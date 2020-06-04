<?php

/**
 * @author Douglas Fernando <*******@gmail.com>
 * @since 1.0
 * Função Auxiliar que verifica se a
 * URI que o usuário tenta acessar está especificada
 * no lista de rotas;
 * @param string $route
 *
 */
function resolve(string $route){

    $path = $_SERVER["PATH_INFO"] ?? "/";

    $rule = "/^". str_replace("/","\/",$route) ."$/";

    $match = preg_match($rule,$path,$param);
    return ($match) ? $param : false;

}
