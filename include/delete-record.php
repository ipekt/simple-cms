<?php 
require '../mysqli_connect.php'; 

$post_data = file_get_contents('php://input'); 
$data = json_decode($post_data, true);
$id = (integer) $data;

// Delete record
$query = "DELETE FROM article_info WHERE id = '$id' ";
$respond = mysqli_query($dbc, $query);

  if ($respond) {
    echo $id . ' is accepted';
  } else  {
    echo "error :/";
  }

  mysqli_close($dbc);

?>