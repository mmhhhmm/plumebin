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

<h1>Chat settings</h1>

    <form action="chat_setting.php" method="post">

        <input type="submit" name="clear" value="empty chat" class="btn btn-danger" style="background-color: lightblue; border: none; height: 70px; width: 120px;">
		<br>
		<br>
        <input type="submit" name="delete" value="delete chat" class="btn btn-danger" style="height: 70px; width: 120px;">

    </form>





    <?php

    mysql_connect('localhost', 'emilio2', 'k421k421');;
    mysql_select_db('spade');
    session_start();
    $chat_name = $_SESSION['chat_name'];

        if (isset($_POST['clear'])) {
            $qe = "TRUNCATE TABLE $chat_name";
            mysql_query($qe);
            $qqq = "INSERT INTO $chat_name (message, username, date_entered) VALUES(
                'Plumebin cleared your chat!', '666', NOW()
            )";
            if(mysql_query($qqq)){
                header("Location: chat_r.php");
            };
        }
        if (isset($_POST['delete'])) {
            $user = $_SESSION['username'];
            $qe = "DELETE FROM $chat_name";
            $qqe = "DELETE FROM $user WHERE chats='$chat_name'";
            if (mysql_query($qe) AND mysql_query($qqe)) {
                header("Location: chat.php");
            } else {
                print mysql_error();
            }
        }

    ?>





    <div class="navbar navbar-default navbar-fixed-top text-center" id="bot" style="box-shadow: 0px 2px 5px #888888; border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;">
    <div>

        <a href='chat_r.php'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true" id='backButton'></span></a>

    </div>



</body>
</html>
