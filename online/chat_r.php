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
    <body style="margin: 10px;">

        <?php
        session_start();
        if (isset($_POST['chat'])) {
            $_SESSION['chat_name'] = $_POST['chat'];
            header('Location: chat_r.php');
        }
        ?>
        <h2 style = 'font-family: sans-serif; color: black;'><?php
        $o = (explode("666", $_SESSION['chat_name']));
        foreach ($o as $key => $value) {
            if ($value != $_SESSION['username']) {
                print "<a href='chat_r.php'>" . $value . "</a>";
                $message_to = $value;
            }
        }

        ?>

        </h2>

        <form action="chat_r.php" method="post">
            <input autofocus="autofocus" type="text" name="message" style='width: 100%; display: inline-block; border: 2px solid black; background-color: transparent; outline: none; color: black;'>
            <br>
            <br>
            <input type="submit" name="send" value="send" style = ' display: inline-block; background-color: blue; border: 2px solid blue; color: white; border-radius: 10px; height: 40px; width: 100%; font-size: 27px;'>
        </form>
        <br>
        <?php
        mysql_connect('localhost', 'emilio2', 'k421k421');;
        mysql_select_db('spade');
        include("public/notify.php");
        $chat_name = $_SESSION['chat_name'];


        if (isset($_POST['send'])) {
            if (!empty($_POST['message'])) {
                $_POST['message'] = str_replace("'", "\'", $_POST['message']);
                $insert_message = "INSERT INTO $chat_name(message, username, date_entered) VALUES(
                    '{$_POST['message']}', '{$_SESSION['username']}', NOW()
                )";
                mysql_query($insert_message);

                        $qq = "SELECT * FROM $message_to";
                        if ($r = mysql_query($qq)) {
                          while ($row = mysql_fetch_array($r)) {
                            if (!empty($row['phone_number'])) {

                              $number = $row['phone_number'];

                            }
                          }
                        }
                        if (is_numeric($number)) {
                          notify($config, $number, 'You just got a message from ' . $_SESSION['username'] . ' on plumebin.com');
                        }
            }
        }


		print '<div style="width: 300px;">';

        //prints out messages form database
        $get_messages = "SELECT * FROM $chat_name ORDER BY date_entered DESC";
        if ($r = mysql_query($get_messages)) {
            while ($row = mysql_fetch_array($r)) {
                if($row['username'] == $_SESSION['username']){
                    print "<div style='float: right; width: 190px;'><br>";
                    print "<div style='background-color: #5bc0e1; border-radius: 10px; display: inline-block; text-align: right;'><p style='#2d2d2d; font-family: arial; font-size: 25px; margin: 5px;'>" . $row['message'] . "</p></div>";

                    $date = date_create($row['date_entered']);

                                    print "<p style='color: grey;'>" . date_format($date, "g:i, M d") . "</p>";



                    print "</div><br><br>";


                } elseif($row['username'] == '666') {
                    print "<div style='width: 190px;'><br><br>";
                    print "<div style='background-color: #ff8a8a; border-radius: 10px; display: inline-block; text-align: left;'><p style='#2d2d2d; font-family: arial; font-size: 25px; margin: 5px;'>" . $row['message'] . "</p></div>";

                    $date = date_create($row['date_entered']);

                                    print "<p style='color: grey;'>" . date_format($date, "g:i, M d") . "</p>";


                    print "</div><br>";
                } else {
                    print "<div style='float: left; width: 190px;'><br>";
                    print "<div style='background-color: #f9f9f9; border-radius: 10px; display: inline-block; text-align: left;'><p style='#2d2d2d; font-family: arial; font-size: 25px; margin: 5px;'>" . $row['message'] . "</p></div>";

                        $date = date_create($row['date_entered']);

                                    print "<p style='color: grey;'>" . date_format($date, "g:i, M d") . "</p>";




                    print "</div><br>";
                }

                //print "<p style = 'color: #5bc0e1; font-family: sans-serif; font-size: 20px;'>" . $row['message'] . " - <strong style='color: #2d2d2d; font-size: 20px;'>" . $row['username'] . "</strong></p>";
            }
        }

        ?>
        </div>
    <div class="navbar navbar-default navbar-fixed-top text-center" id="bot" style="box-shadow: 0px 2px 5px #888888; border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;">
    <div>

        <a href='chat.php'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true" id='backButton'></span></a>
                <a href="chat_setting.php"><span class="glyphicon glyphicon-cog" aria-hidden="true" style="float: right; font-size: 35px; color: black; margin-top: 10px; margin-right: 10px;"></span></a>

    </div>
</div>
</body>
</html>
