<?php
require_once 'db.php';
if (isset($_POST['go'])) {
    echo 'yes';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #search-block-form{
            width:248px;
            height:28px;
            border-radius:15px;
            border:#c9c9c9 solid 1px;
            background:url(images/searchBg.png) left top repeat-x;
        }
        .focus-active{
            border-color:#aaa !important;
            background:#fff !important;
        }
        #search-block-form input{
            padding:0;
            margin:0;
            display:block;
            border:none;
            outline:none;
            background:none;
            width:100%;
            height:100%;
        }
        #search-block-form .form-actions{
            width:28px;
            height:28px;
            float:left;
            background:url(images/searchIcon.png) 5px 2px no-repeat;
        }
        #search-block-form .form-actions input:hover{
            cursor:pointer;
        }
        #search-block-form .form-actions input{
            overflow:hidden;
            text-indent:-9999px;
        }
        #search-block-form .form-item{
            width:210px;
            padding:0px 5px;
            float:right;
            height:28px;
        }
        #search-block-form .form-item input{
            font:13px/16px "Trebuchet MS", Arial, Helvetica, sans-serif;
            color:#222;
            height:auto !important;
            padding:6px 0;
        }
        .placeholder{color:#cbcbcb !important;}
    </style>
</head>
<body>
<div>
    <form action="" method="post" id="search-block-form">
        <div class="form-item">
            <input type="text" name="" value="" maxlength="128" placeholder="Найти...">
        </div>
        <div class="form-actions">
            <input type="submit" name="go" value="Поиск" class="form-submit">
        </div>
    </form>

    <pre>
        <?php
//        $result = getUser('lelik');
//        if (count($result) == 0) {
//            echo 'массив пуст';
//        } else {
//            var_dump($result);
//            echo $result['name'];
//            echo $result['password'];
//        }
//        $_SESSION['key'] = 'hello';
//        if ($_SESSION) {
//            empty('hello');
//        }
//        unset($_SESSION['key']);
//        var_dump($_SESSION);
//        echo ($_SESSION) ? 'yes' : 'No';
        $result = search('test');
        var_dump($result);
        ?>
    </pre>
</div>
</body>
</html>