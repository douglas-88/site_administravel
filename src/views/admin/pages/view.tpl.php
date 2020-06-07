<h3 class="mb-5">Detalhes da páginas</h3>

<div class="row">
    <div class="col bg-light p-3">
        <?= html_entity_decode($data["page"]->content);?>
    </div>
    <div class="col-4">
        <dl class="row">
            <dt class="col-sm-4">Título</dt>
            <dd class="col-sm-8"><?= $data["page"]->title?></dd>

            <dt class="col-sm-4">URL</dt>
            <dd class="col-sm-8">/<?= $data["page"]->title?>
                <br>
                <a href="/<?= $data["page"]->title?>" target="blank">abrir</a>
            </dd>

            <dt class="col-sm-4">Criado em</dt>
            <dd class="col-sm-8"><?= $data["page"]->created?></dd>

            <dt class="col-sm-4">Atualizado em</dt>
            <dd class="col-sm-8"><?= $data["page"]->updated?></dd>
        </dl>
        <p>
            <a href="/admin/pages/<?= $data["page"]->id?>/edit" class="btn btn-primary">
                <i class="far fa-edit"></i> Editar
            </a>
            <a href="/admin/pages/<?= $data["page"]->id?>/delete" onclick="return confirm('Deseja realmente excluir esta página ?')" class="btn btn-danger confirm">
                <i class="far fa-trash-alt"></i> Excluir
            </a>
            <a href="/admin/pages" class="btn btn-secondary">
                <i class="far fa-arrow-alt-circle-left"></i> Voltar
            </a>
        </p>
    </div>
</div>