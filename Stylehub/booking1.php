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
<!DOCTYPE html>
<html>
<head>
  <title></title>
    
     <?php 
     include 'links/link1.php'
     ?>
  <link rel="stylesheet" type="text/css" href="css/login.css"/>
   </head>
<body>
   <?php 
     include 'dbcon.php';
     if(isset($_POST["book_again"]))
      {
        #echo gettype($_POST["Ward_no"]);
        #unset($_SESSION['Ward_no']);
        $_SESSION['state']=mysqli_real_escape_string($con,$_POST['state']);
        $_SESSION['city']=mysqli_real_escape_string($con,$_POST['city']);
        $_SESSION['Ward_no']=mysqli_real_escape_string($con,$_POST['Ward_no']);
        #echo $_SESSION['Ward_no'].$_POST['Ward_no'];
        $_SESSION['Ward_name']=mysqli_real_escape_string($con,$_POST['Ward_name']);
        $_SESSION['gender']=mysqli_real_escape_string($con,$_POST['gender']);
        header('location:booking.php');
      }
     ?>
	<?php
		  $mobile=$_SESSION['mobile'];
      $state= $_SESSION['state'];
      $city=$_SESSION['city'];
      $Ward_no=$_SESSION['Ward_No'];
      $Ward_name=$_SESSION['Ward_name'];
      $email=$_SESSION['email'];
      $gender=$_SESSION['gender'];
      $password=$_SESSION['password'];
	?>
 
     <header> 
      <main>
        <section>
     <div class="header">
      <a href="index.php" class="logo">HairCraft</a>
        <a href="index.php">Home</a>
        <a href="index.php">Contact</a>
        <a href="index.php">About</a>
        <a href="logout.php" id="right1">SignOut</a>
              <a class='no-link' href="#" id="right2">Welcome,<?php echo $_SESSION['name1']; ?></a>
      </div>
    
  </section>
        <section>
			<div class="header">
		          <a href="#" class="logo">HairCraft</a>
		          <a href="#">Home</a>
		          <a href="#about">Contact</a>
		          <a href="#about">About</a>
		          <a href="logout.php">SignOut</a>
		         
		        
  			</div>
    </section> 
<!-- <% %> -->
     <section class="navb">

<div class="box" style="top:50%;">
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
                  else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
                  {
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
 /* include 'foot.php';*/
     ?>

    </section>
   
<!-- Footer -->
<!-- **************************** footer ends *********************/ -->
</body>
</html>