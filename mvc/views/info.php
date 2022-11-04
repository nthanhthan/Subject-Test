<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch sử thi</title>
    <link type="text/css" rel="stylesheet" href="./public/css/bootstrap.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link type="text/css" rel="stylesheet" href="./public/css/info/style.css" />
    <link type="text/css" rel="stylesheet" href="./public/css/style.css" />
    <script type="text/javascript" src="./public/js/jquery-3.6.0.min.js"></script>
    <script src="./public/js/popper.js"></script>
    <script type="text/javascript" src="./public/js/bootstrap.js"></script>
    <script src="./public/js/main.js"></script>
    <link rel="icon" type="image/png" href="./public/images/logo.png"/>
</head>
<body>
<?php require_once "./mvc/views/pages/menu.php" ?>
<?php require_once "./mvc/views/pages/".$data["page"].".php" ?>
<?php require_once "./mvc/views/pages/footer.php" ?>
</body>
</html>