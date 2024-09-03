<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        require_once 'dbh.inc.php';
        require_once 'register_model.php';
        require_once 'register_controller.php';

        // ERROR Handlers
        $errors = [];
        if (is_input_empty($username, $password, $email)) {
            $errors['empty_input'] = 'Please fill in all fields';
        }
        if (is_email_invalid($email)) {
            $errors['invalid_email'] = 'Please enter a valid email';
        }
        if (is_username_taken($pdo, $username)) {
            $errors['username_taken'] = 'Username already taken';
        }
        if (is_email_registered($pdo, $email)) {
            $errors['email_registered'] = 'Email already registered';
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_register"] = $errors;
            $registerData = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ];
            $_SESSION['registerData'] = $registerData;
            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $username, $email, $password);
        header("Location: ../index.php?register=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
