<?php 

	if (isset($_POST['insert-Learners'])) {
		 $user_name = ucfirst($_SESSION['s_username']) ;
	    $curr_user_id = $_SESSION['s_id'];
		
		$category = $_POST['category'];
		$Learners_Name = $_POST['Learners_Name'];
		$District = $_POST['District'];
		$City = $_POST['City'];
		$Address = $_POST['Address'];
		$Motorcycle = $_POST['Motorcycle'];
		$Light = $_POST['Light'];
		$Heavy = $_POST['Heavy'];
		$detail = $_POST['detail'];
		
		$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];

		move_uploaded_file($tmp_image, "../images/$image");

		if ($category=="" || $Learners_Name=="" || $District=="" || $Address=="" || $Motorcycle=="" || $Light=="" || $Heavy=="" || $detail=="") {
			echo "**All Fields Mandatory";
		}
		else {
			$query = "INSERT INTO posts(user_id, post_category_id, post_title, post_author, post_image, post_content, Price_m, Price_l, Price_h, Address, District, City) VALUES('{$curr_user_id}', '{$category}', '{$Learners_Name}', '{$user_name}', '{$image}', '{$detail}', '{$Motorcycle}','{$Light}','{$Heavy}','{$Address}','{$District}','{$City}')";

			$Learners_entry = mysqli_query($connection,$query);

			if (!$Learners_entry) {
				die("Query Failed");
			}
		}
	}

?>


<form action="" method="post" enctype="multipart/form-data">
	

	

	<div class="form-group">
		<label for="source">Learners Name</label>
		<input type="text" class="form-control" name="Learners_Name">
	</div>
	
	<div class="form-group">
	<label>Category</label>
		<select name="category" class="form-control">
			
			<?php 

			$query = "SELECT * FROM categories";
			$select_category = mysqli_query($connection,$query);

			if (!$select_category) {
				die("Query Failed" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($select_category)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
			
				echo "<option value='$cat_id'>$cat_title</option>";
			}

			?>

		</select>
	</div>

	<div class="form-group">
		<label for="destination">District</label>
		<select name="District" id='loc_select' class="form-control">
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
		
		</div>

	<div class="form-group">
		<label for="intermediate-station">Address</label>
		<input type="text" class="form-control" name="Address">
	</div>
	

	<div class="form-group">
		<label for="Max Seats">Price Motorcycle Only</label>
		<input type="text" class="form-control" name="Motorcycle" placeholder="Price Motorcycle Only">
	</div>
	
	<div class="form-group">
		<label for="Max Seats">Price Light Vehicles</label>
		<input type="text" class="form-control" name="Light" placeholder="Price Light Vehicles">
	</div>
	
	<div class="form-group">
		<label for="Max Seats">Price Heavy Vehicles</label>
		<input type="text" class="form-control" name="Heavy" placeholder="Price Heavy Vehicles">
	</div>

	<div class="form-group">
		<label for="bus-image">Learners Image</label>
		<input type="file" name="image" >
	</div>

	<div class="form-group">
		<label for="bus-detail">Learners Detail</label>
		<textarea class="form-control" name="detail" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-Learners" value="Add Learners">
	</div>
</form>



