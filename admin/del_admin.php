
<?php 



		include('../config/constants.php');

		//get id to delete
			$aid= $_GET['aid'];


		//create sql query
			$sql= "DELETE FROM admindb WHERE aid=$aid";

		//execute the query
			$res= mysqli_query($conn,$sql);

		//check the query 
			if($res==TRUE)
			{
				//success
				//echo "deleted";
				$_SESSION['delete']="<div class='success'> Admin deleted Successfully</div>";
				header("location:".SITEURL.'admin/manage_admin.php');
			}
			else
			{
				//fail
				//echo "nor deleted";
				$_SESSION['delete']="<div class='error'> Deleted unsuccessfully</div>";
				header("location:".SITEURL.'admin/manage_admin,php');
			}


		//redirect to mang admin










 ?>