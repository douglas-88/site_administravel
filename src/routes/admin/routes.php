<?php

if(resolve("/admin[/]?")){

    render("admin/home","admin/master");

}elseif (resolve("/admin/pages.*")) {

   require __DIR__ . "/pages/routes.php";

}elseif (resolve("/admin/users.*")) {

    require __DIR__ . "/users/routes.php";

}else{

    http_response_code(404);
    require __DIR__ . "/../../views/404.tpl.php";

}
