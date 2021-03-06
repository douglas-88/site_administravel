<?php

authorization();

$db = connection();

if(resolve("/admin/users[/]?")){

    $search = filter_input(INPUT_GET,"s",FILTER_SANITIZE_STRING);

    // Dados para Paginação:
    $itens_por_pagina = 6;
    $max_links        = 2;
    $total_registros  = count(get_users_all($db,$search));
    $paginator        = paginator($total_registros,$itens_por_pagina,$max_links);

    $users = get_users_all($db,$search,$itens_por_pagina);

    render("admin/users/list","admin/master",["users" => $users,"paginator" => $paginator]);

}elseif($id = resolve("/admin/users/(\d+)[/]?")){

    $user = get_user($db,$id[1]);
    if(!is_empty_object($user)){
        render("admin/users/view","admin/master",["user" => $user]);
    }else{
        flash_messages("Usuário não encontrado.","error");
        return header("Location:/admin/users");
    }

}elseif(resolve("/admin/users/create")){

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(create_user($db)){
            flash_messages("Usuário criado com successo","success");
            return header("Location:/admin/users");
        }
    }
    render("admin/users/create","admin/master");

}elseif($id = resolve("/admin/users/(\d+)/edit")){

    if($_SERVER["REQUEST_METHOD"] === "POST"){
       if(update_user($db,$id[1])){
           flash_messages("Usuário atualizado com sucesso", "success");
           return header("location:/admin/users");
       }
        flash_messages("Falha ao editar Usuário, tente novamente.", "error");
        return header("/admin/users/(\d+)/edit");
    }

    $user = get_user($db,$id[1]);
    if(!is_empty_object($user)){
        return render("admin/users/edit","admin/master",["user" => $user]);
    }else{
        flash_messages("Usuário não encontrado.","error");
        return header("Location:/admin/users");
    }

}elseif($id = resolve("/admin/users/(\d+)/delete")){

    if(delete_user($db,$id[1])){
        flash_messages("Usuário excluído com sucesso","success");
        return header("Location:/admin/users");
    }else{
        flash_messages("Não foi possível excluir o usuário.","error");
        return header("Location:/admin/users");
    }

}