<?php

// Initialize the session
session_start();
 
// verificam daca user-ul este logat, iar, daca nu, il redirectionam la pagina  de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
#include('iground/index.html');
?>
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
    obj.style.width = obj.contentWindow.document.documentElement.scrollWidth + 'px';
  }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to our ecosite</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="icon" href="/img/favicon.png">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>

<body>
    <iframe src="iground/irig.php" frameborder="0" scrolling="no" width=100% height=100% title="iground"></iframe>
</body>
</html>
