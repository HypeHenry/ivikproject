<?php 
include_once '../template/header.php';

?>
        
            <form method="POST" action="insertUser.php">
                <div class="form-group">
                  <label for="user">Username</label>
                  <input type="text" name="user" class="form-control" id="user" placeholder="user">
                </div>
                
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <textarea id="content" name="content" class="form-control"></textarea>
                </div>
              
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        
<?php 
include_once '../template/footer.php';
