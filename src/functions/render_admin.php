<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função auxiliar para a rendererização dos templates HTML
 * do Painel Administrativo.
 */
function render_admin(string $content,array $data = null){

    $content    = __DIR__."/../views/admin/".$content.".tpl.php";
    $view_admin = __DIR__."/../views/admin/master.tpl.php";

    return require($view_admin);
}
