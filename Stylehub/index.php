<?php 
   session_start();
  date_default_timezone_set('Asia/Kolkata'); 
  /*
    Use the below code in place of every mysqi_error() part and put Check_error=abc in your web address when the website is live so that whenever error comes it will only be shown to you and not to any live user.
    if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
    {
      echo mysqli_error($con);
    }
  */
 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
    
     <?php 
     include 'links/link1.php'
     ?>
  <script type="text/javascript" src="js/index_script.js"></script>
  <link rel="stylesheet" type="text/css" href="css/login.css"/>
   </head>
<body>
      <!-- php portion start -->
<?php
      /*  data base connection start*/
  include 'dbcon.php';

      /*  data base connection end*/


      /* customer create accont start) */
    if(isset($_POST['Customer_signup']))
    {

        $state1=mysqli_real_escape_string($con,$_POST['state']) ;
        $city1=mysqli_real_escape_string($con,$_POST['city']);
        $ward1=mysqli_real_escape_string($con,$_POST['ward']);
        $wardn1=mysqli_real_escape_string($con,$_POST['wardn']);
        $name1=mysqli_real_escape_string($con,$_POST['name']);
        $email1=mysqli_real_escape_string($con,$_POST['email']);
        $mobile1=mysqli_real_escape_string($con,$_POST['mobile']);
        $gender1=mysqli_real_escape_string($con,$_POST['gender']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpassword']);
        #$p=md5($pass);
        $cp=md5($cpass);
        $mobilequery="select * from customer where Mobile='$mobile1' ";
        $query=mysqli_query($con, $mobilequery);
        $mobilecount=mysqli_num_rows($query);
        if($mobilecount>0)
        {
              ?>
              <script >
              alert("Mobile no already Exist"); 
              </script>
              <?php 
        }
        else
        {
          if($password==$cpass)
          {
           $insertquery="insert into customer(state, City, Ward_no,Ward_name,name,email,Mobile,Gender,password) values('$state1',' $city1','$ward1','$wardn1',' $name1','$email1',' $mobile1','$gender1','$password')";
             echo gettype($ward1);
              $iquery=mysqli_query($con,$insertquery);
                      if($iquery)
                      {
                        $_SESSION['mobile']=$mobile1;
                        $_SESSION['name1']=$name1;
                        $_SESSION['state']=$state1;
                        $_SESSION['city']=$city1;
                        $_SESSION['Ward_No']=$ward1;
                        $_SESSION['Ward_name']=$wardn1;
                        $_SESSION['gender']=$gender1;
                        $_SESSION['email']=$email1;
                        $_SESSION['password']=$password;
                        #echo "sdfgh".$state1." ".$city1." ".$ward_no;
   
                        ?>
                        <script>
                        location.replace("booking1.php");
                        </script>
                      <?php 
                    }
                      else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
                      {
                          echo mysqli_error($con);
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
     /*   customer create accont end */
     /* Admin signup */
  if(isset($_POST['ca2']))
  {
       
        $state=mysqli_real_escape_string($con,$_POST['state1']) ;
        $city=mysqli_real_escape_string($con,$_POST['city1']);
        $ward=mysqli_real_escape_string($con,$_POST['ward1']);
        $wardn=mysqli_real_escape_string($con,$_POST['wardn1']);
        $add=mysqli_real_escape_string($con,$_POST['add1']);
        $shop_name=mysqli_real_escape_string($con,$_POST['shop1']);
        $o_name=mysqli_real_escape_string($con,$_POST['owner1']);
        $seats=mysqli_real_escape_string($con,$_POST['seat1']);
        $o_time=strtotime(mysqli_real_escape_string($con,$_POST['o_time']));
        $o_time = date("h:i",$o_time);
        $c_time=strtotime(mysqli_real_escape_string($con,$_POST['c_time']));
        $c_time = date('h:ia',$c_time);
        $Lunch_time=strtotime(mysqli_real_escape_string($con,$_POST['lunch1']));
        $Lunch_time = date('h:i',$Lunch_time);
        $email=mysqli_real_escape_string($con,$_POST['email1']);
        $mobile=mysqli_real_escape_string($con,$_POST['mobile1']);
        $password=mysqli_real_escape_string($con,$_POST['password1']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpassword1']);
        $gender=mysqli_real_escape_string($con,$_POST['gender']) ;
        $off_days='';
        $i=1;
        $time_string="";
        #echo "here";
        while($i<=$seats)
        {
          $time_string.=strtotime($o_time)." ";
          $i+=1;
        }
        #echo $time_string;
        #$p=md5($password); #for encrypting the password
        #$cp=md5cpass);
        $mobilequery=" select Ow_id from owner_details where mob='$mobile' ";

        $query=mysqli_query($con, $mobilequery);
        $mobilecount=mysqli_num_rows($query);
        if($mobilecount>0)
        {
              ?>
              <script >
              alert("mobile no already Exist"); 
              </script>
              <?php 
        }
        else
          {
          if($password ==$cpass)
            {

              $query1="insert into  owner_details(state,city,Ward_no,Ward_Name,Address,Shop_name,Ow_Name,email,mob,seats,Lunch_time,password,O_time,C_time,cur_slot,gender,time_string) values('$state','$city','$ward','$wardn','$add','$shop_name','$o_name','$email','$mobile','$seats','$Lunch_time','$password','$o_time','$c_time','$o_time','$gender','$time_string')";
              $result1=mysqli_query($con,$query1);
              $id=0;
              $cur_slot;
              $row1;
              if($result1)
              {
                ##Query for putting avilable Services , prices and time
                #trying to get the newly created Ow_id with the help of mobile no
                  $query2="select * from owner_details where mob='$mobile'";
                  $result2=mysqli_query($con,$query2);
                   if($result2)
                   {
                      while($row2=mysqli_fetch_array($result2))
                      {
                          $id=$row2['Ow_id'];
                          $cur_slot=$row2['cur_slot'];
                          if($cur_slot<time())
                          {
                            $t=time();
                            $query3="update owner_details set cur_slot='$t' where Ow_id=$id";
                            $result3=mysqli_query($con,$result3);
                            
                            if(!$result3)
                            {
                              if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
                              {
                                echo mysqli_error($con);
                              }
                            }
                          }
                      }
                   }
                   else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
                  {
                        echo mysqli_error($con);
                  }
                  
                   
                   
                #code for chossing services by admin...not working properly, problem with $services array
                $j=1;
                $service=$_POST['services'];
                $price=$_POST['price'];
                $time=$_POST['time'];
                $n=count($service);
                for($i=0;$i<$n;$i++)
                {
                   $c1=$service[$i];
                   $c2=$c1."_time";
                   $c3=$c1."_price";
                   #echo $c1." : ".$c2." : ".$c3."<br>".$price[$i]." : ".$time[$i];
                   $query3="insert into service_per_shop($c1,$c2,$c3) values('1','$price[$i]',$time[$i])";   #not working try later
                   $result3=mysqli_query($con,$query3);
                   if(!$result3)
                   {
                    echo mysqli_error($con);
                   }
                }
                 #sleep(20);
                #putting session varialbles
                 $_SESSION['name2']= $o_name;
                 $_SESSION['Ow_id']= $id;
                 $_SESSION['cur_slot']= $cur_slot;
                 $_SESSION['Shop_name']=$shop_name;
                ?>  
                  <script >
                  /*alert("inserted successfully"); */
                        location.replace("panel.php");
                      </script>
                      <?php 
              }
              else if(isset($_GET['Check_error']) && $GET['Check_error']=='abc')
              {
                    echo mysqli_error($con); 
                ?>
                <script >  
                  /*alert("Not inserted"); */ 
                </script>
                <?php
              }
            }
            else
            {
              ?>
              <script >
                alert( "Incorrect Password");
              </script>
              <?php    
            }
          }
  }

       /*customer login form starts */
  if(isset($_POST['customer_login']))
  {
      $mobile1=mysqli_real_escape_string($con,$_POST['mobile1']);
      $password=mysqli_real_escape_string($con,$_POST['passwords1']);
      #echo"...".$mobile1." ".$password;
      $query1="select * from customer where Mobile=$mobile1"; 
      $result1=mysqli_query($con,$query1);
      $count=mysqli_num_rows($result1);
      if($count>0)
      {
        while($row1=mysqli_fetch_array($result1))
        {
          $db_pass=$row1["Password"];
          #echo "sdf ".$db_pass." 
          if($password==$db_pass){
            #echo "Login Sucessful";
            $_SESSION['name1']=$row1['Name'];
            $_SESSION['mobile']=$row1['Mobile'];
            $_SESSION['state']=$row1['state'];
            $_SESSION['city']=$row1['City'];
            #echo ",".$row1['City'];
            $_SESSION['Ward_No']=$row1['Ward_no'];
            #echo gettype($row1['Ward_no']);
            $_SESSION['Ward_name']=$row1['Ward_name'];
            $_SESSION['gender']=$row1['Gender'];
            $_SESSION['email']=$row1['Email'];
            $_SESSION['password']=$row1['Password'];
            ?>
            <script >
              location.replace("booking1.php");
            </script>
            <?php
          }
          else
          {
            ?>
            <script>
              alert("Incorrect Password");
            </script>
            <?php
          }
        }
      }
      else
      {
          if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
          {
            echo mysqli_error($con);
          }
       ?>
          <script>
            alert("user Doesn't exist");
          </script>
        <?php
      }
    }
    
      /* customer login form (end)*/

        /* admin login form (start)*/
  if(isset($_POST['l2']))
  {
    $mobile1=mysqli_real_escape_string($con,$_POST['mobile2']);
      $password=mysqli_real_escape_string($con,$_POST['passwords2']);
    $mobile_search="select * from owner_details where mob='$mobile' "; 
      $query=mysqli_query($con,$mobile_search);
      $mobile_count=mysqli_num_rows($query);
      if($mobile_count)
      {
        #echo"HERe";
        $mobile_pass=mysqli_fetch_assoc( $query);
        $Ow_id=$mobile_pass['Ow_id'];
        $db_pass=$mobile_pass['Password'];
        $_SESSION['name2']= $mobile_pass['Ow_Name'];
        if($password==$db_pass)
        {
          #echo "Login Sucessful";
          $_SESSION['Ow_id']=$mobile_pass['Ow_id'];
          $_SESSION['cur_slot']=$mobile_pass['cur_slot'];
          $_SESSION['Shop_name']=$mobile_pass['Shop_name'];
          #chaning current slot if it is smaller then actual current time
          if($mobile_pass['cur_slot']<time())
          {
            $slot=time();
             $h = new SplMinHeap();
            $str=$mobile_pass["time_string"];
            #echo $str;
            $delimiter=" ";
            $token=strtok($str,$delimiter);
            if(strtotime($token)<time())
            {
              while($token)
              {
                if(strtotime($token)<time())
                {
                  $h->insert(time());
                }
                else{
                  $h->insert(strtotime($token));
                }
                $token=strtok($delimiter);
              }
            }
            else
            {
              while($token)
              {
                #echo $token. "<br>";
                $h->insert(strtotime($token));
                $token=strtok($delimiter);
              }
            }
            $str1="";
            $cur_slot=(string)date('h:ia',$h->top());
            while(!$h->isEmpty())
            {
              $str1.=(string)date('h:ia',$h->top())." ";
              $h->extract();
            }
            echo $str1;
            $query1="update owner_details
              set cur_slot='$cur_slot', time_string='$str1'
              where Ow_id='$Ow_id';";
            $result1=mysqli_query($con,$query1);
            if(!$result1)
            {
              if(isset($_GET['Check_error']) && $GET['Check_error']=='abc')
              {
                echo mysqli_error($con);
              }
            }
          }
          header('location:panel.php');
          ?>
          <?php
        }
        else
        {
          ?>
            <script>
              alert("Incorrect Password");
            </script>
            <?php
        }
          
      }
        else
        {
          ?>
            <script>
              alert("User Doesn't exist");
            </script>
            <?php
        }
      }
        /*admin login form (end)*/
  ?>
  <!-- php portion end -->
  
 <header id="head">
 
   
       <!-- <div class="header">
  <a class="logo" href="#"><i ></i>HairCraft</a>
    <a href="#"><i class="fa fa-fw fa-home"></i> Search</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Home</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
</div>
     -->
    <main>
    <!-- navbar section start -->
   <section>
     <div class="header">
      <a href="index.php" class="logo">HairCraft</a>
        <a href="index.php">Home</a>
        <a href="index.php">Contact</a>
        <a href="index.php">About</a>
      </div>
    
  </section>

    <section class="navb">
      <!--1st div which have changing text start -->

    <div id="myDIV1" style="display: block;">
        <h3>Welcome To HairCraft</h3>
      <h1>DO COME & Experience <span class="change_content"> </span> <span style="margin-top: -10px;"> | </span> </h1>
      <p>"We provide Services through appointments , to avoid overcrowding and save your time"</p>
        <button class="btnone" onclick="myFunction1()">Customer</button>
      <button class="btntwo" onclick="myFunction2()">Admin</button>
  </div>

    <!--customer section  start -->
    <div id="myDIV2" style="display: none;" >
    
      <!--customer login form start -->
      <div id="myDIV4" style="display: block;" >
        <div class="main_div">
          <div class="box" style="top: 50%">
            <button class="btnone" style='margin-right:10px; margin-bottom: 20px;' 
              onclick="myFunction4()">Login</button>
            <button class="btntwo" style='margin-right:20px;margin-bottom: 20px;' onclick="myFunction5()">SignUP</button>
            <h4>customer login</h4>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
              <div class="input-box">
                <input
                  type="text"
                  name="mobile1"
                  id="name"
                  maxlength="10"
                  autocomplete="off"
                  required
                />
                <label for="Username">Mobile No</label>
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
              <input type="submit" value="Login" name="customer_login"/>
            </form>
          </div>

    </div>
     <button class="btntwo" onclick="myFunction3()">Back</button> 
       </div>
  
    <!--customer signup form starts -->
    <div id="myDIV5" style="display: none;" >
      <div class="main_div">
        <div class="box">
          <button class="btnone" style='margin-right:10px; margin-bottom: 20px;' 
          onclick="myFunction4()">Login</button>
          <button class="btntwo" style='margin-right:20px;margin-bottom: 20px;' onclick="myFunction5()">SignUP</button>
         
          <h4>Customer Create Account</h4>
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="customer_signup">
            <div class="input-box">
              <select id="state" class="drop" name="state">
                <?php
                  $query4='select distinct state from owner_details';
                  echo '<option value="St">State</option>';
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
                <input
                  id="city" 
                  type="text"
                  name="city"
                  id="name"
                  autocomplete="off"
                  required
                />
                <label for="Username">City</label>
              </div>
              <div class="input-box">
                <input
                  id="city" 
                  type="text"
                name="ward"
                  id="ward"
                  autocomplete="off"
                  required
                />
                <label for="Username">ward Number</label>
              </div>
               <div class="input-box">
                <input
                  id="city" 
                  type="text"
                name="wardn"
                  id="wardn"
                  autocomplete="off"
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
              type="text"
              name="email"
              id="name"
              autocomplete="off"
            />
            <label for="emails1">Email</label>
          </div>
           <div class="input-box">
            <input
              type="number"
              name="mobile"
              id="mobile"
              maxlength="10"
              autocomplete="off"
            />
            <label for="Username">Contact No.</label>
          </div>
           <div class="input-box">
             
  <select id="gender" class="drop" name="gender">
     <option value="">--Select Gender--</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <!--<option value="other">Other</option>-->
   
  </select>
           
          </div>
          
           <div class="input-box">
            <input
              type="password"
              name="password"
              id="name"
              maxlength="15"
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
              maxlength="15"
              autocomplete="off"
              required
            />
            <label for="cpassword">Repeat Password</label>
          </div>
          <input type="submit" value="Create Account" name="Customer_signup"/>
         <button class="back" onclick="myFunction3()">Back</button>
         
        </form>

      </div>

    </div> 
      <!-- customer create account form end -->
        </div>
    
    </div>

    <!--customer section  end -->

    <!--admin section  start -->
    <!--3rd -->
     <div id="myDIV3" style="display: none;" >
       <!-- admin login start -->
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
              name="mobile2"
              id="name"
              maxlength="10"
              autocomplete="off"
              required
            />
            <label for="Username">Mobile No</label>
          </div>
          <div class="input-box">
            <input
              type="password"
              name="passwords2"
              id="name"
              maxlength="15"
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
       <!--admin login ends-->
      
        <!--admin signup starts-->
    <div id="myDIV7" style="display: none;" >
      <div class="main_div">
        <div class="box">
          <button class="btnone" style='margin-right:10px; margin-bottom: 20px;'onclick="myFunction6()">Login</button>
          <button class="btntwo" style='margin-right:20px;margin-bottom: 20px;' onclick="myFunction7()">SignUP</button>
          <h4>Admin Create Account</h4>
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
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
                  type="text"
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
                  maxlength="10"
                  autocomplete="off"
                  required
                />
                <label for="Username">Seats</label>
              </div>
               <div class="input-box">
                <input
                  type="time"
                  name="o_time"
                  id="name"
                  autocomplete="off"
                  #required
                />
                <label for="Username" style="font-size: 15px;">Opening time</label>
              </div>
                <div class="input-box">
                <input
                  type="time"
                  name="c_time"
                  id="name"
                  autocomplete="off"
                  #required
                />
                <label for="Username" style="font-size: 15px;">Closing Time</label>
              </div>
               <div class="input-box">
                <input
                  type="time"
                  name="lunch1"
                  id="name"
                  autocomplete="off"
                  #required
                />
                <label for="Username" style="font-size: 15px;">Lunch Time</label>
              </div>
                <div class="form-group">
          
              <p class="font-weight-bold" style="text-align: center;">Shop is for</p>
            </div>
            <table border="0" style="width:100%; border-spacing:0 15px;border-collapse:separate;">
              <tr>
                <td width="50%"> <label for="Username">Male</label></td>
                <td width="50%"> <input
              type="radio"
             
              class="form-control"
              id="name"
                name="gender"
                 
              autocomplete="off"
              value="male"
              required
            /></td>
              </tr>
              <tr >
                <td>            <label for="Username">Female</label></td>
                <td><input
              type="radio"
             
              class="form-control"
              id="name"
                name="gender"
              value="female"
              autocomplete="off"
              required
            /></td>
              </tr>
              <tr> 
              <td><label for="Username">Both</label></td>
                <td>
                   <input
                    type="radio"
                     name="gender"
                    class="form-control"
                    id="name"
                    value="Both"
                       
                    autocomplete="off"
                   
                    required
                  />
                </td>
              </tr>
               </table>
              
                 <div class="form-group">
          
              <p class="font-weight-bold" style="text-align: center;">Services</p>
            </div>
                  <table border="0" style="width:100%; border-spacing:0 15px;border-collapse:separate;">
                 <tr>
                <th width="25%" > <label for="Name">Name</label></th>
                 <th width="25%"> <label for="Y/N">Y/N</label></th>
                <th width="25%"> <label for="Price">Price</label></th>
                <th width="25%"> <label for="Time">Time (in min)</label></th>
              </tr>
                <?php
                $query1="select *from services";
                $result1=mysqli_query($con,$query1);
                $i=1;
                while($row=$result1->fetch_assoc())
                {
                  $nm="S";
                  $nm.=$i;
                    echo "<tr>"; 
                  echo "<td>" . $row['Name'] . "</td>";
                  echo "<td>" . '<input type="checkbox" value="'.$nm.'" name="services[]" class="form-control">
                  ' . "</td>";  
                   echo "<td>" . '<input type="text" value="'.$row["price"].'" name="price[]" class="form-control" maxlength="4" size="6">
                  ' . "</td>"; 
                  echo "<td>" . '<input type="text" value="'.$row["time"].'" name="time[]" class="form-control" maxlength="4" size="4">
                  ' . "</td>"; 
                   echo "</tr>";  
                  $i+=1;
                }
           // mysql_close($con);

              ?>
                </table>
      <div class="input-box">
            <input
              type="password"
              name="password1"
              id="name"
              maxlength="15"
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
              maxlength="15"
              autocomplete="off"
              required
            />
            <label for="Password">Repeat Password</label>
          </div>
          <input type="submit" value="Login" name="ca2"/>
         <button class="back" onclick="myFunction3()">Back</button>
        </form>
      </div>
    </div>       
  </div>
          <!--2nd sub div when u choose admin create account form end -->
        <!--admin create account from end-->
    </div>
    <!--3rd div when u choose admin section  end -->
    </section>
  </main>
</header>
</body>
</html>