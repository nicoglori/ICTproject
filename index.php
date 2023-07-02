<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/main.css" />




    <script>
        <?php if(isset($_SESSION['alert_message'])) { ?>
            alert("<?php echo $_SESSION['alert_message']; ?>");
            <?php unset($_SESSION['alert_message']); ?>
        <?php } ?>
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registrazione</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="form-container">
            <h2>Registrazione utente</h2>
            <form action="api/register.php" method="POST" class="register-form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cognome</label>
                    <input type="text" name="surname" class="form-control" required>
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required>
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" pattern=".{8,16}" title="Inserire almeno 8 caratteri">
                    <label for="exampleInputEmail1">Conferma Password</label>
                    <input type="password" name="passwordConfirm" class="form-control" required>
                    <button type="submit" class="btn btn-success mt-5">Registrati</button>
                </div>
            </form>
        </div>




    </div>
</body>

</html>