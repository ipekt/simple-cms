<?php 

header('Location: update-record.php');

require('../mysqli_connect.php');
  // basic form input sanitazation 
  function filterData ($data) {
    $data = trim(strip_tags($data));
    return  $data;
  };


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['title'])) {
      $title = filterData($_POST['title']);
    } else {
      $title = null;
    }

    if (!empty($_POST['article'])) {
      $article = filterData($_POST['article']);
    } else {
      $article = null;
    }
  }

  $query = "INSERT INTO article_info (title, article) VALUES ('$title', '$article')";

  $respond = mysqli_query($dbc, $query);

  if ($respond) {
    echo "wihu";
  } else  {
    echo "error :/";
  }

  mysqli_close($dbc);

