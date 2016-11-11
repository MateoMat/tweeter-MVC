<?php

class Comment {

    private $id;
    private $id_user;
    private $id_post;
    private $creation_date;
    private $text;

    public function __construct() {

        $this->id = -1;
        $this->id_user = 0;
        $this->id_post = 0;
        $this->creation_date = "";
        $this->text = "";
    }

    public function getId() {
        return $this->id;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function getIdPost() {
        return $this->id_post;
    }

    public function getCreationDate() {
        return $this->creation_date;
    }

    public function getText() {
        return $this->text;
    }

    public function setIdUser($idUser) {
        $this->id_user = $idUser;
    }

    public function setIdPost($idPost) {
        $this->id_post;
    }

    public function setCreationDate($creationDate) {
        $this->creation_date = $creationDate;
    }

    public function setText($text) {
        $this->text = $text;
    }

    static public function loadCommentByUserId(mysqli $conn, $user_id) {
        $sql = "SELECT * FROM `comments` WHERE `user_id`=" . $user_id . " ORDER BY `creation_date` DESC";
        $retr = [];
        $result = $conn->query($sql);

        if ($result == true) {
            foreach ($result as $arr) {
                $loadCommentById = new Comment();
                $loadCommentById->id = $arr['id'];
                $loadCommentById->id_user = $arr['id_user'];
                $loadCommentById->id_post = $arr['$id_post'];
                $loadCommentById->creation_date = $arr['creation_date'];
                $loadCommentById->text = $arr['text'];

                $retr [] = $loadCommentById;
            }
        }
        return $retr;
    }

    static public function loadAllCommentsByPostId(mysqli $conn, $post_id) {
        $sql = "SELECT * FROM `comments` WHERE `post_id`=" . $post_id . "ORDER BY `creation_date` DESC";
        $retr = [];
        $return = $conn->query($sql);
        if ($return == true) {
            foreach ($result as $arr) {
                $loadAllCommentsByPostId = new Comment();
                $loadAllCommentsByPostId->id = $arr['id'];
                $loadAllCommentsByPostId->id_user = $arr['id_user'];
                $loadAllCommentsByPostId->id_post = $arr['$id_post'];
                $loadAllCommentsByPostId->creation_date = $arr['creation_date'];
                $loadAllCommentsByPostId->text = $arr['text'];

                $retr [] = $loadAllCommentsByPostId;
            }
        }
        return $retr;
    }

    public function SaveCommentToDB(mysqli $conn) {

        $sql = "INSERT INTO `comments`(`id`, `tweet_id`, `user_id`, `text`) VALUES (DEFAULT,'$this->id_post','$this->id_user,$this->text)";
        $result = $conn->query($sql);
    }

}
