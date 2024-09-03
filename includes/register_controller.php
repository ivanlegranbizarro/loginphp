<?php

function is_input_empty(string $username, string $password, string $email): bool
{
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    }
    return false;
}

function is_email_invalid(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function is_username_taken(object $pdo, string $username): bool
{
    if (get_username($pdo, $username)) {
        return true;
    }
    return false;
}


function is_email_registered(object $pdo, string $email): bool
{
    if (get_email($pdo, $email)) {
        return true;
    }
    return false;
}

function create_user(object $pdo, string $username, string $email, string $password)
{
    set_user($pdo, $username, $email, $password);
}
