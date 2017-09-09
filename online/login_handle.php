<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Plumebin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="master.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="movement.js" charset="utf-8"></script>
    </head>
    <body>
<?php
            $wrong = false;
mysql_connect('localhost', 'emilio2', 'k421k421');;
mysql_select_db('spade');

if (isset($_POST['submit'])) {
    //decrypter
    $dstring = $_POST['password'];
    $darr = str_split($dstring, 1);
    $blank = array();
    foreach ($darr as $key => $value) {
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
    $check = implode("", $blank);
    
    $_POST['username'] = $_POST['username'];
    
    $query = "SELECT * FROM users";
    mysql_query($query);
    if (empty($_POST['username']) OR empty($_POST['password'])){
        $wrong = true;
    }
    $qq = "SELECT * FROM users";
    if ($r = mysql_query($qq)) {
        while ($row = mysql_fetch_array($r)) {
            if ($row['username'] == $_POST['username']) {
                if ($row['password'] == $check) {
                    session_start();
                    $_SESSION['username'] = $_POST['username'];
                    header('Location: welcome.php');
                } else {
                    $wrong = true;
                }
            } else {
                $wrong = true;
            }
        }
    } else {
        $wrong = true;
    }

    if ($wrong) {
        print "<h2 style='font-family: helvetica; color: red; text-align: center'>You either entered something wrong, or you don't have an account.</h2>";
        print "<br><br><a href='create_new.php'><h3 style='font-family: helvetica; text-align: center'>Create a new account</h3></a><br>";
        print "<h4 style='font-family: helvetica; color: black; text-align: center'>or</h4><br><a href='index.php'>
        <h3 style='font-family: helvetica; text-align: center'>Try again</a></h3>";
    }
}
            ?>
        </body>
    </html>
