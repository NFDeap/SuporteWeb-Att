<!DOCTYPE html>

<html>

<head>
    <title>Suporte Web</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link href="node_modules/bootstrap/compiler/bootstrap.min.css" rel="stylesheet">

    

    <!-- Material Design Bootstrap -->
    <link href="node_modules/bootstrap/compiler/mdb.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/estilos.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>

<body>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-12">

                <figure>
                    <img src="imagens/logo.png" class="rounded mx-auto d-block">
                </figure>

            </div>
        </div>
    </div>

<!-- <hr class="md-4"> -->

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3"></div>

            <div class="col-md-6">

                <form class="text-center" name="formLogin" method="post" action="login.php">
                    <div class="card text-center">
                        <div class="card-header">

                        </div>

                        <div class="card-body">

                            <h5 class="card-title alert alert-primary">
                                <strong>Suporte Web</strong>
                            </h5>

                            <p class="card-text">

                                <i class="fa fa-address-card" aria-hidden="true"></i>
                                &nbsp;&nbsp;
                                <label for="email">
                                    E-mail:
                                </label>
                                <input class="form-control" type="email" id="email" name="email"
                                    title="Informe o E-mail" maxlength="20" required autofocus />

                                <br>                            
                                <br>

                                <i class="fa fa-key"></i>
                                &nbsp;&nbsp;
                                <label for="senha">
                                    Senha:
                                </label>
                                <input class="form-control" type="password" id="senha" name="senha"
                                    class="form-control mb-4" maxlength="25" required>

                                <br>

                            </p>

                        </div>

                        <div class="card-footer text-muted">
                            <button type="submit" id="login" name="login" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-bolt"></i>
                                Entrar
                            </button>    
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <?php include_once 'rodape.php'; ?>
