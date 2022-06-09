<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
			
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                if(isset($_POST['submit'])) {
                    $District = $_POST['Location'];
                    $City= $_POST['City'];
               
                    if ($District=="" && $City=="") {
                        echo "<h2>District And City Fields Are Not Selected</h2>";
                    }
                    else {


                    $query = "SELECT * FROM posts WHERE (District ='$District' OR City = '$City') AND confirm = 'Published'";

                    $search_query = mysqli_query($connection,$query);

                    if(!$search_query) {
                        die("Query Failed" . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<h1>NO RESULT</h1>";
                    }
                    else { 

                        while($row = mysqli_fetch_assoc($search_query)) {
                           $Learners_id = $row['post_id'];
                           $admin = $row['post_author'];
						   $category = $row['post_category_id'];
						   $Learners_Name = $row['post_title'];
						   $image = $row['post_image'];
						   $detail = $row['post_content'];
						   
                           $District = $row['District'];
                           $City = $row['City'];
                            ?>

                            <!-- First Blog Post -->
                           <h2>
                            <a href="Learners_info.php?Learners_id=<?php echo $Learners_id; ?>"><?php echo $Learners_Name; ?></a>
                        </h2>
                        <p class="lead">
                          Learners In <?php echo $District; ?>
                        </p>
                       
                        <hr>
                        <a href="Learners_info.php?Learners_id=<?php echo $Learners_id; ?>"><img class="img-responsive" src="images/<?php echo $image; ?>" alt=""></a>
                     
                        <p><?php echo $detail; ?></p>
                       

                        <hr>
                        <?php }  
                    }
                }
                }?>

     

            </div>


        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>