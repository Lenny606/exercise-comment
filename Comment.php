<?php

class Comment {
   public $comment = null;
   public $nickname = null;

    public function __construct($comment = null, $nickname=null)
    {
        $this->comment = $comment;
        $this->nickname= $nickname;
       
    }



}