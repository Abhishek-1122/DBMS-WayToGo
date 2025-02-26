
<?php 



		include('../config/constants.php');

		//get id to delete
			$placeid= $_GET['placeid'];


		//create sql query
			$sql= "DELETE FROM placedb WHERE resort1=$resort1";

		//execute the query
			$res= mysqli_query($conn,$sql);

		//check the query 
			if($res==TRUE)
			{
				//success
				//echo "deleted";
				$_SESSION['delete']="<div class='success'> resort/stay deleted Successfully</div>";
				header("location:".SITEURL.'admin/manage_stay.php');
			}
			else
			{
				//fail
				//echo "nor deleted";
				$_SESSION['delete']="<div class='error'> Delete unsuccessfull</div>";
				header("location:".SITEURL.'admin/manage_stay.php');
			}


		










 ?>