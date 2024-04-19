<?php
require_once 'models/Model.php';

class Contact extends Model
{
    public $id;
    public $full_name;
    public $subject;
    public $phone;
    public $email;
    public $status;
    public $created_at;
    public $updated_at;

    public $str_search;

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['full_name']) && !empty($_GET['full_name'])) {
            $full_name = addslashes($_GET['full_name']);
            $this->str_search .= " AND contacts.full_name LIKE '%$full_name%'";
        }
    }

    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM contacts ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }


    public function getAllPagination($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM contacts WHERE TRUE $this->str_search
              ORDER BY created_at DESC
              LIMIT $start, $limit");

        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getTotal()
    {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM contacts WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM contacts WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM contacts WHERE username='$username'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO contacts(full_name, subject, phone, email, status)
VALUES(:full_name, :subject, :phone, :email, :status)");
        $arr_insert = [
            ':full_name' => $this->full_name,
            ':subject' => $this->subject,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':status' => $this->status,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE contacts SET full_name=:full_name, subject=:subject, phone=:phone, email=:email, status=:status, updated_at=:updated_at
             WHERE id = $id");
        $arr_update = [
            ':full_name' => $this->full_name,
            ':subject' => $this->subject,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM contacts WHERE id = $id");
        return $obj_delete->execute();
    }

}