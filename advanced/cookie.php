<?php
setcookie("username", "John", time() + (86400 * 30), "/");
session_start();
$_SESSION
["favcolor"] = "green";
?>