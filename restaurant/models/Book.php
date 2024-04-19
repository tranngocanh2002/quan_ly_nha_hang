<?php
require_once 'models/Model.php';
class Book extends Model {
    public $id;
    public $full_name;
    public $date;
    public $people;
    public $email;
    public $phone;
    // public $status;
    public $message;
    public $created_at;
    public $updated_at;
    public $str_search = '';
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO book(full_name, date,people, email, phone, message) 
                                VALUES (:full_name, :date, :people, :email, :phone, :message)");
        $arr_insert = [
            ':full_name' => $this->full_name,
            ':date' => $this->date,
            ':people' => $this->people,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':message' => $this->message,
            // ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }
    
    public function outSet() {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM sets WHERE status = 1 ORDER BY max ASC");
        $obj_select->execute();
        $sets = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $sets;
    }
}