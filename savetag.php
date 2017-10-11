<?php
require('config.php');
conectar();



if( !empty( $_POST['type'] ) && $_POST['type'] == "insert" )
{
  $id = $_POST['pic_id'];  
  $name = $_POST['name'];
  $pic_x = $_POST['pic_x'];
  $pic_y = $_POST['pic_y'];
  

  $sql = "INSERT INTO image_tag (pic_id,name,pic_x,pic_y) VALUES ( $id, '$name', $pic_x, $pic_y)";
  $qry = mysql_query($sql);
}



if( !empty( $_POST['type'] ) && $_POST['type'] == "remove")
{
  $tag_id = $_POST['tag_id'];
  $sql = "DELETE FROM image_tag WHERE id = '".$tag_id."'";
  $qry = mysql_query($sql);
}



?>
