<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>log in | Plumebin</title>
        <link rel="stylesheet" href="master.css" media="screen" title="master!" charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="movement.js" charset="utf-8"></script>
    </head>
    <body align ='center'>
        <a href="index.php"><div id = 'back_button'><img id="im" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-ios7-arrow-back-128.png"></div></a>
        <div class="top">
        <h1 style="font-family: 'bungee shade'; color: #82ee7f">Log in</h1>
            <form action="log_in.php" method="post">
                <p class="user">username:</p><input type="text" name = 'username' id = 'user' placeholder="username">
                <p class="pass">password:</p><input type="password" name = 'password' id = 'pass' placeholder="password">
                <br>
                <br>
                <br>
                <br>
                <input id='startBtn' type="submit" name="submit" value="LOG IN" class="submit">
                 <style type="text/css">
            #startBtn {
                color: #FFFFFF;
                background-color: #00FF7C;
                border-radius: 5px;
                box-shadow: 0px 5px 0px 2px white;
                position: relative;
                top: 0px;
            }
            #startBtn:active {
              box-shadow: 0 3px 0 1px white;
              top: 3px;
            }


        </style>
            </form>
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
        print "<p style='font-family: helvetica; color: red;'>you entered something incorrectly, try again</p>";
    }
}
            ?>
        </div>
        <a href="create_new.php"><div id="new_account"><p>create new account</p></div></a>
    </body>
</html>
