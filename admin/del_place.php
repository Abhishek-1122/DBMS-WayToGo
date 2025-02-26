
<?php 



		include('../config/constants.php');

		//get id to delete
			$placeid= $_GET['placeid'];


		//create sql query
			$sql= "DELETE FROM placedb WHERE placeid=$placeid";

		//execute the query
			$res= mysqli_query($conn,$sql);

		//check the query 
			if($res==TRUE)
			{
				//success
				//echo "deleted";
				$_SESSION['delete']="<div class='success'> Place deleted Successfully</div>";
				header("location:".SITEURL.'admin/manage_places.php');
			}
			else
			{
				//fail
				//echo "nor deleted";
				$_SESSION['delete']="<div class='error'> Deleted unsuccessfully</div>";
				header("location:".SITEURL.'admin/manage_places.php');
			}


		//redirect to mang admin










 ?>