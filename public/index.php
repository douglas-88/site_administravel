<?php

require __DIR__ ."/../bootstrap.php";


if(resolve("/(?!admin)(.*)")){
    require __DIR__ . "/../src/routes/site/routes.php";

}elseif (resolve("/admin/?(.*)")){
    require __DIR__ . "/../src/routes/admin/routes.php";

}else{
    http_response_code(404);
    echo("Página não encontrada");
}