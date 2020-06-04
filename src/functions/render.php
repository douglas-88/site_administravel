<?php

/**
 * @author Douglas Fernando <dcdouglas64@gmail.com>
 * @since 1.0
 *
 * Função auxiliar para a rendererização dos templates HTML
 *
 * @param string $content
 * @param string $template_path
 * @param array|null $data
 * @return mixed
 */
function render(string $content,string $template_path,array $data = null){

    $content    = __DIR__."/../views/".$content.".tpl.php";
    $view       = __DIR__."/../views/".$template_path.".tpl.php";

    return require($view);
}