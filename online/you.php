<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="master.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php

  mysql_connect('localhost', 'emilio2', 'k421k421');
  mysql_select_db('spade');

  include("function.php");
  handle_user_form();

  ?>
</head>
<body style="margin-left: 10px;">
       <div class="navbar navbar-default navbar-fixed-top text-center" id="bot" style="box-shadow: 0px 2px 5px #888888; border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;">
    <div class="container">

        <a href='welcome.php'><span class="glyphicon glyphicon-home" aria-hidden="true" id="alpaca"></span></a>

        <a href='connect.php'><span class="glyphicon glyphicon-globe" aria-hidden="true" id="alpaca"></span></a>

        <a href='chat.php'><span class="glyphicon glyphicon-comment" aria-hidden="true" id="alpaca"></span></a>

        <a href='notifications.php'><span class="glyphicon glyphicon-bell" aria-hidden="true" id="alpaca"></span></a>

        <a href='you.php'><span class="glyphicon glyphicon-user" aria-hidden="true" id="alpaca"></span></a>


    </div>
</div>


<a href='user_post.php'><div style="margin: auto; height: 70px; width: 200px; background-color: #6BB9F0; margin-bottom: 20px; border-radius: 10px; text-align: center; box-shadow: 3px 3px 5px #888888;" class="navbar-fixed-bottom">
    <span class="glyphicon glyphicon-hand-up" aria-hidden="true" id="alpaca" style="font-size: 40px; "></span>
</div></a>
<br>
        <h1 id='nname' style="display: inline;">
        <?php
            //connect and stuff
            mysql_connect('localhost', 'emilio2', 'k421k421');
            mysql_select_db('spade');
            session_start();
            error_reporting(0);

            //define variables for usernames
            $current_user = $_SESSION['username'];

            $_SESSION['other_user'] = $_SESSION['username'];

            print $current_user;


            if ($other_user == $current_user) {
                header("Location: you.php");
            }
            ?>
        </h1>


        <a href="settings.php"><span class="glyphicon glyphicon-cog" aria-hidden="true" style="float: right; margin-right: 15px; font-size: 35px; margin-top: 5px; color: black;"></span></a>


        <h3>
        <?php

            //gets other users subscribers count
            $query = "SELECT * FROM $current_user";
            if ($r = mysql_query($query)) {
                while ($row = mysql_fetch_array($r)) {
                    $subscribers +=$row['subs_count'];

                }
            }


            //prints out subscribers
            print "<a href='subs.php'><p style='margin-left: 10px;'>SUBS: " . $subscribers . "</p></a>";

            print "<hr>";

            //gets and prints your posts
            $query = "SELECT * FROM $current_user ORDER BY date_entered DESC";
            if ($r = mysql_query($query)) {
                while ($row = mysql_fetch_array($r)) {



                    //printing the posts
                    if (!empty($row['posts'])) {

                      $text_date = date_create($row['date_entered']);

                      print "<p style='color: grey; float: left; margin-left: 15px; font-size: 12px;'>" . date_format($text_date, "M d, Y") . "</p>";

                        print "<div class='well' id='wellbox'><h3>" . $row['posts'] . "</h3></div>";
                    }

                    if (!empty($row['pictures'])) {

                      $pic_date = date_create($row['date_entered']);

                                            print "<p style='color: grey; float: left; margin-left: 15px; font-size: 12px;'>" . date_format($pic_date, "M d, Y") . "</p>";


                  print "<div  class='well' id='wellbox'>";
                  print "<img style='width: 100%;' src='data:image/jpeg;base64," . base64_encode($row['pictures']) . "'/><br>";
                  print "</div>";
              }
            }
                          print '
        <div align="center" style="margin: 50px; font-size: 30px;"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span></div>';
            }




        ?>

        <form>
        </h3>


    </body>
</html>
