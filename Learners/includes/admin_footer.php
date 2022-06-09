</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
<script>  

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


</body>

</html>
