<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>notes | Plumebin</title>
        <link rel="stylesheet" href="notes.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>

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

        <a href = 'new_note.php'><div class="newnote">
            <h3>CREATE NEW</h3>
        </div></a>

        <a href = 'view_note.php'><div class="viewnote">
            <h3>MY NOTES</h3>
        </div></a>
    </body>
</html>
<?php
include('footer.html');
?>
