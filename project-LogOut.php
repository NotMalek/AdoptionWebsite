<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log Out</title>
    <link rel="stylesheet" href="project-style.css">
</head>
<body onload=display_();>
<script src="project.js"></script>

<?php
include ('header.php');
include('menu.php');
include ('footer.php');
include ('project-session.php');
session_unset();
session_destroy();
?>

<div class="content">
    <p> You have been successfully logged out. See you soon!</p>

</div>


</body>
</html>
