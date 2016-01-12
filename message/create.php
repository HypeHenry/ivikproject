<?php

/* 
this file will create message 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body>
        <header></header>
        <aside></aside>
        <article>
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
        </article>
    </body>
</html>
