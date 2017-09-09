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
    <body style="background-image: url(https://img.buzzfeed.com/buzzfeed-static/static/2014-10/19/5/enhanced/webdr07/enhanced-buzz-wide-28056-1413711847-10.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;" align="center">

            <div class="navbar navbar-default navbar-fixed-top text-center" style="box-shadow: 0px 2px 5px #888888; background-color: #efefef;">
                <h1><img src="favicon.ico" id="p"> lumebin</h1>
            </div>

        <br>
        <br>
        <br>
        <br>

        <div class="well" id="wellbox">
        <form action="login_handle.php" method="post">
                        <h3>username:</h3><input type="text" name = 'username' id = 'inp' placeholder="username" >
                        <h3>password:</h3><input type="password" name = 'password' id = 'inp' placeholder="password">
                        <br>
                        <br>
                        <br>
                        <input type="submit" name="submit" value="LOG IN" id="subd">
        </form>
        </div>

        <a href="create_new.php"><div class="well" id="wellbox"><h3>Create Account</h3></div></a>

        <a href='about.html'><div class="well" id="wellbox"><h3>about</h3></div></a>

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
