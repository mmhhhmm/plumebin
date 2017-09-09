<!DOCTYPE html>
<html lang="en">
<head>
  <title>Plumebin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="master.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    <body style="margin: 20px;">

        <h2 style='font-family: sans-serif; display: inline;'>Messages

        <a href = 'new_chat.php' style='font-size: 40px; color: black; text-decoration: none; display: inline; float: right; margin-top: -5px;'> + </a></p>

        <hr>

        <?php
        mysql_connect('localhost', 'emilio2', 'k421k421');;
        mysql_select_db('spade');
        session_start();
        $user = $_SESSION['username'];
        include("public/notify.php");

        //prints out chats
        $query = "SELECT * FROM $user ORDER BY date_entered DESC";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (!empty($row['chats'])) {
                    //prints links to chats
                    $o = (explode("666", $row['chats']));
                    foreach ($o as $key => $value) {
                        if ($value != $_SESSION['username']) {
                            print "<form action ='chat_r.php' method = 'post'><input type = 'submit' style=' background-color: transparent; border: none; color: #5bc0e1; font-family: arial; cursor: pointer;' value ='" . $value . "'>";
                            print "<input type='hidden' name = 'chat' value = '" . $row['chats'] . "'></form><br>";
                        }
                    }
                } elseif($row['chats'] == 'NULL'){
                    print "<p>you have no DM's!<a href = 'new_chat.php'>" . " " . "start one.</a></p>";
                }
            }
        }
        //creates the chat
        if (isset($_POST['user_req'])) {
            $go = true;

            //defines some variables
            $user_req = $_POST['user_req'];
            $user = $_SESSION['username'];
            $chat_name = $user . "666" . $user_req;

            //checks if chat already exists
            $check = "SELECT * FROM $user";
            if ($r = mysql_query($check)) {
                while ($row = mysql_fetch_array($r)) {
                    if ($chat_name == $row['chats']) {
                        $go = false;
                    }
                }
            }

            if ($go) {
                //gives other person chat.
                $notification = $user . ' ';
                $alert_other = "INSERT INTO $user_req(chats, date_entered, notifications) VALUES(
                    '{$chat_name}', NOW(), '{$notification}'
                )";
                mysql_query($alert_other);


                //gives user chat
                $start_user = "INSERT INTO $user(chats, date_entered) VALUES(
                    '{$chat_name}', NOW()
                )";
                mysql_query($start_user);

                //creates chat tables
                $create = "CREATE TABLE $chat_name(
                    message TEXT NOT NULL,
                    username TEXT NOT NULL,
                    date_entered DATETIME NOT NULL
                )";
                mysql_query($create);

                $user_req = $_POST['user_req'];

                $qq = "SELECT * FROM $user_req";
                if ($r = mysql_query($qq)) {
                  while ($row = mysql_fetch_array($r)) {
                    if (!empty($row['phone_number'])) {

                      $number = $row['phone_number'];
                    }
                  }
                }
                if(is_numeric($number)){
                    notify($config, $number, $user . ' just started a message with you on plumebin.com');
                }


                //refreshes the page to update new tables
                header('Location: chat.php');
            }
        }


        ?>
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



    </body>
</html>
