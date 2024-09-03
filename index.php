<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/register_view.php';

$registerData = $_SESSION['registerData'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Login</h2>
                <form action="includes/login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Registro</h2>
                <form action="includes/register.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <!-- Pre-carga el valor de 'username' si está disponible en la sesión -->
                        <input type="text" class="form-control" id="username" name="username" required
                            value="<?php echo htmlspecialchars($registerData['username'] ?? '', ENT_QUOTES); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <!-- Pre-carga el valor de 'email' si está disponible en la sesión -->
                        <input type="email" class="form-control" id="email" name="email" required
                            value="<?php echo htmlspecialchars($registerData['email'] ?? '', ENT_QUOTES); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <!-- No se pre-carga la contraseña por motivos de seguridad -->
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Registrarse</button>
                </form>
                <?php
                check_register_errors();
                ?>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['registerData']);
    ?>
</body>

</html>
