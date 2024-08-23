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
                <div class="col-md-10"> <div class="card-title fs-3 fw-bold text-muted">UPDATE LIST</div></div>
                <div class="col-md-2">   <a href="index.php" class="float-right">  <button  class="btn btn-primary">Back</button></a></div>

             </div>  
             </div>     
          </div>
    <div class="card-body">
    <?php
    // db connection
    require"connection.php";
    
    if (isset($_GET['listId'])) {

      $list_id_update = $_GET['listId'];
      $post_id_to_update = $_GET['listId'];
   
      $list_id_update = mysqli_real_escape_string($con, $list_id_update);
            // db query for edit  
      $post = mysqli_query($con, "SELECT * FROM crud_php WHERE id='$list_id_update'");
   
  
      if ($post && mysqli_num_rows($post) == 1) {

            foreach($post as $data) {
              $postId=$data['id'];
              $postTitle = $data['title'];
              $postdesc = $data['description'];
            }  
      } 
  }
  //update list function
  $tilteError=' ';
  $desError=' ';
  if(isset($_POST['update_list_button'])){
    $listId = $_POST['list_id'];
    $title = $_POST['title'];
    $des = $_POST['description'];
            //error meassage function
            if( empty($title)){
              $tilteError="fill your title";
            }
            if( empty($des )){
               $desError="fill your description";
            }
            if(!empty($title) &&  !empty($title)){
              $query = "UPDATE crud_php SET title='$title', description='$des' WHERE id = $listId";
              mysqli_query($con, $query);
              
               header('location:index.php'); 
              exit();
             }
            }

 

    ?>
      <form action="" method="POST">
      <div class="form-group mb-3">
                   <input type="hidden" name="list_id" value="<?php echo $postId;?>">
                      <label for="">TITLE</label>
                      <input type="text" name="title" class="form-control 
                      <?php if($titleError != ''): ?>is-invalid<?php endif ?>"                placeholder="Enter your title"  
                        value="<?php echo $postTitle; ?>">       
                      </div>
             <div class="form-group mb-3">
                  <label for="description">DESCRIPTION</label>
                  <textarea name="description" id="description"  class="form-control 
                      <?php if($titleError != ''): ?>is-invalid<?php endif ?>"                placeholder="Enter your title"  
                       >  <?php echo $postdesc; ?> </textarea>
                  <span class="text-danger"><?php echo isset($desError) ? $desError : ''; ?></span>
              </div>

              <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="update_list_button">Update</button>
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