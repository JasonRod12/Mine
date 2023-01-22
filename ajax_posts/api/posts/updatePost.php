<?php
include_once "../../includes/Database.php";
include_once "../../models/Posts.php";

// Upload db and posts file
$database=new Database();
$db=$database->getConnection();
$post=new Posts($db);


$post->post_id=$_POST['edit_post_id'];
$post->post_name=$_POST['edit_post_name'];
$post->post_email=$_POST['edit_post_email'];
$post->post_body=$_POST['edit_post_body'];


if($post->update_one_post()){
  echo json_encode(array(
    'message'=>'Post updated'
  ));
}else{
  echo json_encode(array('message'=>'Post didnt updated'));
}

?>