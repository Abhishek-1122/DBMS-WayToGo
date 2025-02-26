
<?php 



		include('../config/constants.php');

		//get id to delete
			$foodid= $_GET['foodid'];


		//create sql query
			$sql= "DELETE FROM menu WHERE foodid=$foodid";

		//execute the query
			$res= mysqli_query($conn,$sql);

		//check the query 
			if($res==TRUE)
			{
				//success
				//echo "deleted";
				$_SESSION['delete']="<div class='success'> Item deleted Successfully</div>";
				header("location:".SITEURL.'admin/manage_hotels.php');
			}
			else
			{
				//fail
				//echo "nor deleted";
				$_SESSION['delete']="<div class='error'> Deleted unsuccessfully</div>";
				header("location:".SITEURL.'admin/manage_hotels.php');
			}


		//redirect to mang admin










 ?>