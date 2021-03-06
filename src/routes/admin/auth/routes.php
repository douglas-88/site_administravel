<?php

$db = connection();

if (resolve("/admin/login[/]?")) {

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
        $auth = auth($db,$data["email"],$data["password"]);

        if($auth === 'autenticado') {
            header('Location:/admin');
            return;
        }else{
            flash_messages($auth,"error");
        }
    }
    render("admin/auth/login","admin/auth/master");

} elseif (resolve("/admin/login/register")) {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(create_user($db)){
                flash_messages("Usuário criado com successo, efetue o seu Login.","success");
                return header("Location:/admin/login");
            }
        }
    render("admin/auth/register","admin/auth/master",['title' => 'Site Administrável - Cadastro']);

}elseif (resolve("/admin/login/password")) {

    render("admin/auth/password","admin/auth/master");

}elseif (resolve("/admin/login/logout")) {
   lougout();
}else{
    http_response_code(404);
    require dirname(__FILE__,4) . "/views/404.tpl.php";
}


