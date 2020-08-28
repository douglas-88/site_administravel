<?php

authorization();

if (resolve("/admin/pages[/]?")) { //Exibe Listagem de páginas existentes.(GET)

    $search = filter_input(INPUT_GET,"s",FILTER_SANITIZE_STRING);

    //Dados para a paginação:
    $total_de_registros = count(get_pages_all($db,$search));
    $itens_por_pagina = 3;
    $maximo_de_links  = 1;
    $paginator = paginator($total_de_registros,$itens_por_pagina,$maximo_de_links);

    $pages = get_pages_all($db,$search,$itens_por_pagina);
    render("admin/pages/list","admin/master",["pages" => $pages,"paginator" => $paginator]);

} elseif (resolve("/admin/pages/create")) { //Exibe formulário de criação de página.(GET)

    if($_SERVER["REQUEST_METHOD"] === "POST"){

       if(create_page($db)) {
           flash_messages("Página criada com sucesso", "success");
           return header("location:/admin/pages");
       }

        flash_messages("Falha ao criar a nova Página, tente novamente.", "error");
        return header("/admin/pages/create");

    }

    render("admin/pages/create","admin/master");

} elseif ($id = resolve("/admin/pages/(\d+)/edit")) { //Exibe o formulário de edição de uma página em especifico (GET)


    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(update_page($db,$id[1])){
            flash_messages("Página atualizada com sucesso", "success");
            return header("location:/admin/pages");
        }
            flash_messages("Falha ao editar a Página, tente novamente.", "error");
            return header("/admin/pages/(\d+)/edit");
    }

    $page = get_page($db,$id[1]);
    if(!is_empty_object($page)){
        render("admin/pages/edit","admin/master",["page" => $page]);
    }

} elseif ($id = resolve("/admin/pages/(\d+)")) { //Exibe uma página em especifico (GET)

     $page = get_page($db,$id[1]);
     if(!is_empty_object($page)){
         return render("admin/pages/view","admin/master",["page" => $page]);
     }
    flash_messages("Página com o ID:{$id[1]} não encontrada.", "error");
    return header("location:/admin/pages");

} elseif ($id = resolve("/admin/pages/(\d+)/delete")) { //Deleta uma página em especifico (POST)

    if(delete_page($db,$id[1])){
        flash_messages("Página com o ID:{$id[1]} removida com sucesso", "success");
        return header("location:/admin/pages");
    }

    flash_messages("Não foi possível remover a página.", "error");
    return header("location:/admin/pages");
}else{
    http_response_code(404);
    require dirname(__FILE__,4) . "/views/404.tpl.php";
}


