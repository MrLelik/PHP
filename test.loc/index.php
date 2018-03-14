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
        echo $this->to;
        echo $this->subject;
        echo $this->text;
//        mail($this->to, $this->subject, $this->text);
    }
}

$mes = new Message;

$mes->to = 'user@server.ua';
$mes->subject = 'Hi';
$mes->load_text('message.txt');

$mes->send();