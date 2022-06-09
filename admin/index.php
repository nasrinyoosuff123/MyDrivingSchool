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
                            Welcome To Admin
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		<br><br>
 
     <button type="button" class="btn btn-primary" onclick="window.location.href='Learners.php'"> 
		  <h2><b>All Learners</b>  </h2>    
		  <p>See More Information</p></br></br></br>
	 </button>
         
     <button type="button" class="btn btn-primary" onclick="window.location.href='Learners.php?source=add_Learners'"> 
		    <h2><b>Add Learners</b>  </h2> 
		  <p>Add Learners</p></br></br></br>
	 </button>
     
	<button type="button" class="btn btn-primary" onclick="window.location.href='categories.php'"> 
		    <h2><b>Categories</b>  </h2> 
		  <p>Add Categories</p></br></br></br>
	 </button>
   <button type="button" class="btn btn-primary" onclick="window.location.href='query.php'"> 
		    <h2><b>Comments</b>  </h2> 
		  <p>See Comments</p></br></br></br>
	 </button>
	 
	<button type="button" class="btn btn-primary" onclick="window.location.href='users.php'"> 
		    <h2><b>All Users</b>  </h2> 
		  <p>See All Users</p></br></br></br>
	 </button>
	 
	 <button type="button" class="btn btn-primary btn-mr-3" onclick="window.location.href='Bookings.php'"> 
		    <h2><b>Bookings</b>  </h2> 
		  <p>See Bookings</p></br></br></br>
	 </button></br></br>
	 
	 <button type="button" class="btn btn-primary" onclick="window.location.href='../profile.php'"> 
		    <h2><b>Profile</b>  </h2> 
		  <p>See Profile</p></br></br></br>
	 </button>
	 
	 <button type="button" class="btn btn-primary" onclick="window.location.href='report.php'"> 
		    <h2><b>Reports</b>  </h2> 
		  <p>See Total Reports</p></br></br></br>
	 </button>
	 
	
<?php include"includes/admin_footer.php"; ?>