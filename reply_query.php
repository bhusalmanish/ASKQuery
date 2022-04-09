 <?php
    require_once 'constant.php';
    // reply_text validation & upload to tbl_forums_replies
    if (isset($_POST['replybtn'])) {
        $err = [];
        $forum_id = $_POST['forum_id'];
        if (isset($_POST['reply_text']) && !empty($_POST['reply_text']) && trim($_POST['reply_text'])) {

            $reply = $_POST['reply_text'];
        } else {
            $err['reply_err'] = 'Enter the message';
        }

        if (count($err) == 0) {
            try {
                $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                print_r($con);
                $reply_dates = date('Y-m-d H:i:s');
                $no_like =  1;
                $no_dislike = 1;
                $reply_by = 1;
                echo $sql = "Insert into tbl_forum_replies(forum_id,reply,reply_by,no_like,no_dislike,reply_dates)values($forum_id,'$reply',$reply_by,$no_like,$no_dislike,'$reply_dates')";
                print_r($sql);
                $result = mysqli_query($con, $sql);
                print_r($result);
                echo $result;
                if ($con->connect_error) {
                    die("Connection failed:" . $con->connect_error);
                }
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

 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post' name="reply">
     <input type="hidden" name='forum_id' value="<?php echo $forum['id'] ?>">

     <input type="text" name='reply_text'>

     <input type="submit" name='replybtn'>
     <br>

     <!-- reply Output database connection -->
     <?php

        // database connection

        $replay_output = [];

        try {

            $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $sql = "select * from tbl_forum_replies;";
            $result = mysqli_query($con, $sql);

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            } else {

                echo "databse connection";
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
 </form>



 <!-- reply output loop -->
 <?php

    foreach ($replay_output as $key => $reply_o) { ?>
     <label for="">1</label>
     <br>
     <?php echo $reply_o['reply_by'] ?>
     <label for="">reply:</label>
     <?php echo $reply_o['reply'] ?>
     <label for="">reply date</label>
     <?php echo $reply_o['reply_dates'] ?>

     <br>
     <label id='reply' for=""> Wow Amazing Facts . Thanks for share</label>


     <hr color="gray">

 <?php } ?>