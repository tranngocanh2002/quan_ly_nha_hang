<?php
require_once 'models/Model.php';
class Category extends Model {
    public function getAll()
    {
        $sql_select_all = "SELECT * FROM categories WHERE `status` = 1 ORDER BY loca ASC LIMIT 10" ;
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function getId()
    {
        $sql_select_all = "SELECT id FROM categories WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }


    public function listData()
    {
        $sql_select_all = "SELECT * FROM categories";

        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();

        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

}