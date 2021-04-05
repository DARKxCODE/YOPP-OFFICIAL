<?php

//session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');


?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CONTACT DETAILS</h6>            
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
                $query = "SELECT * FROM contact_details";
                $query_run = mysqli_query($connection, $query);
            ?>
           
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Phone</th>
                            <th>Message</th>
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
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['phone']; ?></td>
                                <td><?php  echo $row['message']; ?></td>
                                
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id_user" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn_user" class="btn btn-danger"> DELETE</button>
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