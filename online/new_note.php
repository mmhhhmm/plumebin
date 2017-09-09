<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>new note | Plumebin</title>
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
        <form action="new_note.php" method="post">
            <h4>Title</h4><input type="text" name="title" id = 'titleinput'>
            <h4>Note</h4><textarea name="body" rows="8" cols="40" id = 'bodyinput'></textarea><br><br>
            <input type="submit" name="submit" value="add" id='submit'>
        </form>
        <?php
        session_start();
            $no = false;
            if (isset($_POST['submit'])) {
                if (empty($_POST['title']) OR empty($_POST['body'])) {
                    print "<p style = 'color: red'>PLEASE FILL IN THE TITLE AND BODY TEXT</p>";
                }
                $len = strlen($_POST['body']);
                if ($len > 210) {
                    print "<p style = 'color: red'>NOTE IS TO LONG</p>";
                    $no = true;
                }
            }
            mysql_connect('localhost', 'emilio2', 'k421k421');;
            mysql_select_db('spade');
            if (isset($_POST['submit'])){
                if (!empty($_POST['title']) AND !empty($_POST['body'])) {
                    if ($no == false) {
                        //this is so you can use this: ' in your notes
                        $_POST['title'] = str_replace("'", "\'", $_POST['title']);
                        $_POST['body'] = str_replace("'", "\'", $_POST['body']);
                        $query_two = "INSERT INTO {$_SESSION['username']} (notes_title, notes_body) VALUES(
                            '{$_POST['title']}', '{$_POST['body']}')";
                        header('Location: view_note.php');
                    }
                }
            }
            mysql_query($query_two);
            mysql_close();
        ?>
    </body>
    </html>
    <?php
    include('footer.html');
    ?>
