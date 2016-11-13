<?php
session_start();
if($_SESSION['logIn']==true){
    header("location:../View/main.php");
}else{
    header("location:../View/landingPage.php");
}
require '../Model/Database.php';
$conn = Database::createConnection();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['email']) && isset($_POST['pwd'])) {
//        $inputPassword = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
       $sql = 'SELECT * FROM `users` WHERE `email`="' . $_POST['email'] . '"';
       // $sql = "SELECT `password` FROM `users` WHERE `email`=(?)";
        //$check = $conn->prepare($sql);
        //$check->bind_param('s', $_POST['email']);
        //$check->execute();
        //var_dump($check);
        $check = $conn->query($sql);
        $password = '';
        $name='';
        $mail='';
        $id='';

        foreach ($check as $arr) {
            $password = $arr['password'];
            $name = $arr['username'];
            $mail = $arr['email'];
            $id = $arr['id'];
        }

        $verify = password_verify($_POST['pwd'], $password);
        if ($verify) {
            $_SESSION['logIn'] = true;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $mail;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $id;
            $_SESSION['error']=false;
            header('location:../View/main.php');
        } else {
            $_SESSION['error']=true;
        }
    }
}

$conn->close();
$conn = null;



?>


