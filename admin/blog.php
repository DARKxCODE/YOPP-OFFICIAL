<?php

//session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');


?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        
      </div>
    <form action="code.php" method="POST">

      <div class="modal-body">

        <div class="form-group">
              <label>Username</label>
              <input type="text" name='username' class="form-control" placeholder="Enter Username">

        </div>
        <div class="form-group">
              <label>Email</label>
              <input type="email" name='email' class="form-control" placeholder="Enter your Email">
              
        </div>
        <div class="form-group">
              <label>Password</label>
              <input type="password" name='password' class="form-control" placeholder="Enter Password">
              
        </div>
        <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name='confirmpassword' class="form-control" placeholder="Confirm Password">
              
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="submit" name="cancelbtn_blog" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" class="btn btn-primary">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addadminblog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE NEW BLOG</h5>
        

      </div>
    <form action="code.php" method="POST" enctype="multipart/form-data">  

      <div class="modal-body">

        <div class="form-group">
              <label>BLOG TITLE</label>
              <input type="text" name='title' class="form-control" placeholder="Enter Blog Title">

        </div>
        <div class="form-group">
              <label>CONTENT</label>
              <textarea  type="text" row="10" column="100" name='content' class="form-control" placeholder="Enter Blog Content"></textarea>
              
        </div>
        <div class="form-group">
              <label>DATE</label>
              <input type="date" name='date' class="form-control" placeholder="Enter Date">
              
        </div>
        <div class="form-group">
              <label>IMAGE</label>
              <input type="file" name='image' class="form-control" placeholder="Upload Image">
              
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="submit" name="cancelbtn_blog" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="uploadbtn" class="btn btn-primary">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">BLOGS</h6>  
            <BR>  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminblog">
                  ADD BLOG 
            </button>       
        </div>
        <div class="card-body">

<?php
          if(isset($_SESSION['success'])&& $_SESSION['success']!='')
          {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          }
          if(isset($_SESSION['status'])&& $_SESSION['status']!='')
          {
            echo $_SESSION['status'];
            unset($_SESSION['status']);
          }
              
          ?>


<div class="table-responsive">
            <?php
                //$connection = mysqli_connect("localhost","root","","contact-us");
                $query = "SELECT * FROM blog";
                $query_run = mysqli_query($connection, $query);
            ?>
           
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image </th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Content</th>
                            <th>EDIT</th>
                            <th>DELETE</th>                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo '<img src="uploadedimage/'.$row['image'].'" width="100px;" height="100px;" alt="blogimage">'?></td>                                                    
                                <td><?php  echo $row['title']; ?></td>
                                <td><?php  echo $row['date']; ?></td>
                                <td><?php  echo $row['content']; ?></td>
                                <td>
                                    <form action="blog_edit.php" method="post">
                                        <input type="hidden" name="edit_id_blog" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn_blog" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id_blog" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn_blog" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                              
                            </tr>
                            <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>

                    </tbody>
                </table>

            </div>

            <?php

include('includes/scripts.php');
include('includes/footer.php');

?>