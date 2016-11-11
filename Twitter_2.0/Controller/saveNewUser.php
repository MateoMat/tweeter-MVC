<?php

session_start();
require_once '../Model/Database.php';
require_once '../Model/User.php';

$conn = Database::createConnection();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['newName']) && isset($_POST['newEmail']) && isset($_POST['newPwd'])) {
        $newUser = $_POST['newName'];
        $newEmail = $_POST['newEmail'];
        $newPwd = password_hash($_POST['newPwd'], PASSWORD_BCRYPT);

        $new = new User();
        $new->setEmail($newEmail);
        $new->setUserName($newUser);
        $new->setPassword($newPwd);
        echo $new->getUserName();
        echo $new->getEmail();
        echo $new->getPassword();
        
        
        $save = $new->saveToDbUser($conn);

        if ($save == true) {
            echo "Wszystko jest o.k.";
        } else {
            echo "Coś poszło nie tak";
        }
    }
}

