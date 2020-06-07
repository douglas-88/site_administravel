<h3 class="mb-5">Editar página</h3>

<form action="" method="POST" id="form_page_edit">
    <input type="hidden" name="id" value="<?= $data["page"]->id;?>">
    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input name="title" data-validation="length" data-validation-length="6-255" id="pagesTitle" type="text" value="<?= $data["page"]->title;?>" class="form-control" placeholder="Aqui vai o título da página..." required>
        <small id="titleHelp" class="form-text text-muted">Mínimo de 6 a máximo de 255 caracteres</small>
    </div>
    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input name="url" id="pagesUrl" type="text" class="form-control" value="<?= $data["page"]->url;?>" placeholder="URL amigável, deixe em branco para informar a página inicial...">
        </div>
        <small id="urlHelp" class="form-text text-muted">Mínimo de 6 a máximo de 255 caracteres.<br>Informação opcional,se desejar,deixe em branco para o sistema criar a url automaticamente.</small>
    </div>
    <div class="form-group">
        <textarea name="content" id="content"><?= $data["page"]->content;?></textarea>
    </div>
    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Salvar</button>
</form>
<hr>
<a href="/admin/pages" class="btn btn-secondary">
    <i class="far fa-arrow-alt-circle-left"></i> Voltar
</a>