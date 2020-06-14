<h2 class="mb-5">Nova página</h2>

<form action="" method="POST" id="form_page_create">
    <div class="form-group">
        <label for="pagesTitle"><h4>Título</h4></label>
        <input name="title" id="pagesTitle" type="text" class="form-control">
        <small id="titleHelp" class="form-text text-muted">Mínimo de 6 a máximo de 255 caracteres</small>
    </div>
    <div class="form-group">
        <label for="pagesUrl"><h4>URL:</h4></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input name="url" data-validation="custom" data-validation-regexp="^([a-z]+)$" data-validation-optional="true" id="pagesUrl" type="text" class="form-control">
        </div>
        <small id="urlHelp" class="form-text text-muted">Mínimo de 6 a máximo de 255 caracteres.<br>Informação opcional,se desejar,deixe em branco para o sistema criar a url automaticamente.</small>
    </div>
    <div class="form-group">
        <label for="pagesUrl"><h4>Conteúdo:</h4></label>
        <textarea name="content" id="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Salvar</button>
</form>
<hr>
<a href="/admin/pages" class="btn btn-secondary"><i class="far fa-arrow-alt-circle-left"></i> Voltar</a>