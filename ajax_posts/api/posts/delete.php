<?php
include_once "../../includes/Database.php";
include_once "../../models/Posts.php";

// Upload db and posts file
$database=new Database();
$db=$database->getConnection();

$post=new Posts($db);

$post->post_id=isset($_GET['post_id']) ? $_GET['post_id'] : die();


if($post->deletePost()){ // if true
  echo json_encode(array(
    'message'=>'Post DELETED'
  ));
}else{                   // if false
  echo json_encode(array(
    'message'=>'Post not DELETED'
  ));
}


//DELETE POST 











?>