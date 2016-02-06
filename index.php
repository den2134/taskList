<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
//require_once(ROOT.DS.'lib'.DS.'load.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task list</title>
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Add jQuery, Bootstrap and .js -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

</head>
<body>

<div class="container">
    <div class="add">
        <h1>You task list</h1>
        <div id="form">
            <input type="text" name="task" placeholder="New task">
            <button id="sub" type="submit" name="submit" onclick="add()">Add</button>
        </div>
    </div>
    <div id="tasks"></div>
</div>

<!-- Own scripts-->
<script src="js/addToDB.js"></script>
<script src="js/showTasks.js"></script>

</body>
</html>