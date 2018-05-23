<?php

class ModelBlog extends Model
{
    public function getPosts()
    {
        $data = null;
        try {
            $data = $this->connect()->query("SELECT * FROM articles")->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $data;
    }

    public function getContentOneNews($url)
    {
        $result_one = null;
        try {
            $data = $this->connect()->query("SELECT * FROM articles WHERE url='$url'")->fetch(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $result_one;
    }
}