<?php

session_start();

require '../Model/Database.php';
require '../Model/User.php';
$conn = Database::createConnection();
$user = User::loadUserbyId($conn, $_SESSION['id']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name'])) {

        $name = $_POST['name'];

        $sql = 'UPDATE `users` SET `username`="' . $name . '" WHERE `id`="' . $_SESSION['id'] . '"';
        $result = $conn->query($sql);
        if ($result) {
            echo "Dane zostały zmienione";
            $_SESSION['name'] = $_POST['name'];
            header('location:../View/main.php?page=userEdit');
        } else {
            echo 'ups. Jest Problem. Zawołaj Mateusz';
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email'])) {

        $email = $_POST['email'];
        $sql = 'UPDATE `users` SET `email`="' . $email . '" WHERE `id`="' . $_SESSION['id'] . '"';
        $result = $conn->query($sql);
        if ($result) {
            echo "Dane zostały zmienione";
            $_SESSON['email'] = $_POST['email'];
            header('location:../View/main.php?page=userEdit');
        } else {
            echo 'ups. Jest Problem. Zawołaj Mateusz';
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['pwd'])) {
        $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);

        $sql = 'UPDATE `users` SET `password`="' . $pwd . '" WHERE `id`="' . $_SESSION['id'] . '"';
        $result = $conn->query($sql);
        if ($result) {
            echo "Dane zostały zmienione";
            $_SESSON['pwd'] = $_POST['pwd'];
            header('location:../View/main.php?page=userEdit');
        } else {
            echo 'ups. Jest Problem. Zawołaj Mateusz';
        }
    }
}
?>