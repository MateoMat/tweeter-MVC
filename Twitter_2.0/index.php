<?php

session_start();
if (isset($_SESSION['logIn'])) {
    if ($_SESSION['logIn'] == true) {
        header("location:../View/main.php");
    }
} else {
    header("location:../View/landingPage.php");
}

?>