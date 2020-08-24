<?php

if(resolve("/")){
   render("site/home","site/master");
}elseif (resolve("/contato")){
    render("site/contato","site/master");
}else{
    http_response_code(404);
    require __DIR__ . "/../../views/404.tpl.php";
}