          
 <?php include "db.php"; ?>
  

		  <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Learners Search</h4>
                    <form action="search.php" method="post">
					

						
		<select name="Location" id='loc_select' class="form-control">
		<option value='' selected='selected' hidden='hidden'>District</option>
			
			<?php 

			$query = "SELECT * FROM districts";
			$select_category = mysqli_query($connection,$query);

			if (!$select_category) {
				die("Query Failed" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($select_category)) {
	
				$district_id = $row['id'];
                $id_name = $row['name_en'];
                
		echo "<option value='$id_name'>$id_name</option>";
			}

			?>

		</select></br>

	
		<select name="City" id='city_select' class="form-control">
	     <option value='' selected='selected' hidden='hidden'>City</option>
			<?php 

			$query = "SELECT * FROM cities";
			$select_category = mysqli_query($connection,$query);

			if (!$select_category) {
				die("Query Failed" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($select_category)) {
	
				$nameofdistic = $row['nameofdistic'];
                $id_name = $row['name_en'];
                
		echo "<option class='$nameofdistic' value='$id_name'>$id_name</option>";
			}

			?>

		</select>
	
           <button class="btn btn-primary" name="submit" style="margin-left: 130px; margin-top: 10px;">Search</button>
                        
         </form>
                 
   </div>


                <!-- Login -->
                <?php

                    if (!isset($_SESSION['s_username'])) {
                        ?>
                            <div class="well">
                                <h4>Login</h4>
                                <form action="includes/login.php" method="post">

                                    
                                        <input name="username" type="text" class="form-control" placeholder="Username">
                                        <input name="password" type="password" class="form-control" placeholder="Password" style="margin-top: 10px;">

                                        <button class="btn btn-primary" name="login" style="margin-left: 130px; margin-top: 10px;">Login</button><br>
                                     <span>Forgot <a href="#">password?</a></span>
                                </form>
                                <!-- /.input-group -->
                            </div>
                        
                <?php } ?>

                



                <!-- Blog Categories Well -->
                <div class="well">


                    <?php 

                        $query = "SELECT *  FROM  categories";
                        $select_categories_sidebar = mysqli_query($connection,$query);

                     ?>




                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                                <?php  
                                    while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];
                                         echo "<li> <a href='category.php?category=$cat_id'> $cat_title </a></li>";
                                    }

                                ?>
                                
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>


                <!-- Side Widget Well -->
                <?php include "widget.php"; ?>

            </div>
			
			
			
			
<script language="javascript" type="text/javascript">  

 document.getElementById("loc_select").onchange = function(){
	  
	  let selector = document.getElementById("loc_select");
      let value = selector[selector.selectedIndex].value;
  
    
     let nodeList = document.getElementById("city_select").querySelectorAll("option");
      nodeList.forEach(function(option){
   
        if(option.classList.contains(value)){
        option.style.display="block";
      }else{
          option.style.display="none";
       }
    
      });  
}

</script>