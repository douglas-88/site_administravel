<?php

if(resolve("/")){
   render("home","site/master");
}elseif (resolve("/contato")){
    render("contato","site/master");
}else{
    http_response_code(404);
    require __DIR__ . "/../../views/404.tpl.php";
}