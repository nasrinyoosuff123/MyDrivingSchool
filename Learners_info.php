<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
	
	
	
	
	
	
	<!--<h1 style="color:blue; font-family: Trattatello; text-align: center;"> welcome to our learners driving school </h1>-->

    <!-- Page Content -->
    <div class="container">

        <div class="row">
		

            <!-- Blog Entries Column -->
            <div class="col-md">

                <?php 

                    if(isset($_GET['Learners_id'])) {
                        $selected_Learners = $_GET['Learners_id'];
                    }

                    $query = "SELECT *  FROM  posts WHERE post_id = $selected_Learners ";

                    $select_all_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_query)) {
						
						   $Learners_id = $row['post_id'];
                           $admin = $row['post_author'];
						   $category = $row['post_category_id'];
						   $Learners_Name = $row['post_title'];
						   $image = $row['post_image'];
						   $Luser= $row['user_id'];
						   $detail = $row['post_content'];
						   $Heavy = $row['Price_h'];
                           $Light = $row['Price_l'];
                           $Motorcycle = $row['Price_m'];
						   $Address = $row['Address'];
                           $District = $row['District'];
                           $City = $row['City'];
                        ?>

                        <!-- First Blog Post -->
                        <h2>
                           <?php echo $Learners_Name; ?>
                        </h2>
                        <p class="lead">
                            Learners In <?php echo $District; ?>
                        </p>
                       
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $image; ?>" alt="">

                        <hr>
                        <p><?php echo $detail; ?></p></br>
						<p class="lead">
                           Price Rate :
                        </p>
						
						<p>Motorcycle Only: RS <?php echo $Motorcycle ?></p>
						<p>Light Vehicles: RS <?php echo $Light ?></p>
						<p>Heavy Vehicles: RS <?php echo $Heavy ?></p>
                        
                


                        <div class="jumbotron">
                            <div class="container-fluid">
                                 <h2>Enter Details:</h2>
                                </form>

                                <form action="Learners_info.php?Learners_id=<?php echo $selected_Learners ?> & Learnersuser_id=<?php echo $Luser ?>" method="post" class="form-horizontal">
                                    <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" placeholder="Name" name="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Age:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="email" placeholder="Age" name="userage" required>
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Phone No:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" placeholder="Ex:077124567" name="pno" required>
                                            </div>
                                        </div>
                              

                                <button class="btn btn-primary" name="book" style="margin-left: 40%; margin-top: 15px;">Book Learners</button>

                                </form>
								
								
					

                                <?php

                               if (isset($_POST['book'])) {
	  
	$name= $_POST['name'];
	$age = $_POST['userage'];
	$pno = $_POST['pno'];
	 $selected_Learners = $_GET['Learners_id'];
	  $Luser = $_GET['Learnersuser_id'];
	 $user_name = ucfirst($_SESSION['s_username']) ;
	           $curr_user_id = $_SESSION['s_id'];
      
  
    
  	$insert = "INSERT INTO orders( Learners_id, user_id, user_name, user_age, order_name, order_Phone, Learners_userid ) VALUES ('$selected_Learners', '$curr_user_id', '$user_name', '$age', '$name', '$pno', '$Luser')";
  	
  if(	mysqli_query($connection,$insert))
{
 
    echo "<script>alert('You Are successfully booking And We Will Contact Soon Thank you!......')</script>";
  
      echo "<script> document.location.href='index.php';</script>";
     
}

else{
    
     echo "<script>alert('Please Try Again')</script>";
     echo "<script> document.location.href='index.php';</script>";

  	}
  }
 
	}
?>
     </div>
 </div>
                     

                


                    <!-- Blog Comments -->

                <?php 

                    if (isset($_POST['submit_query'])) {
                        $user_name = $_SESSION['s_username'];
                        if($user_name == '') {
                            $user_name = "(unknown)";
                        }
                        $user_email = $_POST['user_email'];
                        $user_query = $_POST['user_query'];

                        $query = "INSERT INTO query(query_Learners_id, query_user, query_email, query_date, query_content, query_replied) VALUES ('$selected_Learners', '$user_name', '$user_email', now(), '$user_query', 'no')";

                        $query_insert = mysqli_query($connection, $query);
                        if(!$query_insert) {
                            die("Query Failed" . mysqli_error($connection));
                        }

                        $query = "UPDATE posts SET post_query_count = post_query_count + 1 WHERE post_id = $Learners_id";
                        $increase_query_count = mysqli_query($connection,$query);
                    }

                ?>



                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="Learners_info.php?Learners_id=<?php echo $selected_Learners ?>" method="post" role="form">
                  
          				  <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="user_email" required></textarea>
                        </div>

                        <div class="form-group">
                            <label> Comments</label>
                            <textarea class="form-control" rows="3" name="user_query" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_query">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 

                $query = "SELECT * FROM query WHERE query_Learners_id = $Learners_id ORDER BY query_id desc ";
                $get_query = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($get_query)) {
                    
                $query_user = $row['query_user'];
                $query_content = $row['query_content'];
                $query_date = $row['query_date'];

                ?>


                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $query_user; ?>
                            <small><?php echo $query_date; ?></small>
                        </h4>
                        <?php echo $query_content; ?>
                    </div>
                </div>
      
                <?php } ?>

            </div>
 
         
        </div>
    

        <hr>
		
		 
<script src="js/preventrefresh.js"></script>
<?php include "includes/footer.php"; ?>