<?php
//this is for all the functions used in spade.
//include this file in others if you want to use the functions.
error_reporting(0);
session_start();

#string replaces
function replace($var, $word, $replacement){
    $var = str_replace($word, $replacement, $var);
};




#subscribe for communities
function handle($community_name){
    mysql_connect('localhost', 'emilio2', 'k421k421');;
    mysql_select_db('spade');
    $user = $_SESSION['username'];
    $query23 = "SELECT * FROM $user";
    if ($r = mysql_query($query23)) {
        while ($row = mysql_fetch_array($r)) {
            if ($row['subs'] == $community_name) {
                //already subscribed
                $subed = true;
            }
        }

    if (isset($_POST['subscribe'])) {
            if (!$subed) {
                $query = "INSERT INTO $user(subs) VALUES(
                '{$community_name}'
                )";
                mysql_query($query);
                $query_two = "INSERT INTO $community_name(subs) VALUES(
                '{$user}'
                )";
                mysql_query($query_two);
                print "<p style = 'color: #86dd83'>subscribed!</p>";
            } else {
                print "<p style = 'color: red;'>already subscribed!</p>";
            }
        }
    }
}


//handles user link
/*
function handle_found(){
    if (isset($_POST['submit'])) {
        $found_user = $_POST['submit'];
        $_SESSION['found_user'] = $found_user;
        header("Location: other_user.php");
    }
}
*/

#create community
function create_community($community_name, $community_caption){
    $img_path = $community_name . ".png";
    print "<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Plumebin</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='master.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</head>
<body align='center'>
            <h3>$community_caption
        	<a href ='$path'><img src='http://www.freeiconspng.com/uploads/reload-icon-3.png' style='height: 40px; width: 40px;'></a>
</h3>
        	<br>
            <br>
        </body>
    </html>
    ";
    create_form($community_name);

    print '<div id="down-btn" style="border: 2px solid white; background-color: transparent; border-radius: 10px; height: 80px; width: 33%; margin: auto;">
                        <a href="#posts" class="btn page-scroll">
                            <p style="color: black; text-align: center;">See posts<br>
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" style="margin-top: 10px; color: black;"></span></p>
                        </a>
                        </div>';



    print "<section id='posts'><br><br>";
    $path = strtolower($community_name) . ".php";
    mysql_connect('localhost', 'emilio2', 'k421k421');;
    mysql_select_db('spade');
    $c = $community_name;
    $com_print = "SELECT * FROM $c ORDER BY date_entered DESC";
    if ($r = mysql_query($com_print)) {
        while ($row = mysql_fetch_array($r)){
            if (!empty($row['post'])) {
                if (!empty($row['username'])) {
                  $text_date = date_create($row['date_entered']);
                  print "<p style='color: grey; float: left; margin-left: 15px; font-size: 12px;'>" . date_format($text_date, "g:i A") . "</p>";
                  print "<p style='color: grey; float: right; margin-right: 15px; font-size: 12px;'>" . date_format($text_date, "M d, Y") . "</p>";
                    print "<div  class='well' id='wellbox'><h4 style='color: black; font-family: verdana;'>" . $row['post'] . "</h4>";
					               print "<a href='other_user.php?username=" . $row['username'] . "'><h4>" . $row['username'] . "</h4></div></a>";
                }
            }
        }
    }
    handle_form($community_name);
    print "</section>";

    print ' <div class="navbar navbar-default navbar-fixed-top text-center" id="bot" style="box-shadow: 0px 2px 5px #888888; border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;">
    <div>

        <a href="connect.php"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true" id="backButton"></span></a>


    </div>
</div>';

}


#creates a form for posting onto communities
function create_form($com){
    $path = strtolower($com . ".php");
    print "<form action = '$path' method='post'><textarea name = 'post' style='color: #2d2d2d; border: 2px solid #2d2d2d; background-color: transparent; outline: none; text-align: center'></textarea><br><br>
        <input type='submit' value = 'POST' id = 'red_input' name='red' placeholder='post to this community'>
        </form></div>";
    print "<style>
        #red_input{
                height: 50px;
                border-radius: 5px;
                border: none;
                background-color: red;
                outline: none;
                transition: .1s;
            }
    </style><br><br>";
}

