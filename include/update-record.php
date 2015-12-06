<?php 
require 'header.php';
require '../mysqli_connect.php'; 

// User arrived here by clicking CREATE entry
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  // Get the most recent data from db
  $query = "SELECT * FROM article_info ORDER BY id DESC LIMIT 1";
}
// User arrived here by clicking UPDATE button on list
else {
  $formId = $_POST['id'];
  $query = "SELECT * FROM article_info WHERE id = '$formId'";
}

$result = mysqli_query ($dbc, $query); 

if ($result):

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):
    $id = $row['id'];
    $title = $row['title'];
    $article = $row['article'];
?>

  <div class="wrapper">
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <h1 class="saved">Update the entry</h1>
    <?php else: ?>
    <h1 class="saved">Entry is saved</h1>
  <?php endif; ?>

    <form action="process.php" method="post">
      <label for="title">Title</label>
      <input type="text" name="id" value="<?php print $id; ?>" class="hidden">
      <input type="text" name="title" id="title" value="<?php print $title; ?>">

      <label for="article">Article</label>
      <textarea name="article" id="article" cols="30" rows="10"><?php print $article; ?></textarea>

      <button type="submit" class="btn-submit ">Update</button>
    </form>
  </div>
  <?php endwhile;
  endif; 
  ?>

</body>
</html>

 
