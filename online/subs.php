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
        
        <h2><?php 
        session_start();
        print $_SESSION['other_user'];
        print "'s subscribers";
         ?></h2>
        <hr style="margin-bottom: 10px;">
        <?php
        mysql_connect('localhost', 'emilio2', 'k421k421');;
        mysql_select_db('spade');
        $other_user = $_SESSION['other_user'];
        $query = "SELECT * FROM $other_user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (!empty($row['subscribed_to_you'])) {
                    print "<a href='other_user.php?username=" . $row['subscribed_to_you'] . "'><h3>" . $row['subscribed_to_you'] . "</h3></a>";
                }
            }
        }
        ?>




        <div class="navbar navbar-default navbar-fixed-top text-center" id="bot" style="box-shadow: 0px 2px 5px #888888; border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;">
    <div>

        <a href='other_user.php?username=<?php  print $_SESSION['other_user'];  ?>'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true" id='backButton'></span></a>


    </div>
</div>




    </body>
</html>
