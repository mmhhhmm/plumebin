<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>find | Plumebin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="master.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid text-center">

        <form action="connect.php" method="post">
            <h3>– search –</h3>
                <input type="text" name="user" style = 'margin: auto; background-color: transparent; color: #8AC5EA; border: 2px solid #2d2d2d; outline: none; width: 200px; height: 50px; font-size: 26px; text-align: center; display: inline-block;' placeholder="username">








<!--                           V                               -->








                <div style="display: inline-block; width: 90px;">
                <p style="font-size: 15px; color: grey;">Featured User: <a href="other_user.php?username=Joe"><b>Joe</b></a></p>
                </div>







<!--                                 ^                                -->










                <br>
                <input type="submit" name="submit" value="search" style = 'background-color: transparent; color: black; border: none; outline: none; font-size: 0px;'>
        </form>
    <style media="screen">
        a{
            color: #8AC5EA;
        }
    </style>
        <?php
        mysql_connect('localhost', 'emilio2', 'k421k421');;
        mysql_select_db('spade');
        if (isset($_POST['submit'])) {
            $user_check = "SELECT * FROM users";
            if ($r = mysql_query($user_check)) {
                while ($row = mysql_fetch_array($r)) {
                    if (strtolower($_POST['user']) == strtolower($row['username'])) {
                        $found_user = $row['username'];
                        session_start();
                        $_SESSION['found_user'] = $found_user;
                        print "<a href = 'other_user.php?username=" . $row['username'] . "'><h2 style='color: #8AC5EA; font-size: 30px; text-decoration: underline; cursor: pointer'>{$row['username']}</h2></a>";
                    }
                }
            }
        }
        ?>
        <h3>– communities –</h3>

        <a href = "music.php">
            <div style="height: 70px;
            width: 200px;
            border: 2px solid lightblue;
            border-radius: 10px;">
              <h2>Music</h4>
            </div>
        </a><br>


        <a href = "sports.php">
          <div style="height: 70px;
          width: 200px;
          border: 2px solid lightblue;
          border-radius: 10px;">
            <h2>Sports</h4>
          </div>
        </a><br>


        <a href = "politics.php">
          <div style="height: 70px;
          width: 200px;
          border: 2px solid lightblue;
          border-radius: 10px;">
            <h2>Politics</h4>
          </div>
        </a><br>


        <a href = "fashion.php">
          <div style="height: 70px;
          width: 200px;
          border: 2px solid lightblue;
          border-radius: 10px;">
            <h2>Fashion</h4>
          </div>
        </a><br>


        <a href = "art.php">
          <div style="height: 70px;
          width: 200px;
          border: 2px solid lightblue;
          border-radius: 10px;">
            <h2>Art</h4>
          </div>
        </a><br>


        <a href = "food.php">
          <div style="height: 70px;
          width: 200px;
          border: 2px solid lightblue;
          border-radius: 10px;">
            <h2>Food</h4>
          </div>
        </a><br>


        <a href = "tech.php">
          <div style="height: 70px;
          width: 200px;
          border: 2px solid lightblue;
          border-radius: 10px;">
            <h2>Tech</h4>
          </div>
        </a><br>



        <br>
        <br>
        <br>
        <br>
    </div>
</div>


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
    </body>
</html>
