<?php
require_once 'check_session.php';
require 'constant.php';


// database connection 
$forums = [];

try {

    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "select * from tbl_forums;";
    $result = mysqli_query($con, $sql);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {

        echo  "databse connection";
    }



    if ($rows = mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($forums, $row);
        }
    }
} catch (Exception $e) {
    print('database Err:-' . $e->getMessage());
}







?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> A?KQuery-Dashboard</title>


    <link rel="stylesheet" href="style.css">
    <!-- google font link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">




</head>

<body>

    <?php

    require 'menu.php'; ?>

    <?php
    require_once 'menu.php';
    ?>


    <div class='card-forum'>


        <?php foreach ($forums as $key => $forum) { ?>
            <div class='card'>
                <br>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                </tr>
                <label id="title" for=" ">Title:</label>
                <span name="title" id='title'>
                    <?php echo   $forum['title']  ?>
                </span>
                <br>

                <label for="">>></label>
                <span name="desc" id="desc">
                    <?php echo  $forum['description'] ?>
                </span>
                <br>
                <br>


                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <!-- Use an element to toggle between a like/dislike icon -->
                <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i>
                <script>
                    function myFunction(x) {
                        x.classList.toggle("fa-thumbs-down");
                    }
                </script>
                <!-- reply section call from  reply_query.php   -->
                <?php require 'reply_query.php'; ?>

                <br>
            </div>
            <div class='space'>
                <span>
                    <br>
                </span>





            </div>
        <?php } ?>
    </div>


    <!-- js for like dislike -->
    <script>
        //like buttons
        $(".like-area a").click(function() {
            if ($(this).hasClass("like-active")) {
                $(this).find('.like-no').html(parseInt($(this).find('.like-no').html(), 10) - 1)
            } else {
                $(this).find('.like-no').html(parseInt($(this).find('.like-no').html(), 10) + 1)
            }
            $(this).toggleClass('like-active');
        });
    </script>