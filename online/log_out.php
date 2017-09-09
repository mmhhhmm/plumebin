<?php
session_start();
unset($SESSION);
session_destroy();
setcookie('lastchecked', '');
header('Location: index.php');
?>
