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

class Message
{
    var $text;
    var $subject;
    var $to;

    function load_text($filename)
    {
        $this->text = join('',file($filename));
    }

    function send()
    {
        echo $this->to . '<br>';
        echo $this->subject . '<br>';
        echo $this->text . '<br>';
//        mail($this->to, $this->subject, $this->text);
    }
}

$mes = new Message;

$mes->to = 'user@server.ua';
$mes->subject = 'Hi';
$mes->load_text('message.txt');

$mes->send();

// Тест Массива.
$food = [
    'Борщ' => 'красный',
    'Сосисочки' => true
];

$food['чай'] = 'вдвоем';

echo '<pre>';
print_r($food);




?>
</body>
</html>


