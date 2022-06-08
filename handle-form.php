<?php
require_once "Comment.php";
require_once 'lib/DBBlackbox.php';

// your code here

$id = $_GET['id']?? null;
var_dump($id); 

if($id) {
    $comment = find($id, "comment");
} else {
    $comment = new Comment;
}

/////Validate!!!!
$valid = true; //everythin is ok
$errors = []; //stores error for user
if (empty($_POST["comment"])) {
    $valid = false;
    $errors[] = "no comment is written";
}

if (empty($_POST["nick"])) {
    $valid = false;
    $errors[] = "pls type your nickname";
}

if(!$valid) {
    if ($id){
        header("Location: index.php?id=" . $id);
    } else {
        header("Location: index.php");
    }

    exit(); //stops execution of the script
}

//// sets the comment

$comment->comment = $_POST["comment"] ?? $comment->comment;
$comment->nickname = $_POST["nick"] ?? $nickname->nickname;

if ($id) {
    //update if does exists
    update($id, $comment);
}   else {
    $id = insert($comment);
}

header("Location: redirect.php");
