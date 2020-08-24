<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Descrição: Função responsável por remover as entidades HTML
 * de uma String, e limitar a exibição do texto do conteúdo na view.
 *
 * @param string $str
 * @param int $limit_chars
 *
 * @return string A String sem as entidades HTML e/ou com tamanho de 40
 * caracteres + " ... ".
 *
 *
 */
function content_limit(string $str,int $limit_chars):string{


    $str  = strip_tags(html_entity_decode($str));
    $str  = trim($str);

    if (strlen($str) > $limit_chars) {
        $str  = substr($str,0,$limit_chars);
        $str .= " ... ";
    }

    return $str;
}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Descrição: Função responsável detectar é um objeto vazio.
 *
 * @param stdClass $object
 *
 * @return bool Retorna TRUE caso seja um objeto vazio, ou FALSE
 * caso seja um objeto preenchido.
 *
 */
function is_empty_object(stdClass $object):bool{

    foreach ($object as $key => $value) {
       return false;
    }

    return true;
}
