<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

require "template.php";

$USER = "Лёлик";
$LAST = "05.02.2018";
$REG_DATE = "01.01.2018";
$MESSAGES = 34;
$PERSONAL = 0;

$tpl->get_tpl('welcome.tpl');

$tpl->set_value('USER',$USER);
$tpl->set_value('LAST',$LAST);
$tpl->set_value('REG_DATE',$REG_DATE);
$tpl->set_value('MESSAGES',$MESSAGES);
$tpl->set_value('PERSONAL',$PERSONAL);

$tpl->tpl_parse();

echo $tpl->html;
?>
</body>
</html>
