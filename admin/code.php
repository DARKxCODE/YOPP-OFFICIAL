<?php
include('security.php');
//session_start();
//$connection = mysqli_connect("localhost","root","","contact-us");
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }    
}

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
         $_SESSION['username'] = $email_login;
         header('Location: index.php');
    } 
    else
    {
         $_SESSION['status'] = "Email / Password is Invalid";
         header('Location: login.php');
    }
    
}

// blog UPLOAD
if (isset($_POST['uploadbtn'])) {
  
    $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];    
        $folder = "uploadedimage/".$filename;

        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
          
    //$db = mysqli_connect("localhost", "root", "", "adminpanel");
  
        // Get all the submitted data from the form
        $query = "INSERT INTO blog (image,title,date,content) VALUES ('$filename','$title','$date','$content')";
  
        // Execute query
        //mysqli_query($db, $sql);

        $query_run = mysqli_query($connection, $query);
          
        // Now let's move the uploaded image into the folder: image
        if($query_run)
    {
         
         $_SESSION['status'] = "Blog Page Added";
         $_SESSION['status_code'] = "success";
         header('Location: blog.php');
    } 
    else
    {
        $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
    }
    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
  }
    
  }

  if(isset($_POST['delete_btn_user']))
{
    $id = $_POST['delete_id_user'];

    $query = "DELETE FROM contact_details WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: user.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: user.php'); 
    }    
}

if(isset($_POST['delete_btn_subscriber']))
{
    $id = $_POST['delete_id_subscriber'];

    $query = "DELETE FROM subscriber_list WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: subscriber.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: subscriber.php'); 
    }    
}
//blog update button

if(isset($_POST['updatebtn_blog']))
{   
    $id = $_POST['edit_id'];
    $edit_title = $_POST['edit_title'];
    $edit_content = $_POST['edit_content'];
    $edit_date = $_POST['edit_date'];
    
    $edit_image = $_FILES['edit_image']['name'];
    //$tempname = $_FILES["edit_image"]["tmp_name"];    

    $query = "UPDATE blog SET title='$edit_title', content='$edit_content', date='$edit_date', image='$edit_image' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {   
        move_uploaded_file($_FILES["edit_image"]["tmp_name"],"uploadedimage/".$_FILES["edit_image"]["name"]);
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: blog.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: blog.php'); 
    }
}
// delete blog

if(isset($_POST['delete_btn_blog']))
{
    $id = $_POST['delete_id_blog'];

    $query = "DELETE FROM blog WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: blog.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: blog.php'); 
    }    
}

//cancel button admin registration

if(isset($_POST['cancelbtn']))
{
    
    
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    
}
//cancel button blog add

if(isset($_POST['cancelbtn_blog']))
{
    
    
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: blog.php'); 
    
}

?>