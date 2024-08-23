<?php
  require"connection.php";
    //delete function
    if(isset($_GET['list_id_to_delete'])) { 
      $post_id_delete = $_GET['list_id_to_delete'];
  
      mysqli_query($con, "DELETE FROM crud_php WHERE id = $post_id_delete");
  
      header('Location: index.php');
      exit(); 
  }
  ?>
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
  <div class="container">
    <div class="row">
        <div class="col-md-12">

<div class="card">
            
<div class="card-header">
              <div class="row ">
                <div class="col-md-10"> <div class="card-title fs-3 fw-bold text-muted">TO-DO-LIST</div></div>
                <div class="col-md-2">   <a href="list.php" class="float-right">  <button  class="btn btn-primary">add new</button></a></div>
                        
                      
             </div>     
          </div>
    <div class="card-body">

    <table class="table table-dark table-striped table-bordered" >
               <thead>
                  <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">Action</th>
                 </tr>
         </thead>
         <tbody>
            <?php
          

            $query = "SELECT * FROM crud_php";
            $result = mysqli_query ( $con ,$query );
            foreach ($result as $row){
            ?>

              <tr>
                   <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td>
                    <a href="post-edit.php?listId=<?php echo $row['id']; ?>">
                           <button type="button" class="btn btn-success">Edit</button>
                   </a>
                   <a href="index.php?list_id_to_delete=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
             </tr>
             <?php } ?>
  </tbody>

  
  

</table>
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