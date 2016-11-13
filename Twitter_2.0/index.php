<?php
session_start();
if($_SESSION['logIn']==true){
    header("location:../View/main.php");
}else{
    header("location:../View/landingPage.php");
}

?>