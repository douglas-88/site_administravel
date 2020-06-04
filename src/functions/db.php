<?php

declare(strict_types=1);

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para Criação de Páginas.
 *
 * @return bool
 */
function create_page(PDO $db){


    $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);




}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para edição de Páginas.
 *
 * @return bool
 */
function update_page(PDO $db,int $id):bool{


    $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);


    exit;

}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para exclusão de Páginas.
 *
 * @return bool
 */
function delete_page(PDO $db,int $id):bool{


    $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);


    exit;

}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para obter todas as Páginas do Banco de dados.
 *
 * @return bool
 */
function get_pages_all(PDO $db){


    $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);


}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para obter uma Página em especifico,no Banco de dados.
 *
 * @return bool
 */
function get_page(PDO $db,int $id){


    $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);


}



