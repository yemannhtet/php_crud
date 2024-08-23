
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>to do list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style type="text/css">
            body{
                padding:50px;
          
            }
                
</style>
  </head>
  <body>
  <div class="container mb-5">
    <div class="row">
        <div class="col-md-12">

           <div class="card">
           <div class="card-header">
              <div class="row ">
              <div class="row ">
                <div class="col-md-10"> <div class="card-title fs-3 fw-bold text-muted">TITLE</div></div>
                <div class="col-md-2">   <a href="index.php" class="float-right">  <button  class="btn btn-primary">Back</button></a></div>

             </div>  
             </div>     
          </div>
    <div class="card-body">


    <?php

    require"connection.php";

    $titleError=' ';
    $desError=' ';
    
    
        if(isset($_POST['create_list'])){
          $title = $_POST['title'];
          $des = $_POST['description'];

          //error meassage function
                if( empty($title)){
                  $titleError="fill your title";
                }
                if( empty($des )){
                   $desError="fill your description";
                }
                if(!empty($title) &&  !empty($title)){

                  mysqli_query($con, "INSERT INTO crud_php (title,description) VALUES ('$title', '$des')");
                  header('Location:index.php');
                  exit();
                }
 
        }
    
    ?>
      <form action="" method="POST">
      <div class="form-group mb-3">
                      <label for="">TITLE</label>
                      <input type="text" name="title" class="form-control 
                      <?php if($titleError != ''): ?>is-invalid<?php endif ?>"                placeholder="Enter your title"  
                        value="">    
                      <span class="text-danger"><?php echo $titleError; ?></span>

             </div>
             <div class="form-group mb-3">
                  <label for="description">DESCRIPTION</label>
                  <textarea name="description" id="description" class="form-control"></textarea>
                  <span class="text-danger"><?php echo isset($desError) ? $desError : ''; ?></span>
              </div>

              <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="create_list">Submit</button>
              </div>
              
      </form>   
    </div>
</div>
  </div>
    </div>
    </div>
    
  
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>   
  </body>
  
</html>