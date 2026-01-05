<?php

function redirect($path) {
    header("Location: $path");
    exit();
}

function redirectHome() {
    redirect('/index.php');
}

function redirectLogin() {
    redirect('/auth/login.php');
}
?>
