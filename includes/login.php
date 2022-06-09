<?php include "db.php"; ob_start(); ?>
<?php session_start(); ?>
<?php 



 if(isset($_POST['login'])){

   $username = $_POST['username'];
	$password = $_POST['password'];


   $query = "SELECT * FROM users WHERE username = '$username' AND user_password='$password'";
    $run = mysqli_query($connection,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
                   echo "<script>alert('Username Or Password Wrong')</script>";
    
                  echo "<script> document.location.href='../index.php';</script>";
    }
    else{
        $data = mysqli_fetch_assoc($run);
		
		$db_user_id = $data['user_id'];
		$db_username = $data['username'];
		$db_user_password = $data['user_password'];
		$db_user_firstname = $data['user_firstname'];
		$db_user_lastname = $data['user_lastname'];
		$db_user_role = $data['user_role'];
		$db_user_image = $data['user_image'];
		
            $_SESSION['s_username'] = $db_username;
			$_SESSION['s_firstname'] = $db_user_firstname;
			$_SESSION['s_lastname'] = $db_user_lastname;
			$_SESSION['s_role'] = $db_user_role;
			$_SESSION['s_image'] = $db_user_image;
			$_SESSION['s_id'] = $db_user_id;
      

	  if ($db_user_role == 'Admin') {
				
				  echo "<script>alert('You Are Successfully logged in click on go to Admin System')</script>";
    
                  echo "<script> document.location.href='../admin/index.php';</script>";
				
					
			}
			
			else if ($db_user_role == 'Learners') {
				echo "<script>alert('You Are Successfully logged')</script>";
    
                  echo "<script> document.location.href='../Learners/index.php';</script>";
						
			}
			
			else if ($db_user_role == 'subscriber') {
				echo "<script>alert('You Are Successfully logged')</script>";
    
                  echo "<script> document.location.href='../index.php';</script>";
						
			}
			
			else {
				
				  echo "<script> document.location.href='../index.php';</script>";
			}
			
			
			
		}
    }

?>
