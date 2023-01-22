<?php
include_once "../../includes/Database.php";
include_once "../../models/Posts.php";

// Upload db and posts file
$database=new Database();
$db=$database->getConnection();

$post=new Posts($db);

//Get post data

//$post->post_id=$_POST['post_id'];
$post->post_name=$_POST['post_name'];
$post->post_email=$_POST['post_email'];
$post->post_body=$_POST['post_body'];

if($post->createPost()){      // if true
  echo json_encode(array(
    'message'=>'Post created'
  ));
}else{                       // if true
  echo json_encode(array(
    'message'=>'Post not created'
  ));
}

?>