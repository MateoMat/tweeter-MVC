<?php

session_start();

if ($_SESSION['logIn'] == false) {
    
    ob_start();
    header('location:../index.php');
}

require_once '../Model/Tweet.php';
require_once '../Model/Database.php';
$conn = Database::createConnection();


if ($_SERVER[REQUEST_METHOD] == 'POST') {
    if (isset($_POST['newTweet'])) {
        $newTweet = new Tweet;
        $newTweet->setUserId($_SESSION['id']);
        $newTweet->setMessage($_POST['newTweet']);
        $newTweet->saveTweetToDB($conn);
    }
}

header('location:../View/main.php');