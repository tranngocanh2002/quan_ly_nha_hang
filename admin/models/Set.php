<?php
//models/Category
require_once 'models/Model.php';
class Set extends Model {
    public $id;
    public $max;
    public $amount;
    public $status;
    public $created_at;
    public $updated_at;

    public function insert() {
        $sql_insert =
            "INSERT INTO sets(`max`, `status`)
VALUES (:max,  :status)";
        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':max' => $this->max,
            // ':amount' => $this->amount,
            ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getAll($params = []) {
        $str_search = 'WHERE TRUE';
        if (isset($params['name']) && !empty($params['name'])) {
            $name = $params['name'];
            $str_search .= " AND `name` LIKE '%$name%'";
        }
        if (isset($params['status'])) {
            $status = $params['status'];
            $str_search .= " AND `status` = $status";
        }
        $sql_select_all = "SELECT * FROM categories $str_search";
        $obj_select_all = $this->connection
            ->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all
            ->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function getById($id) {
        $sql_select_one = "SELECT * FROM categories WHERE id = $id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $obj_select_one->execute();
        $category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    public function getCategoryById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM sets WHERE id = $id");
        $obj_select->execute();
        $category = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $category;
    }

    public function update($id)
    {
        $obj_update = $this->connection->prepare("UPDATE sets SET `max` = :max, `status` = :status
         WHERE id = $id");
        $arr_update = [
            ':max' => $this->max,
            // ':amount' => $this->amount,
            ':status' => $this->status,
        ];

        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM sets WHERE id = $id");
        $is_delete = $obj_delete->execute();

        return $is_delete;
    }

    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM sets");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    public function getAllPagination($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM sets LIMIT $start, $limit");

        $obj_select->execute();
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}
