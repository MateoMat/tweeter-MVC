<?php

//klasa do obsługi tabeli Tweet

class Tweet {

    private $id = -1;
    private $userID;
    private $message;
    private $creationDate;
    private $userName;

    public function __construct() {
        $this->id = -1;
        $this->userID = 0;
        $this->message = "";
        $this->creationDate = "";
        $this->userName = "";
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->getUserId;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setUserId($set) {
        $this->userID = $set;
    }

    public function setMessage($set) {
        $this->message = $set;
    }

    public function setCreationDate($set) {
        $this->creationDate = $set;
    }

    static public function loadTweetById(mysqli $conn, $id) {
        //returning Tweets of selected id;
        $sql = 'SELECT * FROM `Tweet` WHERE `id`=' . $id . '';
        $result = $conn->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->userID = $row['userID'];
            $loadedTweet->message = $row['message'];
            $loadedTweet->creationDate = $row['creationDate'];

            return $loadedTweet;
        }
        return false;
    }

    static public function loadAllTweetByUserId(mysqli $conn, $userId) {
//returning all tweets of UserId
        $sql = "SELECT * FROM `Tweet` WHERE `user_id`='$userId' ORDER BY `creation_date` DESC";
        
        $ret = [];
        $result = $conn->query($sql);
        if ($result == true && $result->num_rows >= 1) {
            foreach ($result as $arr) {
                $loadAllTweetsById = new Tweet();
                $loadAllTweetsById->id = $arr['id'];
                $loadAllTweetsById->userID = $arr['user_id'];
                $loadAllTweetsById->message = $arr['message'];
                $loadAllTweetsById->creationDate = $arr['creation_date'];

                $ret[] = $loadAllTweetsById;
            }
        }
        return $ret;
    }

    static public function loadAllTweets(mysqli $conn) {
        $sql = "SELECT * FROM `Tweet` JOIN `users` ON `Tweet`.`user_id`=`users`.`id` ORDER BY `creation_date` DESC";
        $retr = [];
        $result = $conn->query($sql);
        if ($result == true) {
            foreach ($result as $arr) {
                $loadAllTweets = new Tweet();
                $loadAllTweets->creationDate = $arr['creation_date'];
                $loadAllTweets->id = $arr['id'];
                $loadAllTweets->userID = $arr['user_id'];
                $loadAllTweets->userName = $arr['username'];
                $loadAllTweets->message = $arr['message'];

                $retr[] = $loadAllTweets;
            }
        }
        return $retr;
    }

    public function saveTweetToDB(mysqli $conn) {
        //saving Tweet to db
        if ($this->id == -1) {
            $sql = "INSERT INTO `Tweet`(`user_id`,`message`) VALUES (' $this->userID','$this->message')";
            
            $result = $conn->query($sql);
            //header('location:../index.php');
        } else {
            $sql = "UPDATE `Tweet` SET `message`='$this->message',`user_id`='$this->userID' WHERE `id`='$this->id'";
            $result = $conn->query($sql);
            //header('location:../index.php');
        }
    }

    public function deleteTweet(mysqli $conn) {
        if ($this - id != -1) {
            $sql = 'DELETE FROM `Tweet` where `id`=' . $this->id . '';
            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }

}
