<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função auxiliar para a rendererização dos templates HTML
 * do Site.
 */
function render_site(string $content,array $data = null){

    $content    = __DIR__."/../views/site/".$content.".tpl.php";
    $view_site  = __DIR__."/../views/site/master.tpl.php";

    return require($view_site);

}
