<?php
include_once "../../includes/Database.php";
include_once "../../models/Posts.php";

// Upload db and posts file
$database=new Database();
$db=$database->getConnection();

$post=new Posts($db);

$post->post_id=isset($_GET['post_id']) ? $_GET['post_id'] : die();


  $post->readSinglePost();
  $post_arr=array('post_id'=>$post->post_id,
  'post_name'=>$post->post_name,
  'post_email'=>$post->post_email,
  'post_body'=>$post->post_body);

  
  echo json_encode($post_arr);

?>