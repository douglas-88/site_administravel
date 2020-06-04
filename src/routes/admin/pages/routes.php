<?php


if (resolve("/admin/pages")) { //Exibe Listagem de páginas existentes.(GET)
       get_pages_all($db);
    render("admin/pages/list","admin/master");
} elseif (resolve("/admin/pages/create")) { //Exibe formulário de criação de página.(GET)
    if($_SERVER["REQUEST_METHOD"] === "POST"){
       create_page($db);
       flash_messages("Página criada com sucesso", "success");
       return header("location:/admin/pages");
    }
    render("admin/pages/create","admin/master");
} elseif (resolve("/admin/pages/(\d+)/edit")) { //Exibe o formulário de edição de uma página em especifico (GET)
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        update_page($db);
    }
    render("/pages/edit","admin/master");
} elseif (resolve("/admin/pages/(\d+)")) { //Exibe uma página em especifico (GET)
        get_page($db,1);
     render("/pages/view","admin/master");
} elseif (resolve("/admin/pages/(\d+)/delete")) { //Deleta uma página em especifico (POST)
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        delete_page($db);
    }
    render("/pages/delete","admin/master");
}

