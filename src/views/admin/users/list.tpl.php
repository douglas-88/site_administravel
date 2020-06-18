<h1>Usuários</h1>
    <?php if(!empty($data["users"])):?>

    <?= $data["paginator"]?>
    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">AVATAR</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CRIADO EM</th>
            <th scope="col" class="text-center">AÇÕES</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data["users"] as $user):?>
        <tr>
            <td class="pt-4"><?= $user->id; ?></td>
            <td><img width="50" height="50" src="<?= $user->avatar;?>" alt="" class="rounded-circle border border-dark"></td>
            <td class="pt-4"><?= $user->name; ?></td>
            <td class="pt-4"><?= $user->email; ?></td>
            <td class="pt-4"><?= date("d/m/Y \á\s H:i:s",strtotime($user->created));?></td>
            <td class="text-right pt-4"">
                <a href="/admin/users/<?= $user->id;?>"  class="btn btn-primary btn-sm">
                    <i class="far fa-eye"></i>
                </a>
                <a href="/admin/users/<?= $user->id;;?>/edit"  class="btn btn-warning btn-sm">
                    <i class="far fa-edit"></i>
                </a>
                <a href="/admin/users/<?= $user->id;;?>/delete" onclick="return confirm('Deseja realmente excluir esta página ?')" class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <?php else:?>
        <p>Nenhum usuário encontrado.</p>
    <?php endif;?>
    <?= $data["paginator"]?>
    <br>
<a href="/admin/users/create"  class="btn btn-secondary btn-sm">
    <span><i class="fas fa-user fa-fw"></i> Cadastrar</span>
</a>