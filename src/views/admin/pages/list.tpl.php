<h1>Páginas</h1>
<table class="table mt-5">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">TITULO</th>
        <th scope="col">CONTEÚDO</th>
        <th scope="col">CRIADO POR</th>
        <th scope="col">CRIADO EM</th>
        <th scope="col" class="text-center">AÇÕES</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $page):?>
    <tr>
        <td><?= $page->id;?></td>
        <td><?= content_limit($page->title,40);?></td>
        <td><?= content_limit($page->content,40);?></td>
        <td><?= $page->user_id;?></td>
        <td><?= $page->created;?></td>
        <td class="text-right">
            <a href="/admin/pages/<?= $page->id;?>"  class="btn btn-primary btn-sm">
                <i class="far fa-eye"></i>
            </a>
            <a href="/admin/pages/<?= $page->id;?>/edit"  class="btn btn-warning btn-sm">
                <i class="far fa-edit"></i>
            </a>
            <a href="/admin/pages/<?= $page->id;?>/delete" onclick="return confirm('Deseja realmente excluir esta página ?')" class="btn btn-danger btn-sm">
                <i class="far fa-trash-alt"></i>
            </a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<a href="/admin/pages/create"  class="btn btn-secondary btn-sm">
    <span><i class="far fa-file-alt"></i> Criar Página</span>
</a>
