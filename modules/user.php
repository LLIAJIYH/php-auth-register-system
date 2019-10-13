<?php
    session_start();
    require "../config.php";
    if(!isset($_SESSION['id'])){
        header("Location:".$siteurl);
    }else{
        if(isset($_GET['id']) & !empty($_GET['id'])){
            if($_GET['id'] == $_SESSION['id']){
                ?>

                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Your profile</title>
                    <link rel = "stylesheet" type = "text/css" href = "../styles/user.css" />
                </head>
                <body>
                <div>
                    <sctipt> <a href="../server/exit.php">Exit</a></sctipt>
                    <?php
                        $query = mysqli_query($db, "SELECT * FROM `users` WHERE `id` =".$_SESSION['id']);
                        if(mysqli_num_rows($query) > 0) {
                            $user = mysqli_fetch_assoc($query);
                            $name = $user['name'];
                            $id = $user['id'];
                            $email = $user['email'];
                        }
                            ?>

                            <h1>User name <?php print $name ?></h1><br>
                            <h1>User email <?php print $email ?></h1><br>
                            <h1>User id <?php print $id ?></h1>
                            </div>
                            </body>
                            </html>

                            <?php
                        }else if(!mysqli_query($db, "SELECT * FROM `users` WHERE `id` =".$_SESSION['id']) || mysqli_query($db, "SELECT * FROM `users` WHERE `id` =".$_GET['id'])) {
                            $query = mysqli_query($db, "SELECT * FROM `users` WHERE `id` =".$_GET['id']);
                            if(mysqli_num_rows($query) > 0){
                                $user        = mysqli_fetch_assoc($query);
                                $name        = $user['name'];
                                $id          = $user['id'];
                                $email       = $user['email'];

                            }

                            ?>

                            <h1>User name <?php print $name ?></h1><br>
                            <h1>User email <?php print $email ?></h1><br>
                            <h1>User id <?php print $id ?></h1>
                            </div>
                            </body>
                            </html>
                            <?php
                            }else{
                                print "user is not found";
                        };
        }else{
            header("Location:".$siteurl);
        }


    }


