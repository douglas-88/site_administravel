<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Criar uma conta</h3></div>
        <div class="card-body">
            <form action="/admin/login/register" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label class="small mb-1" for="input_name">Nome</label>
                            <input class="form-control py-4" id="input_name" name="name" type="text" placeholder="Informe seu nome" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="input_email">Email</label>
                    <input class="form-control py-4" id="input_email" type="email" name="email" aria-describedby="emailHelp" placeholder="Informe seu melhor email" />
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label class="small mb-1" for="input_password">Senha</label>
                            <input class="form-control py-4" id="input_password" name="password" type="password" placeholder="Informe uma senha" />
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4 mb-0">
                    <input type="submit" class="btn btn-primary btn-block" value="Cadastrar">
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <div class="small"><a href="/admin/login">Já posui uma conta ? Faça então o Login.</a></div>
        </div>
    </div>
</div>
