<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="./public/images/logo.png"/>
    <title><?= $data['title'] ?: 'Trắc nghiệm trực tuyến'; ?></title>
    <link type="text/css" rel="stylesheet" href="./public/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link type="text/css" rel="stylesheet" href="./public/css/style.css"/>
    <script type="text/javascript" src="./public/js/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once "./mvc/views/pages/menu.php" ?>
<?php require_once "./mvc/views/pages/" . $data["page"] . ".php" ?>
<?php require_once "./mvc/views/pages/footer.php" ?>

<!--Xóa message nếu load lại trang-->
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['error']); ?>

<script>
    // Xóa message sau 3 phút
    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 10000);

</script>
</body>
</html>