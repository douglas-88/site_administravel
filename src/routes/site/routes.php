<?php

if(resolve("/")){
   render_site("home");
}elseif (resolve("/contato")){
    render_site("contato");
}else{
    http_response_code(404);
    echo("Página não encontrada");
}