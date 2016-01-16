<?php 
include_once 'template/header.php';

?>
        
            <form method="POST" action="insert.php">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title"class="form-control" id="title" placeholder="title">
                </div>
                
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea id="content" name="content" class="form-control"></textarea>
                </div>
              
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        
<?php 
include_once 'template/footer.php';
?>