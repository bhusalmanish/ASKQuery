<?php
// require_once 'check_session.php';
require_once 'constant.php';
require_once 'check_session.php';


// add query from validation  
if (isset($_POST['submit'])) {

    $err = [];
    //check username for existence,value and remove extra space
    if (
        isset($_POST['title']) && !empty($_POST['title'])
        && trim($_POST['title'])
    ) {
        $title =  trim($_POST['title']);
        // if (strlen($username) < 4) {
        // 	$err['username'] = 'Enter valid length : 8 character';
        // }
    } else {
        $err['title'] =  'Enter title';
    }
    if (
        isset($_POST['detailqn']) && !empty($_POST['detailqn'])
        && trim($_POST['detailqn'])
    ) {
        $description =  trim($_POST['detailqn']);
        // if (strlen($username) < 4) {
        // 	$err['username'] = 'Enter valid length : 8 character';
        // }
    } else {
        $err['detailqn'] =  'Enter detail of Query';
    }

    if (count($err) == 0) {
        // database connection 
        try {


            $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


            // $sql = "Insert into tbl_forum(category_id,title,description,image,posted_by)
            $sql = "Insert into tbl_forums(title,description,posted_by) values('$title','$description',1)";
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            } else {

                echo  "databse connection";
            }

            // $result = mysqli_query($con, $sql);

            print_r($result);
            if (mysqli_query($con, $sql)) {
                $succmsg = "add query sccessfuly";
            }
        } catch (Exception $e) {
            print('database Err:-' . $e->getMessage());
        }
    }
}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>A?KQuery-ASKQuery</title>

    <link rel="stylesheet" href="style.css">
</head>


<body>

    <?php

    require 'menu.php'; ?>
    <h2>Dashboard</h2>
    <?php
    require_once 'menu.php';
    ?>

    <h2> A?K query >> </h2>
    <div id='add_query'>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>

            <label for="">Title</label>
            <input type=" text" name='title'>
            <span> <?php if (isset($err['title'])) {
                        echo $err['title'];
                    }  ?></span>
            <br>
            <label for="">Detail of QN</label>
            <input type=" text" name='detailqn'>
            <span> <?php if (isset($err['detailqn'])) {
                        echo $err['detailqn'];
                    }  ?></span>
            <br>
            <label for=" ">ADD Image</label>
            <input type="file">
            <br>
            <input type="submit" name='submit' value='post'>
        </form>


    </div>
    <br>
    <!-- value=" echo $image ?>"> -->


    <br>
    <br>
    <a href="logout.php">Logout</a>
    <?php
    require 'footer.php'; ?>
</body>

</html>