<?php
require_once 'models/Model.php';
class Contact extends Model {
    public $id;
    public $full_name;
    public $subject;
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
            ->prepare("INSERT INTO contacts(full_name, subject, email, phone, message) 
                                VALUES (:full_name, :subject, :email, :phone, :message)");
        $arr_insert = [
            ':full_name' => $this->full_name,
            ':subject' => $this->subject,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':message' => $this->message,
            // ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }

}