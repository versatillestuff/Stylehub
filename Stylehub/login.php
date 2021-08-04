<?php 
   session_start();
   ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    
     <?php 
     include 'links/link1.php'

     ?>
  
  <link rel="stylesheet" type="text/css" href="css/login.css"/>
   
<body>
<?php
  include 'dbcon.php';
    if(isset($_POST['ca1']))
    {

        $state1=mysqli_real_escape_string($con,$_POST['state']) ;
        $city1=mysqli_real_escape_string($con,$_POST['city']);
        $ward1=mysqli_real_escape_string($con,$_POST['ward']);
        $wardn1=mysqli_real_escape_string($con,$_POST['wardn']);
        $name1=mysqli_real_escape_string($con,$_POST['name']);
        $email1=mysqli_real_escape_string($con,$_POST['email']);
        $mobile1=mysqli_real_escape_string($con,$_POST['mobile']);
        $gender1=mysqli_real_escape_string($con,$_POST['gender']);
        $pass=mysqli_real_escape_string($con,$_POST['password']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpassword']);
        $p=md5($pass);
        $cp=md5($cpass);
        $emailquery="select * from customer where email='$email1' ";
        $query=mysqli_query($con, $emailquery);
        $emailcount=mysqli_num_rows($query);
        if($emailcount>0)
        {
              ?>
              <script >
              alert("email already Exist"); 
              </script>
              <?php 
        }
        else
        {
          if($pass==$cpass)
            {
              $insertquery="insert into customer(state, City, Ward_no,Ward_name,name,email,Mobile,Gender,password,cpassword) values('$state1',' $city1','$ward1','$wardn1',' $name1','$email1','  $mobile1','$gender1','$p','$cp')";
              $iquery=mysqli_query($con,$insertquery);
                      if($iquery)
                    {
                      ?>
                      <script >
                      alert("inserted successfully"); 
                      </script>
                      <?php 
                    }
                      else
                        {
                          ?>
                        <script >
                        alert("Not inserted");  
                        </script>
                        <?php 
                        }
            }
            else
            {
                  ?>
                    <script >
                    alert( "Password not matched"); 
                    </script>
                  <?php 
             
            }
          }
  } 
   if(isset($_POST['ca2']))
  {
       
        $fname=mysqli_real_escape_string($con,$_POST['f_name1']) ;
        $lname=mysqli_real_escape_string($con,$_POST['l_name1']);
        $email=mysqli_real_escape_string($con,$_POST['email1']);
        $mobile=mysqli_real_escape_string($con,$_POST['mobile1']);
        $pass=mysqli_real_escape_string($con,$_POST['password1']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpassword1']);
        $p=md5($pass);
        $cp=md5($cpass);
        $emailquery=" select * from registration1 where email='$email' ";
        $query=mysqli_query($con, $emailquery);
        $emailcount=mysqli_num_rows($query);
        if($emailcount>0)
        {
              ?>
              <script >
              alert("email already Exist"); 
              </script>
              <?php 
        }
        else
        {
          if($pass ==$cpass)
         {
              $insertquery="insert into registration1(f_name, l_name, email, mobile, password, cpassword) values('$fname',' $lname','$email','  $mobile','$p','$cp')";
              $iquery=mysqli_query($con,$insertquery);
              if($iquery)
              {
                ?>
                <script >
                alert("inserted successfully"); 
               </script>
               <?php 
              }
              else
              {
                ?>
                <script >
                alert("Not inserted");  
                </script>
                <?php 
               }
            }
            else
            {
            ?>
               <script >
                 alert( "Password not matched"); 
               </script>
            <?php          
            }
          }
  }
  /*  if(isset($_POST['ca2']))
  {
       
        $state=mysqli_real_escape_string($con,$_POST['state1']) ;
        $city=mysqli_real_escape_string($con,$_POST['city1']);
        $ward=mysqli_real_escape_string($con,$_POST['ward1']);
        $wardn=mysqli_real_escape_string($con,$_POST['wardn1']);
        $add=mysqli_real_escape_string($con,$_POST['add1']);
        $shop=mysqli_real_escape_string($con,$_POST['shop1']);
        $owner=mysqli_real_escape_string($con,$_POST['owner1']);
         $seat=mysqli_real_escape_string($con,$_POST['seat1']);
       $lunch=mysqli_real_escape_string($con,$_POST['lunch1']);
        $email=mysqli_real_escape_string($con,$_POST['email1']);
        $mobile=mysqli_real_escape_string($con,$_POST['mobile1']);
        $pass=mysqli_real_escape_string($con,$_POST['password1']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpassword1']);
         
         $day='';
        if(!empty($_POST["days"]))
           {
           
            foreach($_POST["days"] as $ad)
            {
             $day .= $ad . ', ';
            }
             $day  = substr( $day , 0, -2);
           
           
           }
        $p=md5($pass);
        $cp=md5($cpass);
        $emailquery=" select * from registration where email='$email' ";
        $query=mysqli_query($con, $emailquery);
        $emailcount=mysqli_num_rows($query);
        if($emailcount>0)
        {
              ?>
              <script >
              alert("email already Exist"); 
              </script>
              <?php 
        }
         
        
        else
          {
          if($pass ==$cpass)
            {
              $insertquery="insert into  registration( O_Name,email,mobile,password, cpassword) values('$owner',' $email','$mobile','$p','$cp')";
              $iquery=mysqli_query($con,$insertquery);
                      if($iquery)
                    {
                      ?>
                      <script >
                      alert("inserted successfully"); 
                      </script>
                      <?php 
                    }
                      else
                        {
                          ?>
                        <script >
                        alert("Not inserted");  
                        </script>
                        <?php 
                        }
            }
            else
            {
                  ?>
                    <script >
                    alert( "Password not matched"); 
                    </script>
                  <?php 
             
            }
          }
  }*/
 if(isset($_POST['l1']))
  {
      $email=$_POST['emails1'];
      $password=$_POST['passwords1'];
      $email_search="select * from customer where email='$email' "; 
      $query=mysqli_query($con,$email_search);
      $email_count=mysqli_num_rows($query);
      //echo $query['email'];
      if($email_count)
      {
        $email_pass=mysqli_fetch_assoc( $query);
        $db_pass=$email_pass['password'];
        $_SESSION['name1']= $email_pass['name'];
         /*$_SESSION['name1']= $email_pass['f_name'];
           $_SESSION['lname1']= $email_pass['l_name'];
          $_SESSION['email1']= $email_pass['email'];
           $_SESSION['mobile1']= $email_pass['mobile'];
      $_SESSION['id1']= $email_pass['id'];*/
        //$pass_decode=password_verify($password, $db_pass);
        if(md5( $password)==$db_pass)
        {
          echo "Login Sucessful";
          ?>
          <script >
            location.replace("home.php");
          </script>
          <?php
        }
        else
        {
          echo "Password Incorrect";
        }
          
      }
        else
        {
          echo "user Doesn't exist";
        }

      }
  
if(isset($_POST['l2']))
  {
    $email=$_POST['emails2'];
     $password=$_POST['passwords2'];
      $email_search="select * from registration1 where email='$email' "; 
      $query=mysqli_query($con,$email_search);
      $email_count=mysqli_num_rows($query);
      if($email_count)
      {
        $email_pass=mysqli_fetch_assoc( $query);
        $db_pass=$email_pass['password'];
           $_SESSION['name2']= $email_pass['f_name'];
        /*  $_SESSION['lname2']= $email_pass['l_name'];
          $_SESSION['email2']= $email_pass['email'];
           $_SESSION['mobile2']= $email_pass['mobile'];
                 $_SESSION['id2']= $email_pass['id'];*/
        //$pass_decode=password_verify($password, $db_pass);
        if( md5($password)==$db_pass)
        {
          echo "Login Sucessful";
          ?>
          <script >
            location.replace("home1.php");
          </script>
          <?php
        }
        else
        {
          echo "Password Incorrect";
        }
          
      }
        else
        {
          echo "user Doesn't exist";
        }

      }
  
  ?>
  
  
 <header id="head">
  

            <main>
                <section>
          
      
     
    <div class="header">

      <a href="home.html" class="logo">HairCraft</a>
      <div class="header-right">
        <a href="home.html">Home</a>
        <a href="home.html">Contact</a>
        <a href="home.html">About</a>
      </div>
    </div>
  </section>
    <section>
      <!--1st -->

    <div id="myDIV1" style="display: block;">
        <h3>Welcome To HairCraft</h3>
      <h1>DO COME & Experience <span class="change_content"> </span> <span style="margin-top: -10px;"> | </span> </h1>
      <p>"We provide Services through appointments , to avoid overcrowding and save your time"</p>
        <button class="btnone" onclick="myFunction1()">Customer</button>
      <button class="btntwo" onclick="myFunction2()">Admin</button>
      
  </div>
  <!--2nd -->

    <div id="myDIV2" style="display: none;" >
      <!--student Login-->
       <div id="myDIV4" style="display: block;" >
       <div class="main_div">
        
      <div class="box" style="top: 50%">
      <button class="btnone" style='margin-right:10px; margin-bottom: 20px;' 
      onclick="myFunction4()">Login</button>
    <button class="btntwo" style='margin-right:20px;margin-bottom: 20px;' onclick="myFunction5()">SignUP</button>
        <h4>customer login</h4>
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="input-box">
            <input
              type="text"
              name="emails1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Email</label>
          </div>
          <div class="input-box">
            <input
              type="password"
              name="passwords1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Password">Password</label>
          </div>
          <input type="submit" value="Login" name="l1"/>
        </form>
      </div>

    </div>
     <button class="btntwo" onclick="myFunction3()">Back</button> 
       </div>
       <!--student login end-->
        <!--student create account start-->
        <div id="myDIV5" style="display: none;" >
        <div class="main_div">
      <div class="box">
        <button class="btnone" style='margin-right:10px; margin-bottom: 20px;' 
      onclick="myFunction4()">Login</button>
    <button class="btntwo" style='margin-right:20px;margin-bottom: 20px;' onclick="myFunction5()">SignUP</button>
        <h4>Customer Create Account</h4>
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
             
  <select id="city" class="drop" name="city">
     <option value="">--Select City--</option>
    <option value="Bhopal">Bhopal</option>
    <option value="Patna">Patna</option>
    <option value="Raipur">Raipur</option>
    <option value="Sagar">Sagar</option>
     <option value="Noida">Noida</option>
  </select>
           
          </div>
           <div class="input-box">
             
  <select id="ward" class="drop" name="ward">
     <option value="">--Select Ward No. --</option>
    <option value="1">1</option>
    <option value="">2</option>
    <option value="3">3</option>
   <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
  </select>
  <select id="wardn" class="drop" name="wardn">
     <option value="">--Select Ward Name--</option>
    <option value="sahit">Sahit</option>
    <option value="mow">Mow</option>
    <option value="Tilak nagar">Tilak Nagar</option>
    <option value="sagar">Sagar</option>
     <option value="saraswati nagar">Saraswati nagar</option>
  </select>

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
          <input type="submit" value="Create Account" name="ca1"/>
         <button class="back" onclick="myFunction3()">Back</button>
         
        </form>

      </div>

    </div> 
      <!--student create account end-->
        </div>
    
    </div>
    <!--3rd -->
     <div id="myDIV3" style="display: none;" >
       
      <!--tutor Login-->
       <div id="myDIV6" style="display: block;" >
       <div class="main_div">
      <div class="box" style="top: 50%">
        <button class="btnone" style='margin-right:10px; margin-bottom: 20px;' 
      onclick="myFunction6()">Login</button>
    <button class="btntwo" style='margin-right:20px;margin-bottom: 20px;' onclick="myFunction7()">SignUP</button>
        <h4>Admin login</h4>
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="input-box">
            <input
              type="text"
              name="emails2"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Email</label>
          </div>
          <div class="input-box">
            <input
              type="password"
              name="passwords2"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Password">Password</label>
          </div>
          <input type="submit" value="Login" name="l2" />
        </form>
      </div>

    </div>
     <button class="btntwo" onclick="myFunction3()">Back</button> 
       </div>
       <!--tutor login end-->
        <!--tutor create account start-->
        <div id="myDIV7" style="display: none;" >
        <div class="main_div">
      <div class="box">
        <button class="btnone" style='margin-right:10px; margin-bottom: 20px;' 
      onclick="myFunction6()">Login</button>
    <button class="btntwo" style='margin-right:20px;margin-bottom: 20px;' onclick="myFunction7()">SignUP</button>
        <h4>Admin Create Account</h4>
     <!--   <form action="<?php/* echo htmlentities*/($_SERVER[/*'PHP_SELF'*/]); ?>" method="POST">
        <div class="input-box">
            <input
              type="text"
              name="state1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">State</label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="city1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">City/Town </label>
          </div>
          <div class="input-box">
            <input
              type="number"
              name="ward1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Ward No. </label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="wardn1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Ward Name </label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="add1"
              id="add"
              autocomplete="off"
              required
            />
            <label for="Username">Full Adress</label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="shop1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Shop Name </label>
          </div>
           <div class="input-box">
            <input
              type="text"
              name="owner1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Owner Name</label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="email1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Email </label>
          </div>
           <div class="input-box">
            <input
              type="number"
              name="mobile1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Contact No.</label>
          </div>
           <div class="input-box">
            <input
              type="number"
              name="seat1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Seats</label>
          </div>
           <div class="input-box">
            <input
              type="time"
              name="lunch1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Lunch Time</label>
          </div>
           

            <div class="input-box"> 
            <p>Off Days</p>
           </div>
             <table border="0">
              <tr>
                
                <td width="50%"> <label for="Username">Sunday</label></td>
                <td width="50%"><input 
              type="checkbox" name="days[]" id="name" value="Sunday"
        class="form-control" autocomplete="off"/>
              </td>
              <td>
                  <label for="Username">Monday</label>
                </td>
                <td><input
              type="checkbox"
              name="days[]"
              class="form-control"
              id="name"
              value="Monday"

              autocomplete="off"
            
            /></td>
              </tr>
              <tr>
                
                <td>        <label for="Username">Tuesday</label></td>
                <td><input
              type="checkbox"
              name="days[]"
              class="form-control"
              id="name"
              value="Tuesday"
              autocomplete="off"
            
            /></td>
              <td><label for="Username">Wednesday</label></td>
                                <td> <input
              type="checkbox"
             name="days[]"
              class="form-control"
              value="Wednesday"
              id="name"
              autocomplete="off"
             
            /></td>
              </tr>
              <tr>
                <td><label for="Username">Thursday</label></td>
                <td>
                  <input
              type="checkbox"
             name="days[]"
              id="name"
              value="Thursday"
              class="form-control"
              autocomplete="off"
             
            />
                </td>
                  <td>
                  <label for="Username">Friday</label>
                </td>
                <td><input
              type="checkbox"
             name="days[]"
              id="name"
              autocomplete="off"
              value="Friday"
              class="form-control"
           
            /></td>
              </tr>
              <tr>
                
                <td colspan="2"><label for="Username">Saturday</label></td>
                <td colspan="2"> <input
              type="checkbox"
              class="form-control"
               name="days[]"
              id="name"
              value="Saturday"
              autocomplete="off"
        
            /></td>
              </tr>
            </table >
          <div class="input-box">
                <p>Services</p>
              </div>

           <div class="input-box">
             
  <select id="services" class="drop" name="services1">
     <option value="">--select--</option>
    <option value="Hair">Hair Cut</option>
    <option value="spa">Spa</option>
    <option value="beard">Beard Shave</option>
    <option value="groom">Grooming</option>
  </select>
           
          </div> -->
           
          
              
          
         
        
            
                  <!-- <div class="form-group">
          
              <p class="font-weight-bold" style="text-align: center;">Payment Mode</p>
            </div>
            <table border="0" style="width:100%; border-spacing:0 15px;border-collapse:separate;">
              <tr>
                <td width="50%"> <label for="Username">Online Mode</label></td>
                <td width="50%"> <input
              type="radio"
             
              class="form-control"
              id="name"
                name="mode"
                 
              autocomplete="off"
              value="online"
              required
            /></td>
              </tr>
              <tr >
                <td>            <label for="Username">offline Mode</label></td>
                <td><input
              type="radio"
             
              class="form-control"
              id="name"
                name="mode"
                  
              value="offline"
              autocomplete="off"
              required
            /></td>
              </tr>
              <tr >
                
                <td><label for="Username">Any Mode</label></td>
                <td>
                   <input
                    type="radio"
                     name="mode"
                    class="form-control"
                    id="name"
                    value="any"
                       
                    autocomplete="off"
                   
                    required
                  />
                </td>
              </tr>
               </table>
              

          -->
            
           
           
         <!--  <div class="input-box">
            <input
              type="password"
              name="password1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Password">Create Password</label>
          </div>
          <div class="input-box">
            <input
              type="password"
              name="cpassword1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Password">Repeat Password</label>
          </div>
          <input type="submit" value="Login" name="ca2"/>
         <button class="back" onclick="myFunction3()">Back</button>
         
        </form>
 -->
         <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="input-box">
            <input
              type="text"
              name="f_name1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">First Name </label>
          </div>
           <div class="input-box">
            <input
              type="text"
              name="l_name1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Last Name</label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="email1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Email</label>
          </div>
           <div class="input-box">
            <input
              type="number"
              name="mobile1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username">Contact No.</label>
          </div>
        
          
          <div class="input-box">
            <input
              type="password"
              name="password1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Password">Create Password</label>
          </div>
           <div class="input-box">
            <input
              type="password"
              name="cpassword1"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Password">Repeat Password</label>
          </div>
          <input type="submit" value="Create Account" name="ca2" />
         <button class="back" onclick="myFunction3()">Reset</button>
         
        </form>
      </div>

    </div> 
      <!--Tutor create account end-->
        </div>
    
    </div>
    </section>

  </main>


</header>

      
    
</body>
    <script type="text/javascript">
    function myFunction1() {

        document.getElementById("myDIV1").style.display = "none";

        document.getElementById("myDIV2").style.display = "block";

        document.getElementById("myDIV3").style.display = "none";
        document.getElementById("head").style.height="200vh";
      

    }

    function myFunction2() {

      document.getElementById("myDIV1").style.display = "none";

      document.getElementById("myDIV2").style.display = "none";

      document.getElementById("myDIV3").style.display = "block";
             document.getElementById("head").style.height="200vh";
  

    }

    function myFunction3() {

      document.getElementById("myDIV1").style.display = "block";

      document.getElementById("myDIV2").style.display = "none";

      document.getElementById("myDIV3").style.display = "none";
        document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
      document.getElementById("head").style.height="100vh";
}
     function myFunction4() {

        document.getElementById("myDIV4").style.display = "block";

        document.getElementById("myDIV5").style.display = "none";

         document.getElementById("head").style.height="100vh";

        

      

    }

    function myFunction5() {

      document.getElementById("myDIV4").style.display = "none";

      document.getElementById("myDIV5").style.display = "block";

    document.getElementById("head").style.height="200vh";

  

    }

    function myFunction6() {

      document.getElementById("myDIV6").style.display = "block";

      document.getElementById("myDIV7").style.display = "none";
       document.getElementById("head").style.height="100vh";
  


    }

      function myFunction7() {

      document.getElementById("myDIV6").style.display = "none";

      document.getElementById("myDIV7").style.display = "block";

    document.getElementById("head").style.height="200vh";


    }

</script>
</html>