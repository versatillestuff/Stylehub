<?php 
date_default_timezone_set('Asia/Kolkata'); #
$server="127.0.0.2";
$user="stylehub";
$password="7h75Oj9uYc";
$db="stylehub_style";
$con=mysqli_connect($server,$user,$password,$db);
	if($con)
	{
		?>
		<script >
		//alert("connection successful");	
		</script>
		<?php 
	}
	else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
    {
      echo mysqli_error($con);
        ?>
		<script >
		alert(" NO connection");	
		</script>
		<?php 
    }
  ?>
