<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para Autenticar Usuários.
 *
 * @return stdClass Retorna uma string contendo os erros de
 * autenticação , ou se autenticado com sucesso.
 */
function auth(PDO $db,string $email,string $password):string{

    $sql = "SELECT * FROM users WHERE email =:email";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email",$email);
    $select_status = $stmt->execute();
    $user = $stmt->fetch();

    if($stmt->rowCount() == 0){
        return "Não localizamos usuário com o email:{$email}";
    }
    if(!password_verify($password,$user->password)) {
        return "A senha informada é não confere.";
    }

    $_SESSION['auth'] = [
        'user_id'   => $user->id,
        'user_name' => $user->name,
        'logged'    => true
    ];

    return 'autenticado';
}

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para desfazer a seção do usuário.
 *
 * @return void
 */
function lougout():void{
    if (!empty($_SESSION['auth'])) {
        unset($_SESSION['auth']);
        flash_messages("Você saiu da àrea administrativa.","warning");
        header('Location:/admin/login');
        exit;
    }
}
/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função para checar se há Usuários autenticado.
 * O objetivo dessa função é para que caso o usuário
 * tente acessar uma àrea restrita, ele seja redirecionado
 * para a tela de login.
 *
 * @return void
 */
function authorization():void {

    if(empty($_SESSION['auth']['logged'])) {
        flash_messages("Para acessar àrea restrita, favor faça login primeiro.","warning");
        header('Location:/admin/login');
        exit;
    }

}
