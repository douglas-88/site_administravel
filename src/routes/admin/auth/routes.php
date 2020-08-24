<?php


if (resolve("/admin/login[/]?")) {

    render("admin/auth/login","admin/auth/master");

}else{
    http_response_code(404);
    require dirname(__FILE__,4) . "/views/404.tpl.php";
}


