<?php

//Klasa do obsługi tabeli User
Class User {

    private $id;
    private $username;
    private $password;
    private $comment_id;
    private $email;

    public function __construct() {
        $this->id = -1;
        $this->userName = "";
        $this->password = "";
        $this->comment_id = "";
        $this->email = "";
    }

    public function getId() {
        return $this->id;
    }

    public function getUserName() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getComment_id() {
        return $this->comment_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setUserName($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    static public function loadUserbyId(mysqli $conn, $id) {
        $sql = 'SELECT * FROM `users` WHERE `id`="' . $id . '"';

        $result = $conn->query($sql);

        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->password = $row['password'];
            $loadedUser->comment_id = $row['comment_id'];
            $loadedUser->email = $row['email'];

            return $loadedUser;
        }
        //return null;
    }

    public function saveToDbUser(mysqli $conn) {
        if ($this->id == -1) {
            $sql = 'INSERT INTO `users`(`username`,`password`,`email`) VALUES("'.$this->username.'","'.$this->password.'","'.$this->email.'")';

            $conn->query($sql);

            if ($conn->query($sql) == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE `users` SET `username`=?, `password` = ?,`email` = ? WHERE `id` = '$this->id'";

            $result = $conn->prepare($sql);
            $result->bind_param('sss', $this->userName, $this->password, $this->email);
            $result->execute();

            if ($result == true) {
                return true;
            }
        }
        //return false;
    }

    static public function loadAllUsers(mysqli $conn) {
        $sql = "SELECT* FROM `users`";
        $userArray = [];
        $result = $conn->query($sql);

        if ($result == true) {
            foreach ($result as $arr) {
                $loadAllUsers = new User();
                $loadAllUsers->id = $arr[id];
                $loadAllUsers->username = $arr['username'];
                $loadAllUsers->email = $arr['email'];
                $loadAllUsers->comment_id = $arr['comment_id'];

                $userArray[] = $loadAllUsers;
            }
        }
        return $userArray;
    }

}
