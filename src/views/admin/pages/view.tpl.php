<h3 class="mb-5">Detalhes da páginas</h3>

<div class="row">
    <div class="col-3">
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
    </div>
    <div class="col bg-light">
        <?= html_entity_decode($data["page"]->content);?>
    </div>
</div>

<p>
    <a href="/admin/pages/<?= $data["page"]->id?>/edit" class="btn btn-primary">editar</a>
    <a href="/admin/pages/<?= $data["page"]->id?>/delete" class="btn btn-danger confirm">remover</a>
</p>

<a href="/admin/pages" class="btn btn-secondary">Voltar</a>