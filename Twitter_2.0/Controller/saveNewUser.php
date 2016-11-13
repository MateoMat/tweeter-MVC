<?php
session_start();
require_once '../Model/Database.php'; //dołączona klasa Database
require_once '../Model/User.php'; //dołączona klasa User

$conn = Database::createConnection();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['newName']) && isset($_POST['newEmail']) && isset($_POST['newPwd'])) {
        $newUser = $_POST['newName'];
        $newEmail = $_POST['newEmail'];
        $newPwd = password_hash($_POST['newPwd'], PASSWORD_BCRYPT);

        $new = new User(); //tworzy obiekt User
        $new->setEmail($newEmail); //ustawia email obiektu
        $new->setUserName($newUser); //ustawia imię obiektu
        $new->setPassword($newPwd); // ustawia hasło obiektu


        $save = $new->saveToDbUser($conn); //zapisuje obiket User do bazy

        $sql = 'SELECT * FROM `users` WHERE `email`="'.$newEmail.'"';
        $check = $conn->query($sql); // odpytujemy, czy użytkownik jest w bazie
        
        if ($check) {

            $password = '';
            $name = '';
            $mail = '';
            $id = '';

            foreach ($check as $arr) {
                $password = $arr['password'];
                $name = $arr['username'];
                $mail = $arr['email'];
                $id = $arr['id'];
            }

            $verify = password_verify($_POST['newPwd'], $password);//sprawdzamy, czy hasło jest poprawne
            
            if ($verify) {
                $_SESSION['logIn'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $mail;
                $_SESSION['password'] = $password;
                $_SESSION['id'] = $id;
                $_SESSION['wrongEmail']=false; //ustawiamy sesję na false - wszystko gra
                header('location:../View/main.php');
            }else{
                $_SESSION['wrongEmail']=true; // jeżeli hasła się nie pokrywają - zwracamy false
                header('location:../View/newUserRegisterForm.php');
            }
            
            
            
        } else {
            echo "Coś poszło nie tak";
        }
    }
}


    