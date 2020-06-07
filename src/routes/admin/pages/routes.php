<?php


if (resolve("/admin/pages")) { //Exibe Listagem de páginas existentes.(GET)
       $pages = get_pages_all($db);
    render("admin/pages/list","admin/master",$pages);
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

} elseif (resolve("/admin/pages/(\d+)/edit")) { //Exibe o formulário de edição de uma página em especifico (GET)
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        update_page($db);
    }
    render("/pages/edit","admin/master");
} elseif ($id = resolve("/admin/pages/(\d+)")) { //Exibe uma página em especifico (GET)
     $page = get_page($db,$id[1]);
     if(!is_empty_object($page)){
         return render("admin/pages/view","admin/master",["page" => $page]);
     }
    flash_messages("Página com o id:{$id[1]} não encontrada.", "error");
    return header("location:/admin/pages");

} elseif (resolve("/admin/pages/(\d+)/delete")) { //Deleta uma página em especifico (POST)
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        delete_page($db);
    }
    render("/pages/delete","admin/master");
}

