<h2 class="mb-5">Editar Usuário</h2>

<form action="" method="POST" id="form_user_create" enctype="multipart/form-data">
    <div class="form-group">
        <label for="userName"><h4><strong class="text-danger">*</strong>Nome:</h4></label>
        <input name="name" id="userName" type="text" class="form-control" value="<?= $data["user"]->name;?>">
        <small id="nameHelp" class="form-text text-muted">Mínimo de 3 a máximo de 255 caracteres</small>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label for="userEmail"><h4><strong class="text-danger">*</strong>Email:</h4></label>
            <input name="email" id="userEmail" type="text" class="form-control" value="<?= $data["user"]->email;?>">
            <small id="emailHelp" class="form-text text-muted">Forneça um e-mail válido, por exemplo: seuemail@email.com</small>
        </div>
    </div>
    <div class="form-group clearfix">
        <h4>Avatar:</h4>
        <div class="custom-file">
            <label class="custom-file-label bg" for="userAvatar">Selecionar Arquivo</label>
            <input type="file" name="avatar" class="custom-file-input" id="userAvatar" onchange="avatarPreview(event)">
            <small id="avatarHelp" class="form-text text-muted">Arquivos permitidos: .png, .jpeg, .jpg</small>
        </div>
        <img width="200" class="rounded float-right rounded" id="avatar_preview" src="<?= $data["user"]->avatar;?>">
    </div>
    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Salvar</button>
</form>
<hr>
<a href="/admin/users" class="btn btn-secondary"><i class="far fa-arrow-alt-circle-left"></i> Voltar</a>