<?php

function paginator(int $total_registros,int $itens_por_pagina,int $max_links):string{

    /**
     * Paginação com filtros de busca, caso houver:
     */
    if($total_registros <= $itens_por_pagina){
        return "";
    }

    $uri = $_SERVER["PATH_INFO"];
    $query_str = $_SERVER["QUERY_STRING"] ?? null;
    parse_str($query_str,$params);
    unset($params["page"]);
    $params = (!empty(http_build_query($params))) ? "&".http_build_query($params) : "";

    $pagina_atual = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRIPPED) ?? 1;
    $total_de_paginas = ceil($total_registros/$itens_por_pagina);

    $html = "<nav aria-label=\"Page navigation example\">
          <ul class=\"pagination justify-content-end\">";

     $disabled_prev = ($pagina_atual == 1) ? " disabled " : "";
        $html .= '<li class="page-item '. "$disabled_prev". '">
                    <a class="page-link" href="'.$uri.'?page=1'.$params.'">Primeira Página</a>
                 </li>';

        $html .= '<li class="page-item '. "$disabled_prev". '">
                    <a class="page-link" href="'.$uri.'?page='.($pagina_atual - 1).'">&laquo;</a>
                  </li>';


    //Links antes da página atual:
    for($i = $pagina_atual - $max_links;$i <= $pagina_atual - 1;$i++){

        if($i >= 1){
            $html .= "<li class=\"page-item\"><a class=\"page-link\" href=".$uri."?page=".$i.$params.">$i</a></li>";
        }
    }
    $html .= "<li class=\"page-item active\" aria-current=\"page\">
              <span class=\"page-link\">
                $pagina_atual
                <span class=\"sr-only\">(current)</span>
              </span>
            </li>";


    //Links depois da página atual:
    for($i = $pagina_atual + 1;$i <= $pagina_atual + $max_links;$i++){

        if($i <= $total_de_paginas
        ){
            $html .= "<li class=\"page-item\"><a class=\"page-link\" href=".$uri."?page=".$i.$params.">$i</a></li>";

        }
    }

        $disabled_next = ($pagina_atual == $total_de_paginas) ? " disabled " : "";
        $html .= '<li class="page-item '. "$disabled_next". '">
                    <a class="page-link" href="'.$uri.'?page='.($pagina_atual + 1).'">&raquo;</a>
                  </li>';

        $html .= "<li class=\"page-item $disabled_next\" >
                     <a class=\"page-link\" href=".$uri."?page=".$total_de_paginas.$params.">Última Página</a>
                  </li>";

    $html .= "</ul>
    </nav>";


    return $html;


}