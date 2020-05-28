<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função responsável por manipular erros na aplicação.
 *
 * @param $errno
 * @param $errstr
 * @param $errfile
 * @param $errline
 */
function error_handler($errno,$errstr,$errfile,$errline){

    http_response_code(500);
    $erros = [
        "E_ERROR"             => 1,
        "E_WARNING "          => 2,
        "E_PARSE"             => 4,
        "E_NOTICE"            => 8,
        "E_CORE_ERROR"        => 16,
        "E_CORE_WARNING"      => 32,
        "E_COMPILE_ERROR"     => 64,
        "E_COMPILE_WARNING"   => 128,
        "E_USER_ERROR"        => 256,
        "E_USER_WARNING"      => 512,
        "E_USER_NOTICE"       => 1024,
        "E_STRICT"            => 2048,
        "E_RECOVERABLE_ERROR" => 4096,
        "E_DEPRECATED"        => 8192,
        "E_USER_DEPRECATED"   => 16384,
        "E_ALL"               => 32767,
    ];
    $message = "<div class=\"alert alert-danger\">\n";
        $message .= "<h4 class=\"alert-heading font-weight-bold\">".array_search($errno,$erros)."</h4>\n";
        $message .= "<p><strong>Linha:</strong> $errline</p>";
        $message .= "<p><strong>Arquivo:</strong> $errfile</p>\n";
        $message .= "<hr>";
        $message .= "<p class=\"mb-0\"><strong>Mensagem:</strong> $errstr</p>\n";
    $message .= "</div>\n\n";
    echo $message;

    error_reporting(E_ALL);
    ini_set( 'log_errors', true );
    ini_set( 'error_log', __DIR__. "/../../erros.txt" );
    error_log($message,3,__DIR__. "/../../erros.txt");
    exit;

};

set_error_handler("error_handler");
set_exception_handler("error_handler");