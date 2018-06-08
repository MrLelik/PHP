<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Get</title>
    <style>
        body {
            background-color: #5e5e5e;
        }
        .myClass {
            margin-top: 200px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 myClass">
            <form action="/" class="form-horizontal" id="form1" role="form" method="post">
            <?php
            if (isset($_POST['page2'])) {
                include_once 'include/page2.php';
            } elseif (isset($_POST['page1'])) {
                include_once 'include/page1.php';
            } elseif (isset($_POST['page3'])) {
                include_once 'include/page3.php';
            } else {
                include_once 'include/page1.php';
            }
            ?>
            </form>
        </div>
    </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>
<?php
if (isset($_POST['name']) && !empty($_POST['name'])) {
    $_SESSION['name'] = (isset($_POST['name'])) ? $_POST['name'] : '';
    $_SESSION['surname'] = (isset($_POST['surname'])) ? $_POST['surname'] : '';
}

if (isset($_POST['day']) && !empty($_POST['day'])) {
    $_SESSION['day'] = (isset($_POST['day'])) ? $_POST['day'] : '';
    $_SESSION['month'] = (isset($_POST['month'])) ? $_POST['month'] : '';
    $_SESSION['year'] = (isset($_POST['year'])) ? $_POST['year'] : '';
}

if (isset($_POST['colour']) && !empty($_POST['colour'])) {
    $_SESSION['colour'] = (isset($_POST['colour'])) ? $_POST['colour'] : '';
    $_SESSION['number'] = (isset($_POST['number'])) ? $_POST['number'] : '';
    $_SESSION['game'] = (isset($_POST['game'])) ? $_POST['game'] : '';
}
?>