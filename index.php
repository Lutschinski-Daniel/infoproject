<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['current_lecture_bez'])) {
    unset($_SESSION['current_lecture_bez']);
}
require_once 'db/db_connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crexam</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- INCLUDE BOOTSTRAP -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="themes/css/custom.css">
    </head>
    <body>
        <?php
        include_once 'php\header.php';
        include_once 'php\body.php';
        include_once 'php\footer.php';
        ?>
        <div class="global-message-div">HALLO!</div>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
