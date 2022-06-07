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


//// sets the comment

$comment->comment = $_POST["comment"] ?? $comment->comment;
// $comment->nickname = $_POST["nick"] ?? $nickname->nickname;

if ($id) {
    //update if does exists
    update($id, $comment);
}   else {
    $id = insert($comment);
}

header("Location: redirect.php");
