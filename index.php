<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PHP Data Object</title>
</head>

<body class="d-flex flex-column  bg-secondary">

    <main class="container center-block">

        <h1 class="bg-success d-flex justify-content-center">PHP Data Object</h1>

        <div class="">

            <div class="d-flex flex-row justify-content-center">


            </div>

            <div class="d-flex flex-row justify-content-center">
                <form method="post" action="login.php" class="border border-success bg-light rounded m-2">

                    <div class="form-group m-3">
                        <span>Email:</span>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group m-3">
                        <span>senha:</span>
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>

                    <div class="form-group m-3 button-success">
                        <button class="btn btn-success">Entrar</button>
                    </div>

                </form>

                <form method="post" action="cadastro.php" class="border border-success ml-1 bg-light rounded m-2">

                    <?php

                    $status = $_GET['status'];

                    switch ($status) {
                        case 'cadastrado':
                            echo "<p class='alert alert-success text-center p-n1'>Você agora é um usuário cadastrado, faça login no box ao lado!</p>";
                            break;

                        case 'match_senha_falso':
                            echo "<p class='alert alert-danger text-center'>As senhas digitadas não batem.</p>";
                            break;

                        case 'email_existe':
                            echo "<p class='alert alert-danger text-center'>O email digitado já está cadastrado em nosso sistema!</p>";
                            break;

                        case 'vazio':
                            echo "<p class='alert alert-danger text-center'>Há campos vazios!</p>";
                            break;
                    }
                    ?>

                    <div class="form-group m-3">
                        <span>Nome:</span>
                        <input type="text" class="form-control" name="nome" placeholder="Nome">
                    </div>

                    <div class="form-group m-3">
                        <span>Email:</span>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group m-3">
                        <span>Senha:</span>
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>

                    <div class="form-group m-3">
                        <span>Confirmação de senha:</span>
                        <input type="password" class="form-control" name="senhaConfirmada" placeholder="Senha">
                    </div>

                    <div class="form-group m-3 button-success">
                        <button class="btn btn-success">Entrar</button>
                    </div>

                </form>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>