 <?php 
   session_start();
   if(!isset($_SESSION['name1']))
   {
     ?>
          <script >
             alert( "You are Logout Plz Login");
            location.replace("login.php");

          </script>
     <?php
   }
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Purchase</title>
<link rel="stylesheet" href="css/login.css"/>
 <?php 
     include 'links/link2.php';

     ?>
</head>
<body>
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
    <h2>Book A slot</h2>
   
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
           <div class="input-box">
             
  <select id="state" class="drop" name="state">
    <option value="">Select State</option>
    <option value="br">Bihar</option>
    <option value="wb">MP</option>
    <option value="up">UP</option>
    <option value="cg">Chattisgarh</option>
     <option value="jh">jharkhand</option>
  </select>
           
          </div>
           <div class="input-box">
            <input
              type="text"
              name="city"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">City</label>
          </div>         <div class="input-box">
            <input
              type="text"
              name="ward"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Ward No.</label>
          </div>
  <div class="input-box">
            <input
              type="text"
              name="wardn"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Ward Name</label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="name"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Name </label>
          </div>
           <div class="input-box">
            <input
              type="Email"
              name="email"
              id="name"
              autocomplete="off"
              required
            />
            <label for="emails1">Email</label>
          </div>
           <div class="input-box">
            <input
              type="number"
              name="mobile"
              id="mobile"
              autocomplete="off"
              required
            />
            <label for="Username">Contact No.</label>
          </div>
           <div class="input-box">
             
  <select id="gender" class="drop" name="gender">
     <option value="">--Select Gender--</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
   
  </select>
           
          </div>
          
           <div class="input-box">
            <input
              type="password"
              name="password"
              id="name"
              autocomplete="off"
              required
            />
            <label for="password">create password</label>
          </div>
           <div class="input-box">
            <input
              type="password"
              name="cpassword"
              id="name"
              autocomplete="off"
              required
            />
            <label for="cpassword">Repeat Password</label>
          </div>
          
     <center><input type="submit" name="" value="Book" /></center>  
         
        </form>

   <!--  <form action="Purchase" method="post">
         <div class="inputBox">
        <input placeholder="Name" type="text" name="units" required="" />
        </div>
        <label for="Product" >Gender:</label>
        <select name="product_id" id="cate">
        <option value="">Male</option>   
         <option value="">Female</option>   
         <option value="">Other</option> 
        </select>
        <div class="inputBox">
        <input placeholder="Locality" type="text" name="units" required="" />
        </div>

        <div class="inputBox">
           <label for="">Time</label>
        <input type="time" name="time" required="" placeholder="time" style="font-size: 20px;" />
        </div>

         <div class="inputBox">
            <label for="">Address</label>
            <input type="text" name="" required="" />
        </div>

        <div class="inputBox">
           <label for="">Date</label>
        <input type="date" id="date" name="purchaseDate" placeholder="date">
        </div>


     <center><input type="submit" name="" value="Book" /></center>   
    </form> -->    
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