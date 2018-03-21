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
    public $text;
    public $subject;
    public $to;

    public function load_text($filename)
    {
        $this->text = join('',file($filename));
    }

    public static function sayHi()
    {
        echo 'Hi my function sayHi';
    }

    public function send()
    {
        echo $this->to . '<br>';
        echo $this->subject . '<br>';
        echo $this->text . '<br>';
//        mail($this->to, $this->subject, $this->text);
    }

    public function __construct($to, $subject, $text)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->text = $text;
        $this->load_text($this->text);
    }
}

$mes = new Message('user@server.ua', 'Hi', 'message.txt');

//$mes->to = 'user@server.ua';
//$mes->subject = 'Hi';
//$mes->load_text('message.txt');

$mes->send();

Message::sayHi();

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


