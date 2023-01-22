<?php

class Posts{
  
  private $conn;
  public $table_name = "posts";
  public $post_id;
  public $post_name;
  public $post_email;
  public $post_body;

  public function __construct($db){
    $this->conn=$db; 
  }

  //Create post
  public function createPost(){
              
  $query='INSERT INTO '. $this->table_name .' SET post_name=:post_name,post_email= :post_email,post_body= :post_body';
  $stmt=$this->conn->prepare($query);
  
  $this->post_name=htmlspecialchars(strip_tags($this->post_name));
  $this->post_email=htmlspecialchars(strip_tags($this->post_email));
  $this->post_body=htmlspecialchars(strip_tags($this->post_body));
  
  $stmt->bindParam(':post_name',$this->post_name);
  $stmt->bindParam(':post_email',$this->post_email);
  $stmt->bindParam(':post_body',$this->post_body);
  
  if ($stmt->execute()){
    return true;
  }
  else{
  printf("error!!!!");
  return false;
}
}
  public function readAllPosts(){
    $query='SELECT post_id,post_name,post_email,post_body FROM '. $this->table_name.' ORDER BY post_id DESC ';
    $stmt=$this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
    
}
public function readSinglePost(){

$query='SELECT post_id,post_name,post_email,post_body FROM ' . $this->table_name . ' WHERE post_id=:post_id';


$stmt=$this->conn->prepare($query);
$stmt->bindParam(':post_id',$this->post_id);

$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$this->post_id=$row['post_id'];
$this->post_name=$row['post_name'];
$this->post_email=$row['post_email'];
$this->post_body=$row['post_body'];

}


public function update_one_post(){
  
  $query='UPDATE '. $this->table_name .' SET post_name= :post_name,post_email=:post_email,post_body=:post_body
  WHERE post_id= :post_id';
  $stmt=$this->conn->prepare($query);
  
  $this->post_id=htmlspecialchars(strip_tags($this->post_id));
  $this->post_name=htmlspecialchars(strip_tags($this->post_name));
  $this->post_email=htmlspecialchars(strip_tags($this->post_email));
  $this->post_body=htmlspecialchars(strip_tags($this->post_body));
  
  $stmt->bindParam(':post_id',$this->post_id);
  $stmt->bindParam(':post_name',$this->post_name);
  $stmt->bindParam(':post_email',$this->post_email);
  $stmt->bindParam(':post_body',$this->post_body);


  if ($stmt->execute()){
    return true; 
  }
  else{
  printf("error!!!!");
  return false;
}
}

public function deletePost(){
  $query='DELETE FROM '. $this->table_name .' WHERE post_id=:post_id';
  
  $stmt=$this->conn->prepare($query);
  $stmt->bindParam(':post_id',$this->post_id);
  
  if($stmt->execute())
  {
    return true;
  }else{
    printf('ERRORR!!!!');
    return false;
  }
  
}





}





?>