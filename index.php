<?php
require_once("./config/config.php");
require_once('./classes/Database.class.php');
$db = new Database();
//$insertUser = $db->insert("INSERT INTO `users`(`name`,`age`)VALUES(?,?)", ['John Doe', 24]);
//var_dump($insertUser); // return last inserted id

//$getUsers = $db->select("SELECT * FROM `users`");
//echo"<pre>";
//print_r($getUsers);
//echo"</pre>";

$updateUser = $db->update("UPDATE `users` SET `name`=? WHERE `id`=?", ["Update name", 1]) //return true
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include_once("./templates/header.php") ?>
    <div class="container my-3">
        <h1>Hello, world!</h1>
    </div>
    <?php include_once("./templates/footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>