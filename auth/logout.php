<?php

session_start();

// menghapus session
session_unset();
$_SESSION = [];

header("location: login.php");
exit;

?>