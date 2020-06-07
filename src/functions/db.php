<?php

declare(strict_types=1);

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para Criação de Páginas.
 *
 * @return bool Retorna TRUE caso a página tenha sido inserida,
 * ou retorna FALSE, caso a página não tenha sido inserida.
 */
function create_page(PDO $db,array $data = null):bool{

    if(empty($data)){
        $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
    }else{
        $data = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    $query = "INSERT INTO pages(title,url,content,user_id,created,updated) VALUES(:title,:url,:content,1,now(),now())";
    $stmt = $db->prepare($query);
    $insert_status = $stmt->execute($data);
    return $insert_status;
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
 * @return array Retorna um array com todas as páginas.
 */
function get_pages_all(PDO $db):array{

    $stmt = $db->query("SELECT * FROM pages");
    $pages = $stmt->fetchAll();

    return $pages;
}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para obter uma Página em especifico,no Banco de dados.
 *
 * @return bool Retorna um objeto stdClass com o conteúdo da Página, caso
 * não encontre, retorna um objeto stdClass vazio.
 */
function get_page(PDO $db,int $id):stdClass{

    $query = "SELECT * FROM pages WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":id",$id);
    $select_status = $stmt->execute();

    if($select_status){
        $page = $stmt->fetch();
        if(!$page){
            $page = new stdClass();
        }
    }

    return $page;
}



