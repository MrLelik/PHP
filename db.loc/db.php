<?php
session_start();
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


function getUser($user)
{
    $db = connectDb();

    if ($db) {
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':login', $user, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

function getCountTable($table)
{
    $db = connectDb();

    if ($db) {
        $sql = "SELECT COUNT(*) as count FROM $table";

        return $db->query($sql)->fetchColumn();
    }
}

function search($words)
{
    $db = connectDb();

    if ($db) {
        $sql = "SELECT * FROM articles WHERE CONCAT (title , sub_title , content) LIKE :words";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':words', '%'.$words.'%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}

//$members=$dbh->query("SELECT COUNT(*) as count FROM users")->fetchColumn();
