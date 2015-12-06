<?php require 'header.php'; ?>
<div class="wrapper">
  <ul>
<?php 

require '../mysqli_connect.php'; 

// Get a list of articles
$query = "SELECT * FROM article_info ORDER BY id DESC";
$result = mysqli_query ($dbc, $query); 

if ($result):

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):
    $id = $row['id'];
    $title = $row['title'];
    $article = $row['article'];
?>
<li class="list" data-id="<?php print $id; ?>">
  <article class="list-article">
    <h2><?php print $title; ?></h2>
      <p><?php print $article; ?></p>
      <form action="update-record.php" method="post">
        <input type="text" name="id" id="id" class="hide" value="<?php print $id; ?>">
        <button type="button" class="btn-submit delete" data-id="<?php print $id; ?>">Delete</button>
        <button type="submit" class="btn-submit margin">Update</button>
      </form>
  </article>
</li>
  
<?php endwhile;
  endif; 
?>
</ul>
</div>
<script>
  function ready(fn) {
    if (document.readyState != 'loading'){
      fn();
    } else {
      document.addEventListener('DOMContentLoaded', fn);
    }
  }

  var fn = function () {

    var btn = document.querySelectorAll('.delete');
    for (var i = 0; i < btn.length; i++) {
       btn[i].addEventListener('click', deleteRecord);   
    }
   

    function deleteRecord(el) {
      var id = el.srcElement.getAttribute('data-id');

      var request = new XMLHttpRequest();
      request.open('POST', './delete-record.php', true);

      request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
          var resp = request.responseText;
          // delete record from UI
          var list = document.querySelector("li[data-id='" + id + "']")
          list.classList.add('animate');
          setTimeout(function(){
            list.classList.add('hide');
          }, 1500);
        } else {
          document.write('Could not delete the record. Try again');
        }
      };

      request.onerror = function() {
         document.write('Server crashed. Try again');
      };

      request.send(JSON.stringify(id));
    }
  };

  ready(fn)x;
</script>
</body>
</html>



