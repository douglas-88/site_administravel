<?php

if(resolve("/admin")){
    render("home","admin/master");
}elseif (resolve("/admin/pages.*")) {
   require __DIR__ . "/pages/routes.php";
}else{
    http_response_code(404);
    require __DIR__ . "/../../views/404.tpl.php";
}
