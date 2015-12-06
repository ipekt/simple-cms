<?php 
$filename = 'include/list.php'; // path from index.php

if (!file_exists($filename)) { // path from other files
  $filename = 'list.php';  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple CMS</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <nav>
    <ul class="nav">
      <li class="nav-item"><a href="index.php" class="orange">Create</a></li>
      <li class="nav-item"><a href="<?php print $filename; ?>">List of Articles</a></li>
    </ul>
  </nav>