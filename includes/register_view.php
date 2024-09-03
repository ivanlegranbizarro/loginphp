<?php
function check_register_errors()
{
    if (isset($_SESSION['errors_register'])) {
        foreach ($_SESSION['errors_register'] as $error) {
            echo '<br>';
            echo "<div class='alert alert-danger'>$error</div>";
        }
        unset($_SESSION['errors_register']);
    } else if (isset($_GET['register']) && $_GET['register'] === 'success') {
        echo '<br>';
        echo "<div class='alert alert-success'>User created successfully</div>";
    }
}
