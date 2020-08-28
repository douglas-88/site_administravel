<?php


declare(strict_types=1);

/**
 * @return bool Retorna TRUE caso o usuário tenha sido cadastrado,
 * ou retorna FALSE, caso o usuário não tenha sido cadastrado.
 * @since 1.0
 *
 * Função para Criação de Usuários.
 *
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 */
function create_user(PDO $db, array $data = null): bool{

    if (empty($data)) {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $data = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    $data["avatar"] = upload_avatar($_FILES);
    $data["password"] = password_hash($data["password"],PASSWORD_BCRYPT,["cost" => 12]);


    $sql = "INSERT INTO users(name,email,password,avatar,created,updated) VALUES(:name,:email,:password,:avatar,now(),now())";
    $stmt = $db->prepare($sql);
    $insert_status = $stmt->execute($data);

    return $insert_status;
}


/**
 * @return array Retorna um array de Objetos caso existam usuários,
 * ou retorna um array vazio, caso não haja usuários cadastrados.
 * @since 1.0
 *
 * Função para Obter os Usuários.
 *
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 */
function get_users_all(PDO $db,string $s = null,int $qtd_por_pagina = null,array $data = null): array{

    $where = !empty($s) ? "WHERE name LIKE :name OR email LIKE :email" : "";

    $sql = "SELECT * FROM users {$where} ";

    if(!empty($qtd_por_pagina)){
        $pagina_atual = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRIPPED) ?? 1;
        $start        = ($qtd_por_pagina * $pagina_atual) - $qtd_por_pagina;
        $sql .= " LIMIT :start,:qtd_por_pagina";

        $stmt = $db->prepare($sql);
        if(!empty($where)){
            $stmt->bindValue(":name",'%'.$s.'%',PDO::PARAM_STR);
            $stmt->bindValue(":email",'%'.$s.'%',PDO::PARAM_STR);
        }
        $stmt->bindValue(":start",$start,PDO::PARAM_INT);
        $stmt->bindValue(":qtd_por_pagina",$qtd_por_pagina,PDO::PARAM_INT);
        $stmt->execute();
    }else{

        $stmt = $db->prepare($sql);
        if(!empty($where)){
            $stmt->bindValue(":name",'%'.$s.'%',PDO::PARAM_STR);
            $stmt->bindValue(":email",'%'.$s.'%',PDO::PARAM_STR);
        }
        $stmt->execute();
    }

    $users = $stmt->fetchAll();

    return (!empty($users)) ? $users : [];
}
/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para Obter os Usuários.
 *
 * @return stdClass Retorna um array de Objetos caso existam usuários,
 * ou retorna um array vazio, caso não haja usuários cadastrados.
 */
function get_user(PDO $db,int $id,array $data = null):stdClass{

    $sql = "SELECT * FROM users WHERE id =:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id",$id);
    $select_status = $stmt->execute();

    if($select_status){
        $user = $stmt->fetch();
        if(!$user){
            $user = new stdClass();
        }
    }

    return $user;
}



/**
 * /**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para edição de Usuários.
 *
 * @param PDO $db
 * @param int $id
 * @param array|null $data
 * @return bool Retorna verdadeiro caso o usuário tenha sido alterado
 * ou falso caso tenha ocorrido uma falha.
 */
function update_user(PDO $db,int $id,array $data = null):bool{

    if(empty($data)){
        $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
    }else{
        $data = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    $user = get_user($db,$id);

    $data["password"] = $user->password;
    $data["id"] = intval($id);

    $query = "UPDATE users SET name =:name,email =:email,password =:password,updated = now() WHERE id =:id";
    $stmt = $db->prepare($query);
    $update_status = $stmt->execute($data);

    return $update_status;
}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Realiza upload do avatar.
 *
 * @return string Retorna o caminho da imagem, caso houver falha
 * no upload, retornará o caminho de uma imagem de avatar padrão.
 */
function upload_avatar(array $file = null):string{

    if(!empty($file["avatar"]["tmp_name"])){

        $src = __DIR__ ."/../../public";
        $name    = uniqid("avatar_", true);
        $extension = pathinfo($file["avatar"]["name"])["extension"];

        $date = getdate();
        $dia     = $date["mday"];
        $mes     = $date["mon"];
        $ano     = $date["year"];
        $dir = "/uploads/".$ano."/".$mes."/".$dia."/";


        if(!file_exists($src.$dir)){
            mkdir($src.$dir,0777,true);
        }

        $upload_status = move_uploaded_file($file["avatar"]["tmp_name"],$src.$dir.$name.".".$extension);


        return ($upload_status) ? $data["avatar"] = $dir.$name.".".$extension : $data["avatar"] = "/img/avatar_default.png";

    }else{
        return $data["avatar"] = "/img/avatar_default.png";
    }

}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Exclui um usuário.
 *
 * @return bool Retorna verdadeiro se excluiu o usuário
 * ou falso , caso não tenha conseguido.
 */
function delete_user(PDO $db,int $id):bool{

    $sql = "DELETE FROM users WHERE id =:id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id",$id);
    $delete_status = $stmt->execute();

    return $delete_status;
}
