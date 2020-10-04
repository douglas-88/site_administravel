<?php

require __DIR__ ."/../bootstrap.php";

/** SITE: */
if(resolve("/(?!admin)(.*)")){
    require __DIR__ . "/../src/routes/site/routes.php";
/** ÁREA ADMINISTRATIVA: */
}elseif (resolve("/admin/?(.*)")){
    require __DIR__ . "/../src/routes/admin/routes.php";
}else{
    http_response_code(404);
    require __DIR__ . "/../../views/404.tpl.php";
}