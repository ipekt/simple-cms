<?php 
require 'include/header.php';
?>

  <div class="wrapper">
    <h1 class="heading">Simple CMS</h1>
    <h2 class="h2-heading">CRUD Exercise</h2>

    <form action="include/process.php" method="post">
      <label for="title">Title</label>
      <input type="text" name="title" id="title">

      <label for="article">Article</label>
      <textarea name="article" id="article" cols="30" rows="8"></textarea>

      <button type="submit" class="btn-submit">Create</button>
    </form>
  </div>
</body>
</html>