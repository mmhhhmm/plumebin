<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Plumebin | Create New Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="master.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="movement.js" charset="utf-8"></script>
    </head>
    <body style="background-image: url(https://img.buzzfeed.com/buzzfeed-static/static/2014-10/19/5/enhanced/webdr07/enhanced-buzz-wide-28056-1413711847-10.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;" align="center">

            <div class="navbar navbar-default navbar-fixed-top text-center" style="box-shadow: 0px 2px 5px #888888; background-color: #efefef;">
                <h1><img src="favicon.ico" id="p"> lumebin</h1>
            </div>

        <br>
        <br>

        <div class="well" id="wellbox">
    <form action="create_new.php" method="post">
        <h3 class="user">Username:</h3>
        <input type="text" name="username" id = 'inp' placeholder="new username" autofocus="autofocus">
        <br><br><h3 class="user">Email:</h3>
        <input type="text" name="email" id = 'inp' placeholder="your email adress">
        <br><br><h3 class="user">Phone:</h3>
        <input type="text" name="phone_number" id = 'inp' placeholder="10-digit phone number">
        <br><br><h3 class="user">password:</h3>
        <input type="password" name="password" id = 'inp' placeholder="new password">
        <br><br><h3 class = 'pass'>confirm:</h3>
        <input type="password" name="confirm" id = 'inp' placeholder="retype password"><br>
        <br>
        <br>
        <h4 style="font-family: arial"></input>Creating an account means agreeing to our<a href ='tos.html' style="text-decoration: underline"> terms of service</h4></p>
        <br>
        <input type="submit" name="submit" value="CREATE ACCOUNT" id = 'subd'>

    </form>
        </div>

        <a href='about.html'><div class="well" id="wellbox"><h3>about</h3></div></a>
        </div>

        <a href='index.php'><div class="well" id="wellbox"><h3>Already have an account?</h3></div></a>
        </div>


        <?php
session_start();
error_reporting(0);
//encrypts password
$string = $_POST['password'];
$arr = str_split($string);
$blank = array();
foreach ($arr as $key => $value) {
    if ($value == 'a') {
        $blank[] = "!@";
    }
    if ($value == 'b') {
        $blank[] = "G%";
    }
    if ($value == 'c') {
        $blank[] = "XF";
    }
    if ($value == 'd') {
        $blank[] = "CN";
    }
    if ($value == 'e') {
        $blank[] = "EX";
    }
    if ($value == 'f') {
        $blank[] = "%T";
    }
    if ($value == 'g') {
        $blank[] = "ED";
    }
    if ($value == 'h') {
        $blank[] = "F$";
    }
    if ($value == 'i') {
        $blank[] = "4G";
    }
    if ($value == 'j') {
        $blank[] = "BQ";
    }
    if ($value == 'k') {
        $blank[] = "B@";
    }
    if ($value == 'l') {
        $blank[] = "@2";
    }
    if ($value == 'm') {
        $blank[] = "%5";
    }
    if ($value == 'n') {
        $blank[] = "8G";
    }
    if ($value == 'o') {
        $blank[] = "O0";
    }
    if ($value == 'p') {
        $blank[] = "CC";
    }
    if ($value == 'q') {
        $blank[] = "J%";
    }
    if ($value == 'r') {
        $blank[] = "5F";
    }
    if ($value == 's') {
        $blank[] = "1S";
    }
    if ($value == 't') {
        $blank[] = "1&";
    }
    if ($value == 'u') {
        $blank[] = "!M";
    }
    if ($value == 'v') {
        $blank[] = "TT";
    }
    if ($value == 'w') {
        $blank[] = "U8";
    }
    if ($value == 'x') {
        $blank[] = "C+";
    }
    if ($value == 'y') {
        $blank[] = "@$";
    }
    if ($value == 'z') {
        $blank[] = "@#";
    }
    if ($value == ' ') {
        $blank[] = "C&";
    }
    if ($value == '1') {
        $blank[] = "!!";
    }
    if ($value == '2') {
        $blank[] = "@@";
    }
    if ($value == '3') {
        $blank[] = "PJ";
    }
    if ($value == '4') {
        $blank[] = "JD";
    }
    if ($value == '5') {
        $blank[] = "IN";
    }
    if ($value == '6') {
        $blank[] = "@4";
    }
    if ($value == '7') {
        $blank[] = "C$";
    }
    if ($value == '8') {
        $blank[] = "JJ";
    }
    if ($value == '9') {
        $blank[] = "NK";
    }
    if ($value == '0') {
        $blank[] = "##";
    }
}
$final = implode("", $blank);

$go = true;
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['confirm']) OR empty($_POST['email']) OR empty($_POST['email']) OR empty($_POST['phone_number'])) {
        print "<script>alert('Please fill out all sections')</script>";
        $go = false;
    }
    $name = $_POST['username'];
    if ($_POST['password'] !== $_POST['confirm']) {
        print "<script>alert('passwords do not match up')</script>";
        $go = false;
    }
    if (preg_match('/\s/', $_POST['username'])){
        print "<script>alert('username cannot have spaces')</script>";
        $go = false;
    }
    mysql_connect('localhost', 'emilio2', 'k421k421');;
    mysql_select_db('spade');
    $query = 'CREATE TABLE users(
        username TEXT NOT NULL,
        password TEXT NOT NULL
    )';
    mysql_query($query);
    //checks if username exists
    $user_check = "SELECT * FROM users";
    if ($r = mysql_query($user_check)) {
        while ($row = mysql_fetch_array($r)) {
            if ($_POST['username'] == $row['username']) {
                if (strtolower($_POST['username']) == strtolower($row['username'])) {
                	print "<script>alert('Username already exists')</script>";
                	$go = false;
            	}
            }
        }
    }
}
if (strlen($_POST['username']) > 20) {
    $go = false;
    print "<p style = 'color: red; text-align: center; margin-top: 40px; font-family: helvetica; text-transform: uppercase'>username is too long, try a new one</p>";
}

if ((strpos($_POST['username'], "666")) OR (strpos($_POST['username'], ".")) OR (strpos($_POST['username'], "admin666"))) {
    $go = false;
    print "<p style = 'color: red; text-align: center; margin-top: 40px; font-family: helvetica; text-transform: uppercase'>we are sorry but you can't put 666 or dots in your username.</p>";
}

if (isset($_POST['submit'])) {
        if ($go) {
            $query22 = 'CREATE TABLE emails(
                email TEXT
            )';
            mysql_query($query22);

            $emails = "INSERT INTO emails(email) VALUES(
                    '{$_POST['email']}'
            )";
            mysql_query($emails);

            $query_two = "INSERT INTO users(username, password) VALUES(
                '{$_POST['username']}', '{$final}'
            )";
            mysql_query($query_two);
            $query_three = "CREATE TABLE $name(
                date_entered DATETIME,
                posts TEXT,
                subscribed_to_you TEXT,
                subs_count INT,
                subs TEXT,
                username TEXT,
                notifications TEXT,
                chats TEXT,
                pictures LONGBLOB,
                picture_name TEXT,
                feed TEXT,
                feed_name TEXT,
                times TEXT,
                feed_pics LONGBLOB,
                phone_number TEXT
            )";
            mysql_query($query_three);
            $query_128 = "INSERT INTO $name(username, subscribed_to_you, phone_number) VALUES(
                '{$_POST['username']}', '{$_POST['username']}', '{$_POST['phone_number']}'
            )";
            mysql_query($query_128);
            $_SESSION['username'] = $_POST['username'];
            header("Location: welcome.php");
        }
    }
?>
    </body>
</html>
