<?php
require_once "Comment.php";
require_once 'lib/DBBlackbox.php';



$comments = select(null, null, "Comment");
// var_dump(count($comments));
$last_id = count($comments);
if(empty($last_id)) {
    $text = "comment section is empty";
} else {
    delete($last_id); 
};

?>
<h1><?=$text??"DELETED"?></h1>
<a href="index.php">go back</a>