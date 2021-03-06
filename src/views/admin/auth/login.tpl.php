<div class="col-lg-5">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Informe seu email" />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputPassword">Senha</label>
                    <input class="form-control py-4" id="inputPassword" name="password" type="text" placeholder="Informe sua senha" />
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <label class="custom-control-label" for="rememberPasswordCheck">Relembrar senha</label>
                        <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" href="password.php">Esqueceu a senha ?</a>
                    <input type="submit" class="btn btn-primary" href="/admin" value="Login">
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <div class="small"><a href="/admin/login/register">Ainda não possui uma conta ? Registre-se!</a></div>
        </div>
    </div>
</div>