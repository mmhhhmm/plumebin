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
<body align="center">


<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: white; border: none; box-shadow: 0px 2px 5px #888888;">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: black;">Plumebin is Loading...</a>
    </div>
  </div>
</nav>

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
<br>

      <?

      mysql_connect('localhost', 'emilio2', 'k421k421');
      mysql_select_db('spade');
      session_start();   

      $user = $_SESSION['username'];
      $query = "SELECT * FROM $user ORDER BY date_entered DESC";
      if ($r = mysql_query($query)) {
          while ($row = mysql_fetch_array($r)) {
              if (!empty($row['feed']) and !empty($row['feed_name'])) {
                $text_date = date_create($row['date_entered']);

                                    print "<p style='color: grey; float: left; margin-left: 15px; font-size: 12px;'>" . date_format($text_date, "M d, Y") . "</p>";

                  print "<div  class='well' id='wellbox'><h3>" . $row['feed'] . "<strong><h3><a href=\"other_user.php?username={$row['feed_name']}\">" . $row['feed_name'] . "</a></h3></strong></p>";
                  print "</h3>";
                  
                  print "</div></div>";
              }
            if (!empty($row['feed_pics']) AND !empty($row['feed_name'])) {
              $pic_date = date_create($row['date_entered']);

                                    print "<p style='color: grey; float: left; margin-left: 15px; font-size: 12px;'>" . date_format($pic_date, "M d, Y") . "</p>";
                  print "<div  class='well' id='wellbox'>";
                  print "<img style='width: 100%;' src='data:image/jpeg;base64," . base64_encode($row['feed_pics']) . "'/><br>";
                  print "<h3><a href=\"other_user.php?username={$row['feed_name']}\">" . $row['feed_name'] . "</a></h3>";

                  print "</div>";
              }
          }
      }
      ?>


</body>
</html>
