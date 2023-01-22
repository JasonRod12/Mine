<?php
include_once "../../includes/Database.php";
include_once "../../models/Posts.php";

// Upload db and posts file
$database=new Database();
$db=$database->getConnection();

$post=new Posts($db);

  $result=$post->readAllPosts();
  $num=$result->rowCount();

  if($num>0){
    $post_arr=array();
    $post_arr['data']=array();

    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $post_item=array(
        'post_id'=>$post_id,
        'post_name'=>$post_name,
        'post_email'=>$post_email,
        'post_body'=>$post_body,
      );
      array_push($post_arr['data'],$post_item);
    }
    echo json_encode($post_arr);
    
  }else{
    echo json_encode(array('message'=>'No post found'));
  }
?>