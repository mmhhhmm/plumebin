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
    <body style="background-image: url(http://www.theyrjournal.com/wp-content/uploads/bb-plugin/cache/pexels-photo-30360-landscape.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;" align="center">

            <div class="navbar navbar-default navbar-fixed-top text-center" style="box-shadow: 0px 2px 5px #888888; background-color: #efefef;">
                <h1><img src="favicon.ico" id="p"> lumebin</h1>
            </div>

        <br>
        <br>
        <br>
        <br>

        <div class="well" id="wellbox" style="margin: 0 auto; background-color: #efefef; width: 300px; margin: 0 auto;">
        <form action="login_handle.php" method="post">
                  <h3>Username</h3><input type="text" name = 'username' id = 'inp' placeholder="Enter Username Here">
                  <h3>Password</h3><input type="password" name = 'password' id = 'inp' placeholder="Enter Password Here">
                  <br>
                  <br>
                  <br>
                  <input type="submit" name="submit" value="Log In" id="subd">
        </form>
        </div>


        <br>
        <a href="create_new.php"><div style="background-color: #efefef; width: 300px; margin: 0 auto;" class="well" id="wellbox"><h3>Create Account</h3></div></a>
        <br>
        <a href='about.html'><div class="well" id="wellbox" style="margin: 0 auto; background-color: #efefef; width: 300px;"><h3>About Plumebin</h3></div></a>
        <br>
        </div>

       <!--
        <script>
        function notifyMe() {
    // Let's check if the browser supports notifications
    if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
    }
    // Let's check if the user is okay to get some notification
    else if (Notification.permission === "granted") {
        // If it's okay let's create a notification
        var notification = new Notification("Welcome to Plumebin!");
    }
    // Otherwise, we need to ask the user for permission
    // Note, Chrome does not implement the permission static property
    // So we have to check for NOT 'denied' instead of 'default'
    else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
            // Whatever the user answers, we make sure Chrome stores the information
            if (!('permission' in Notification)) {
                Notification.permission = permission;
            }
            // If the user is okay, let's create a notification
            if (permission === "granted") {
                var notification = new Notification("Welcome to Plumebin!");
            }
        });
    }
    // At last, if the user already denied any notification, and you
    // want to be respectful there is no need to bother him any more.
}
        notifyMe();
        </script>
        -->
        <?php
        error_reporting(0);
        session_start();
        if ($_SESSION['username']) {
            header("location: welcome.php");
        }
         ?>
    </body>
</html>
