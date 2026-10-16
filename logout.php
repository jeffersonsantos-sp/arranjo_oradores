<?php
session_start();
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
session_destroy();
header("Location: index.php");
exit;
?>
