<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>view notes | Plumebin</title>
        <link rel="stylesheet" href="notes.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body align='center'>
        <div class = 'sidebar'>
            <a href = "welcome.php"><div  class = 'inner_buttons' style="background-color: lightgreen; border-radius: 10px; margin: auto; margin-top: 35px;"></div></a>
            <a href = "find.php"><div  class = 'inner_buttons' style="background-color: yellow; border-radius: 10px; margin: auto; margin-top: 35px;"></div></a>
            <a href = "user_post.php"><div  class = 'inner_buttons' style="background-color: red; border-radius: 10px; margin: auto; margin-top: 35px;"></div></a>
        </div>

        <style media="screen">
            .sidebar{
                position: absolute;
                height: 250px;
                width: 60px;
                background-color: white;
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
                margin-top: 10px;
                opacity: .5;
                transition: .2s;
                position: fixed;
            }

            .sidebar:hover{
                opacity: 1;
            }

            .inner_buttons{
                height: 40px;
                width: 40px;
                transition: .4s;
            }

            .inner_buttons:hover{
                transform: rotate(-90deg);
                box-shadow: -2px 2px black;;
            }
        </style>
        <?php
        @mysql_connect('localhost', 'emilio2', 'k421k421');;
        @mysql_select_db('spade');
        session_start();
        $account = $_SESSION['username'];
        $query = "SELECT * FROM $account";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (!empty($row['notes_title']) AND !empty($row['notes_body'])) {
                    print "<div style ='border: 2px red solid;
                                        border-radius: 10px;
                                        width: 900px;
                                        margin: auto;
                                        margin-top: 20px;
                                        '><h3 style = 'color: white;
                                                       font-family: sans-serif;'>{$row['notes_title']}</h3>
                                                       <p style = 'color: white; font-family: sans-serif;'>{$row['notes_body']}</p></div>";
                }
            }
        }
        mysql_close();
        ?>
    </body>
    </html>
    <?php
    include('footer.html');
    ?>
