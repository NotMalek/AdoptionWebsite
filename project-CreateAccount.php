<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="project-style.css">
</head>
<body onload=display_();>
<script src="project.js"></script>

<?php
include ('header.php');
include('menu.php');
include ('footer.php');
?>


<div class="content">

    <form method="get">
        Username:  <input type="text" required pattern="[A-Za-z0-9]+" title = "username can contain letters and digits only." name="username">
        Password: <input type="password" required pattern = "^(?=.*\d)(?=.*[A-Za-z]).{4,}$" title="password must be at least 4 characters long, have at least one letter
and at least one digit" name="password">
        <input onclick="" type="submit">
    </form>

    <?php
    error_reporting (E_ALL ^ E_NOTICE);
    $file = 'login.txt';
    $data_user = $_GET["username"];
    $data_pass = $_GET["password"];
    $data = $data_user . ":" . $data_pass . PHP_EOL;
    if (empty($data_user) or empty($data_pass)) {
        return null;
    }
    elseif (strpos(file_get_contents("login.txt"), $data_user) !== false) {
            echo "This username is already in use! Try another one.";
    }
    else {
        file_put_contents("login.txt", $data, FILE_APPEND);
        echo "Account successfully created!";
    }
    ?>

</div>

</body>
</html>