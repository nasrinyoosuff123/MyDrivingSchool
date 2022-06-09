<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcone To Admin
                            <small>Author</small>
                        </h1>

                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                         <th>Learners_id</th>
                                        <th>user_name</th>
                                        <th>order_name</th>
                                        <th>order_Phone</th>
                                        <th>date</th>
                                        <th>user_age</th>
										<th>Confirm</th>
										<th>Status</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 
                                       $learnes_user_id = $_SESSION['s_id'];
                                        $query = "SELECT *  FROM  orders where Learners_userid = '$learnes_user_id' AND confirm = 'Confirmed' order by order_id desc";
                                        $select_users = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_users)) {
                                            $order_id  = $row['order_id'];
                                            $Learners_id = $row['Learners_id'];
                                            $user_id = $row['user_id'];
                                            $user_name = $row['user_name'];
                                            $user_age = $row['user_age'];
                                            $order_name = $row['order_name'];
                                            $order_Phone = $row['order_Phone'];  
                                            $date = $row['date'];
										
											$confirm = $row['confirm'];    
                                             $Checked = $row['Checking'];
                                     ?>
                                    <tr>
                                     
                                        <td><?php echo $Learners_id ?></td>
                                      
                                        <td><?php echo $user_name ?></td>
                                        <td><?php echo $order_name ?></td>
                                        <td><?php echo $order_Phone ?></td>
                                        <td><?php echo $date ?></td>
										<td><?php echo $user_age ?></td>
										
										<td><?php echo $confirm ?></td>
										
										<td>
										
										
									<?php 
										
										if($Checked == 'Checked'){
											echo"<span style='color:green'>$Checked</span>";
										}
										else{
											echo"<span style='color:red'>$Checked</span>";
										}
								     ?>
									</td>
										
										
                                        
                                        <?php echo "<td><a href='Bookings.php?deleteuser=$order_id'>Delete</a></td>"; ?>
                                     
                                        <?php echo "<td><a href='Bookings.php?Checked=$order_id'>checked</a></td>"; ?>
                                        <?php echo "<td><a href='Bookings.php?NotChecked=$order_id'>Not checked</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                        
						
					

                        <?php 

                        if (isset($_GET['deleteuser'])) {
                            
                            $order_idd = $_GET['deleteuser'];
                     
                            $query = "DELETE FROM orders WHERE order_id = {$order_idd} ";

                            $delete_query = mysqli_query($connection,$query);
                            
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($delete_query));
                            }
                            header("Location: Bookings.php");
                        }

                        ?>
						

                        <?php 

                        if (isset($_GET['NotChecked'])) {
                            $order_idd = $_GET['NotChecked'];
                            $query = "UPDATE orders SET Checking = 'NotChecked' WHERE order_id = '$order_idd'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: Bookings.php");
                        }

                        ?>
						
						<?php 

                        if (isset($_GET['Checked'])) {
                            $order_idd = $_GET['Checked'];
                            $query = "UPDATE orders SET Checking = 'Checked' WHERE order_id = '$order_idd'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: Bookings.php");
                        }

                        ?>

                      

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>