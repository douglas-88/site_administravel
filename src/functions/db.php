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

    $query = "INSERT INTO pages(title,url,content,user_id,created,updated) VALUES(:title,:url,:content,17,now(),now())";
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
function update_page(PDO $db,int $id,array $data = null):bool{

    if(empty($data)){
        $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
    }else{
        $data = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);
    }

     $query = "UPDATE pages SET title =:title,url =:url,content =:content,user_id = 17,updated = now() WHERE id =:id";
     $stmt = $db->prepare($query);
     $update_status = $stmt->execute($data);

     return $update_status;
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

    $query = "DELETE FROM pages WHERE id =:id";
    $stmt = $db->prepare($query);
    $delete_status = $stmt->execute(["id" => $id]);

    return $delete_status;
}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para obter todas as Páginas do Banco de dados.
 *
 * @return array Retorna um array com todas as páginas.
 */
function get_pages_all(PDO $db,string $s = null,int $qtd_por_pagina = null,array $data = null):array{

       $where = !empty($s) ? "WHERE title LIKE :title OR content LIKE :content " : "";
       $limit = !empty($qtd_por_pagina) ? " LIMIT :inicio,:maximo " : "";

       $sql = "SELECT * FROM pages {$where} {$limit}";
       $stmt = $db->prepare($sql);

    if(!empty($where)){
       $stmt->bindValue(":title","%".$s."%",PDO::PARAM_STR);
       $stmt->bindValue(":content","%".$s."%",PDO::PARAM_STR);
    }
    if(!empty($limit)){
       $pagina = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRIPPED) ?? 1;
       $inicio = ($qtd_por_pagina * $pagina) - $qtd_por_pagina;
       $stmt->bindValue(":inicio",$inicio,PDO::PARAM_INT);
       $stmt->bindValue(":maximo",$qtd_por_pagina,PDO::PARAM_INT);
    }

       $stmt->execute();
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



