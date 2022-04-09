<?php
require_once 'check_session.php';

// require_once 'constant.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php

    require 'menu.php'; ?>

    <br><br>
    <?php require 'listquery.php' ?>


    <br><br>

    <h2> Admin Dashboard</h2>
    <?php
    require_once 'menu.php';
    ?>


    <br>
    <a href="logout.php">Logout</a>



    <br>
    <br>
    <?php
    require 'footer.php'; ?>
</body>

</html>