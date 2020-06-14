<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função responsável por armazenar e exibir mensagens de
 * notificação dentro do sistema.
 *
 * @param string|null $message
 * @param string|null $type
 */
function flash_messages(string $message = null,string $type = null){

    if($message){
        $_SESSION["flash"][] = compact("message","type");
    }else{

        if(!empty($_SESSION["flash"])){
            $flash = $_SESSION["flash"];
            foreach ($flash as $key => $value){
                render("flash","ajax",$value);
                unset($_SESSION["flash"][$key]);
            }
        }

    }

}
