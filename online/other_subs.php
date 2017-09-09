<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php session_start();
        $m = $_SESSION['found_user'];
        $fm = $m . "'s";
        print $fm ?> Subscribers</title>
        <style media="screen">
            p{
                color: #2d2d2d;
            }
            h2{
                color: #2d2d2d;
                font-family: helvetica;
            }
        </style>
    </head>
    <body style="background-color: #eeeeee;">
        <div class = 'sidebar'>
            <a href = "welcome.php"><div  class = 'inner_buttons' style="background-color: lightgreen; border-radius: 10px; margin: auto; margin-top: 35px;"></div></a>
            <a href = "find.php"><div  class = 'inner_buttons' style="background-color: yellow; border-radius: 10px; margin: auto; margin-top: 35px;"></div></a>
            <a href = "user_post.php"><div  class = 'inner_buttons' style="background-color: red; border-radius: 10px; margin: auto; margin-top: 35px;"></div></a>
        </div>

        <style media="screen">
            .sidebar{
                position: absolute;
                height: 250px;
                width: 60px;
                background-color: white;
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
                margin-top: 10px;
                opacity: .5;
                transition: .2s;
                position: fixed;
            }

            .sidebar:hover{
                opacity: 1;
                width: 70px;
            }

            .inner_buttons{
                height: 40px;
                width: 40px;
                transition: .4s;
            }

            .inner_buttons:hover{
                transform: rotate(-90deg);
                box-shadow: -2px 2px black;;
            }
        </style>
    <div style="width: 500px; margin: auto;">
        <h2><?php print $fm;
        print " subscribers";
         ?></h2>
        <hr style="margin-bottom: 10px;">
        <?php
        mysql_connect('localhost', 'emilio2', 'k421k421');;
        mysql_select_db('spade');
        $user = $_SESSION['found_user'];
        $query = "SELECT * FROM $user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (!empty($row['subscribed_to_you'])) {
                    print "<form method = 'post' action='other_subs.php'>";
                    print "<input type = 'submit' name = 'other_user' style='border: none; background-color: transparent; color: #2d2d2d; font-size: 30px; cursor: pointer; outline: none;' value = " . $row['subscribed_to_you'] . ">";
                    print "</form>";
                }
            }
        }
        if (isset($_POST['other_user'])) {
            $found_user = $_POST['other_user'];
            $_SESSION['found_user'] = $found_user;
            header("Location: other_user.php");
        }
        ?>
    </div>
    </body>
</html>