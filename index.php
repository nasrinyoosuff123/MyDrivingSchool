<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
  
    <?php include "includes/navigation.php"; ?>

 
    <div class="container">

        <div class="row">
		
		 
		   <?php include "includes/sidebar.php"; ?>

         
            <div class="col-md-8">

                <?php 

                    
                    $query = "SELECT *  FROM  posts where confirm = 'Published' order by rand() limit 13";
                    $select_all_Learners = mysqli_query($connection,$query);

               
                    while($row = mysqli_fetch_assoc($select_all_Learners)) {
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
                    <?php } ?>      

            </div>

    

        </div>
     

        <hr>

<?php include "includes/footer.php"; ?>