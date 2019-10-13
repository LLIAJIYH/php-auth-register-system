<?php
    session_start();
    require "../config.php";
        if(isset($_SESSION['id'])){
            header("Location:".$siteurl);
        }
        if(isset($_POST['submit-1'])) {
                $login       = $_POST['login'];
                $password    = $_POST['password'];
                $query1      = mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$login' AND `password` = '$password'");
                if (!mysqli_num_rows($query1) > 0) {
                    echo "<script type='text/javascript'>alert('Wrong email/password =-||-= press ok')</script>";
                }else{
                    $user    = mysqli_fetch_assoc($query1);
                    $id      = $user['id'];
                    $name    = $user['name'];

                    $_SESSION['id']      = $id;
                    $_SESSION['name']    = $name;

                    header("Location:" . $siteurl);
                }
        }
            if(isset($_POST['submit-2'])){
                    $login2       = $_POST['login2'];
                    $password2    = $_POST['password2'];
                    $name2        = $_POST['name2'];


            if (!$result = mysqli_query($db,"SELECT * FROM `users` WHERE `email` LIKE $login2")) {
                    echo "<script type='text/javascript'>alert('This user is already registered   =-||-= press ok')</script>";
                }else{
                    mysqli_query($db, "INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES (NULL, '$name2', '$password2', '$login2')");
                    $query2 = mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$login2' AND `password` = '$password2'");
                    if (mysqli_num_rows($query2) > 0) {
                        $user2       = mysqli_fetch_assoc($query2);
                        $id          = $user2['id'];
                        $name        = $user2['name'];

                        $_SESSION['id']      = $id;
                        $_SESSION['name']    = $name;

                        header("Location:" . $siteurl);
                    }
                }
            };


            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Authoritaion</title>

            </head>
            <body>
            <h2>Authoritaion</h2>
            <form method="POST" action="<?=$siteurl?>/modules/auth.php">
                <input type="text" name="login" placeholder="Email"><br/>
                <input type="password" name="password" placeholder="Password"><br/>
                <input type="submit" name="submit-1" value="log in"/>
            </form>
            <h1 class="or">OR</h1>
            <h2>Register</h2>
            <form method="POST" action="<?=$siteurl?>/modules/auth.php">
                <input type="text" name="name2" placeholder="Your name"><br/>
                <input type="text" name="login2" placeholder="Email"><br/>
                <input type="password" name="password2" placeholder="Password"><br/>
                <input type="submit" name="submit-2" value="register"/>
            </form>
            <!--
             INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES (NULL, 'test', '123456', 'test@yandex.ru')
             -->
            </body>
            </html>
