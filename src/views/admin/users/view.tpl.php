<h3 class="mb-5">Detalhes do usuário</h3>

<div class="row">
    <div class="col-6 bg-light mx-auto">
        <div class="col-12">
            <img width="100" height="100" src="<?= $data["user"]->avatar; ?>" alt="<?= $data["user"]->name; ?>" class="img-fluid img-thumbnail rounded-circle">
        </div>
        <div>
            <p>Nome: <?= $data["user"]->name; ?></p>
        </div>
        <div>
            <p>Email: <?= $data["user"]->email; ?></p>
        </div>
    </div>
</div>