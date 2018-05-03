<?php

function connectDb()
{
    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'custom_blog';
    $db_user = 'admin';
    $db_pass = '123';
    $charset = 'utf8';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
        $dbh = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
        return $dbh;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}


function getArticles()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}

