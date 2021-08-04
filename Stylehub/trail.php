<?php
    isset($_POST['booking'])
    {
      $shop=$_POST['shop'];
      $services=$_POST['services'];
      $time=$_POST['time'];
      $price=$_POST['price'];
      $n=count($services);
      for($i=0;$i<$n;++$i)
      {
      	echo $services[i]." ".$time[i]." ".$time[i]."<br>";
      }
    }
  ?>



  <?php 
   session_start();
   if(!isset($_SESSION['name1']))
   {
     ?>
          <script >
             alert( "You have logged out, Plz Login");
            location.replace("index.php");
          </script>
     <?php
   }
 ?>
<html>
	<head>
		<?php
			include 'links/link1.php';
		?>
		<script type="text/javascript" src="js/index_Script.js"></script>
 		<link rel="stylesheet" type="text/css" href="css/login.css"/>
	</head>
	</html>
	<body>
		<?php
      if(isset($_POST["book_again"]))
      {
        $_SESSION['state']=$_POST['state'];
        $_SESSION['city']=$_POST['city'];
        $_SESSION['Ward_no']=$_POST["Ward_no"];
        $_SESSION['Ward_name']=$_POST["Ward_name"];
        $_SESSION['gender']=$_POST['gender'];
        header('location:booking.php');
      }
    ?>
		
      <!-- customer create account form end -->

	</body>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Purchase</title>
<link rel="stylesheet" href="css/login.css"/>
 <?php 
     include 'links/link2.php';
     include 'dbcon.php';
     ?>
</head>
<body>
	<?php
		$mobile=$_SESSION['mobile'];
    $state= $_SESSION['state'];
    $city=$_SESSION['city'];
    $Ward_no=$_SESSION['Ward_No'];
    $ward_name=$_SESSION['Ward_name'];
    $email=$_SESSION['email'];
    $gender=$_SESSION['gender'];
    $password=$_SESSION['password'];
		/*$query1="select *from customer where Mobile=$mobile";
		$result1=mysqli_query($con,$query1);
    if($result1)
		{
			while($row1=mysqli_fetch_array($result1))
      {
        $state=$row1['state'];
        $city=$row1['City']; 
        $Ward_no=$row1['Ward_no'];
        $name=$row1['Name'];
        $Ward_name=$row1['Ward_name'];
        $email=$row1['Email'];
        $mobile=$row1['Mobile'];
        $gender=$row1['Gender'];
        $password=$row1['Password'];
      }
		}
		else
		{
			echo mysqli_error($con);
		}*/
	?>
     <header style="height: 120vh;">
      <main>
        <section>
			<div class="header">
		        <a href="#" class="logo">HairCraft</a>
		          <div class="header-right">
		          <a href="#">Home</a>
		          <a href="#about">Contact</a>
		          <a href="#about">About</a>
		          <a href="logout.php" style="float: right;">SignOut</a>
		          <a class='no-link' href="#" style="float: right;">Welcome,<?php echo $_SESSION['name1']; ?></a>
		        </div>
  			</div>
    </section>
<!-- <% %> -->
     <section class="section" >

<div class="box" style="top: 60%;">
    <h2>Book Your next slot</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
           <div class="input-box">
             <label for="State">State</label><br>
              <select id="state" class="drop" name="state">
                <?php
                  $query4='select distinct state from owner_details';
                  echo '<option value="'.$state.'">'.$state.'*</option>';
                  $result4=mysqli_query($con,$query4);
                  if($result4)
                  {
                    while($row4=mysqli_fetch_array($result4))
                    {
                      echo '<option value="'.$row4["state"].'">'.$row4["state"].'</option>"<br>"';
                    }
                  }
                else{
                  echo mysqli_error($con);
                }
                ?>
              </select>
            </div>  
           <div class="input-box">
             <label for="City">City*</label><br>
            <input
              type="text"
              name="city"
              id="name"
              value="<?php echo $city;?>"
              autocomplete="off"
              required
            />
          </div>
          <div class="input-box">
             <label for="Ward_no">Ward No.*</label><br>
            <input
              type="text"
              name="Ward_no"
              id="name"
              value="<?php echo $Ward_no;?>"
              autocomplete="off"
              required
            />
          </div>
          <div class="input-box">
             <label for="Ward_name">Ward Name</label><br>
            <input
              type="text"
              name="Ward_name"
              id="name"
              value="<?php echo $Ward_name;?>"
              autocomplete="off"
            />
          </div>
           <div class="input-box">
            <label for="Email">Email</label><br>
            <input
              type="text"
              name="email"
              id="name"
              value="<?php echo $email;?>"
              autocomplete="off"
            />
          </div>
           <div class="input-box">
             <label for="mobile">Mobile*</label><br>
            <input
              type="text"
              name="mobile"
              id="mobile"
              value="<?php echo $mobile;?>"
              autocomplete="off"
              required
            />
          </div>
           <div class="input-box">
            <label for="gender">Gender*</label><br>
            <select id="gender" class="drop" name="gender">
            <option value="<?php echo $gender;?>"><?php echo $gender;?></option>
            <option value="M">Male</option>
            <option value="F">Female</option>
            <!--<option value="other">Other</option>-->
            </select>
          </div>
     <center><input type="submit" name="book_again" value="Next" /></center>  
        </form>
    </div>
   </section>
     </main>
    </header>
   <section>
      <?php 
     include 'foot.php';
     ?>

    </section>
   
<!-- Footer -->
<!-- **************************** footer ends *********************/ -->
</body>
</html>