<?php

//session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');


?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Blog</h6>
        </div>
            <div class="card-body">
            <?php
            //$connection = mysqli_connect("localhost","root","","contact-us");
            if(isset($_POST['edit_btn_blog']))
            {
                $id = $_POST['edit_id_blog'];
                $query="SELECT * from blog where id='$id'";
                $query_run=mysqli_query($connection,$query);
                foreach($query_run as $row){
                    ?>
            
             
            <form action="code.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            <div class="form-group">
              <label>BLOG TITLE</label>
              <input type="text" name='edit_title' value="<?php echo $row['title']?>" class="form-control" placeholder="Enter TITLE">

            </div>
            <div class="form-group">
              <label>CONTENT</label>
              <input type="text" name='edit_content' value="<?php echo $row['content']?>"  class="form-control" placeholder="Enter CONTENT">
              
            </div>
            <div class="form-group">
              <label>DATE</label>
              <input type="date" name='edit_date' value="<?php echo $row['date']?>"  class="form-control" placeholder="Enter DATE">
              
            </div>
            <div class="form-group">
              <label>IMAGE</label>
            <input type="file" class="form-control" placeholder="Enter IMAGE" name='edit_image' value="<?php echo'<img src="uploadedimage/'.$row['image'].'" width="100px;" height="100px;" alt="blogimage"'?>" >
            
            </div>

            <a href="register.php" class="btn btn-danger" >Cancel</a>
            <button type="submit" name="updatebtn_blog" class="btn btn-primary">Update</button>

            </form>


            <?php 

                }
            }
            ?>

        </div>
    </div>





<?php



include('includes/scripts.php');
include('includes/footer.php');



?>