<?php

if(resolve("/admin")){
    render_admin("home");
}elseif (resolve("/admin/login")){
    render_admin("login");
}else{
    http_response_code(404);
    echo("Página não encontrada");
}
