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
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'page2':
                        include_once 'include/page2.php';
                        break;
                    default:
                        echo 'Default case';
                        break;
                }
            } else {
                include_once 'include/page1.php';
            }
            ?>
        </div>
    </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>