#handles the form above and inserts info into db.^
function handle_form($com){
    if(isset($_POST['red'])) {
        if (!empty($_POST['post'])) {
            if (strlen($_POST['post']) < 201) {
              $query = "CREATE TABLE $com(
                  date_entered DATETIME,
                  post TEXT,
                  username TEXT,
                  subs TEXT,
                  com_name TEXT
              )";
              mysql_query($query);
              $_POST['post'] = str_replace("'", "\'", $_POST['post']);
              $query = "INSERT INTO $com(date_entered, post, username, com_name) VALUES(
                  NOW(), '{$_POST['post']}', '{$_SESSION['username']}', '{$com}'
              )";
              mysql_query($query);

              $user = $_SESSION['username'];
              $_POST['post'] = str_replace("'", "\'", $_POST['post']);
              $query_two = "INSERT INTO $user(date_entered, posts, username) VALUES(
                  NOW(), '{$_POST['post']}', '{$user}'
              )";
              mysql_query($query_two);
            } else {
              print "<script> alert('Community posts can only be 200 characters at max') </script>";
            }
        }
    }
}

#creates a form for posting onto user account
function create_user_form(){
    $path = 'you.php';
    print "<form action = '$path' method='post'><textarea name = 'post' style='color: #2d2d2d; border: 2px solid black; background-color: transparent; outline: none; text-align: center; font-size: 15px; width: 200px;' placeholder='What do you want to say?'></textarea><br><br>

        <input type='submit' value = 'POST' id = 'red_input' name='red'></input>

    </form>";
}


#creates a form for posting links to your account
function create_user_link_form(){
    $path = 'you.php';
    print "<form action = '$path' method='post'><textarea rows='1' name = 'post' style='color: #2d2d2d;
    border: 2px solid black;
    background-color: transparent;
    outline: none;
    font-size: 15px;
    width: 200px;'
    placeholder='Want to post a link?'></textarea><br><br>
    <p>Make sure to include http:// or https:// at the beginning</p>
    <br>
        <input type='submit' value = 'POST' id = 'red_input' name='link'></input>

    </form>";
}




#handles the form above and inserts info into db.^
function handle_user_form(){
    if (isset($_POST['red'])) {
        if (!empty($_POST['post'])) {
            $user = $_SESSION['username'];
            $_POST['post'] = str_replace("'", "\'", $_POST['post']);
            $query_two = "INSERT INTO $user(date_entered, posts, username) VALUES(
                NOW(), '{$_POST['post']}', '{$user}'
            )";
            $query2 = "SELECT * FROM $user";
            if ($r = mysql_query($query2)) {
                while ($row = mysql_fetch_array($r)) {
                    $sss = $row['subscribed_to_you'];
                    $feed_query = "INSERT INTO $sss(feed, date_entered, feed_name) VALUES(
                        '{$_POST['post']}', NOW(), '{$user}'
                    )";
                    mysql_query($feed_query);
                }
            }
            if (mysql_query($query_two)) {
                header('Location: you.php');
            } else {
                print "<p style='color:white'>sorry bud, we messed up something in the code 8()</p>";
                print mysql_error();
            }
        }
    }
}


#handles the LINK form above and inserts info into db.^
function handle_user_link_form(){
    if (isset($_POST['link'])) {
        if (!empty($_POST['post'])) {
            $user = $_SESSION['username'];
            $_POST['post'] = str_replace("'", "\'", $_POST['post']);
            $_POST['post'] = '<a target="_blank" href ="' . $_POST['post'] . '">' . $_POST['post'] . '</a>';
            $query_two = "INSERT INTO $user(date_entered, posts, username) VALUES(
                NOW(), '{$_POST['post']}', '{$user}'
            )";
            $query2 = "SELECT * FROM $user";
            if ($r = mysql_query($query2)) {
                while ($row = mysql_fetch_array($r)) {
                    $sss = $row['subscribed_to_you'];
                    $feed_query = "INSERT INTO $sss(feed, date_entered, feed_name) VALUES(
                        '{$_POST['post']}', NOW(), '{$user}'
                    )";
                    mysql_query($feed_query);
                }
            }
            if (mysql_query($query_two)) {
                header('Location: you.php');
            } else {
                print "<p style='color:white'>sorry bud, we messed up something in the code 8()</p>";
                print mysql_error();
            }
        }
    }
}

#makes the button to get to user_post.php
function post(){
    print "<a href ='user_post.php'><div id = 'post' style = 'color: black; opacity: .8; height: 50px; width: 50px; background-color: red; left: 910px; top: 12px; border-radius: 100px; border: 2px solid white; position: fixed; transition: .2s'></div></a>";
    print "<style>#post:hover{box-shadow: 2px 4px white}</style>";
}

?>
