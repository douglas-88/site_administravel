<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $data['title']?></title>
    <link href="/resources/sb_admin/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="/resources/noty/lib/noty.js"></script>
    <link href="/resources/noty/lib/noty.css" rel="stylesheet">
    <link href="/resources/noty/lib/themes/bootstrap-v4.css" rel="stylesheet">
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <?php include $content; ?>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright&copy;SiteAdministravel em PHP <?= date("Y")?></div>
                    <div>
                        <a href="#">Política de Privacidade</a>
                        &middot;
                        <a href="#">Termos e condições</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/resources/sb_admin/dist/js/scripts.js"></script>
<script>
    <?php flash_messages();?>
</script>
</body>
</html>