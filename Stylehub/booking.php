<?php 
  date_default_timezone_set('Asia/Kolkata'); #setting default timezone
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
   session_start(); #for hiding notices
   if(!isset($_SESSION['name1']))
   {
     ?>
          <script >
             alert( "You have Logged out Plz Login");
             location.replace("index.php");*/
          </script>
     <?php
   }
   else{
   # echo $_SESSION['name1']."in booking.php";
   }
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Booking</title>
<link rel="stylesheet" href="css/login.css"/>
 <?php 
     include 'links/link1.php';
     include 'dbcon.php';
     ?>
</head>
<body>
  <?php
    if(isset($_POST['booking']))
    {
      $shop=$_POST['shop'];
      if(!$shop)
      {
        ?>
          <script>
            alert("Pls select the shop");
          </script>
        <?php
      }
      else
      {
        $services=$_POST['services'];
        $time=0;
        $price=0;
        $n=count($services);
        #echo $n."<br>here";
        for($i=0;$i<$n;++$i)
        {
          $col=$services[$i];
          $t=$col."_"."time";
          $p=$col."_"."price";
          $query4="select $t,$p from service_per_shop
            where Ow_id='$shop'";
          $result4=mysqli_query($con,$query4);
          if($result4)
          {
            while($row4=mysqli_fetch_array($result4))
            {
              $time+=$row4["$t"];
              $price+=$row4["$p"];
            }
            #echo $time." ".$price."<br>";
          }
          else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
          {
            echo mysqli_error($con);
          }
        }
        #putting optimized time again in database with the use of heap
        $query5="select city,Ward_no,Ward_Name,Shop_name,cur_slot,time_string from owner_details where Ow_id='$shop'";
        $result5=mysqli_query($con,$query5);
        $Shop_name1;
        $city1;
        $Ward_no1;
        $Ward_name1;
        if($result5)
        {
          $n=mysqli_num_rows($result5);
          #echo $n."<br>";
          while($row5=mysqli_fetch_array($result5))
          {
            $Shop_name1=$row5["Shop_name"];
            #echo $Shop_name."<br>";
            $city1=$row5["city"];
            $Ward_no1=(int)$row5["Ward_no"];
            $Ward_name1=$row["Ward_name"];
            #String tokenazier
            $h = new SplMinHeap();
            $str=$row5["time_string"];
            #echo$str."<br>";
            #echo"dfghb".$str.$row5["Ow_id"];
            $delimiter=" ";
            #checking first if avilable time is greater then current system time or not.
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
            else  #when everything is normal
            {
              while($token)
              {
                $h->insert(strtotime($token));
                $token=strtok($delimiter);
              }
            }
            $a1 = $time;
            $b1=$h->extract();
            $h->insert($b1+$a1*60);
            #echo date('h:ia',$h->top())."<br>";
            $st1r="";
            $cur_slot1=(string)date('h:ia',$h->top());
            while(!$h->isEmpty())
            {
              $str1.=(string)date('h:ia',$h->top())." ";
              $h->extract();
            }
            #echo "...".$str;
            $query6="update owner_details
              set cur_slot='$cur_slot1', time_string='$str1'
              where Ow_id='$shop';";
            $result6=mysqli_query($con,$query6);
            if(!$result6)
            {
              if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
              {
                  echo mysqli_error($con);
              }
            }
            else{
                $str1="Your appointment is set at ".$cur_slot1.",total price : Rs".$price.",Shop Name : ".$Shop_name1.",Ward No. ".$Ward_no1." ".$Ward_name1."".$city1;
                  $alert="<script>alert('$str1')</script>";
                  echo $alert;
                  $mobile=$_SESSION['mobile'];
                  #header('location:booking1.php');
                  ?>
                  <script type="text/javascript">
                    location.replace("booking1.php");
                  </script>
                  <?php
            }
          }
        }
        else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
        {
          echo mysqli_error($con);
        } 
      }
    }
  ?>
     <header class="book_head">
      <main>
<section>
<div class="header">
        <a href="#" class="logo">HairCraft</a>
          <a href="#">Home</a>
          <a href="#about">Contact</a>
          <a href="#about">About</a>
          <a href="logout.php" id="right1">SignOut</a>
          <a class='no-link' href="#" id="right2">Welcome,<?php echo $_SESSION["name1"]; ?></a>
  </div>
</section>
 <section>
      <div class="box" style="top:65%;">
  <?php
     $state=$_SESSION['state'];
          $city=$_SESSION['city'];
          $Ward_no=$_SESSION['Ward_no'];
          $gender=$_SESSION['gender'];
    $query1="select * from owner_details
              where (state='$state'
               and (City='$city' and (Ward_no='$Ward_no' and(Gender='$gender' or Gender='Both'))))";
    $result1=mysqli_query($con,$query1);
    $count=mysqli_num_rows($result1);
    #updating cur_slots and time_String
    if($result1)
    {
      while($row1=mysqli_fetch_array($result1))
      {
        if($row1['cur_slot']<time())
        {
                $slot=time();
                $h = new SplMinHeap();
                $str=$row1["time_string"];
                $delimiter=" ";
                $token=strtok($str,$delimiter);
                if(strtotime($token)<time())
                {
                  #echo $token;
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
                else{
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
                #echo $str1;
                $Ow_id=$row1['Ow_id'];
                $query5="update owner_details
                  set cur_slot='$cur_slot', time_string='$str1'
                  where Ow_id='$Ow_id';";
                $result5=mysqli_query($con,$query5);
                if(!$result5)
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
        $query2="select * from owner_details
              where (state='$state'
               and (City='$city' and (Ward_no='$Ward_no' and(Gender='$gender' or Gender='Both'))))";
      #echo $query2;
    $result2=mysqli_query($con,$query2);
    $query3="select count(*)as no from services";   #counting total no of services
    $result3=mysqli_query($con,$query3);
    $n=0;
    while($row3=mysqli_fetch_array($result3))
    {
      $n=$row3['no'];
      #echo"here".$n;
    }
    if($result2)
    {
        $count=mysqli_num_rows($result2);
        if($count<=0)
        {
          echo "<h2>SRY!! No Shop Avilable  in your choosen area<h2>";
        }
        else
        {
         ?>
          <h2>Book A slot</h2>
           <form action=" <?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
           <?php
            $i=0;
            while($row2=mysqli_fetch_array($result2))   #for accessing all shops Ow_id wise
            {
              #echo ($row2["cur_slot"])." ".($row2["C_time"]);

               if(strtotime($row2["cur_slot"])<strtotime($row2["C_time"]))
               { 
                ++$i;
               echo "<table border='0' style='width:100%; border-spacing:0 15px;border-collapse:separate;' class='tab'>
                 <tr >
                <th width='20%' > <label for='Shop Name'>Shop Name</label></th>
                  <th width='20%' > <label for='Shop Name'>Choose</label></th>
                 <th width='20%'> <label for='Openingin time'>Opening time</label></th>
                <th width='20%'> <label for='Closing time'>Closing time</label></th>
                <th width='20%'> <label for='Time'>Current Free Slot</label></th>
              </tr>";
              $Ow_id=$row2['Ow_id'];
              
              echo "<tr >"; 
              echo "<td>" . $row2["Shop_name"] . "</td>";
              echo "<td>" . '<input type="checkbox" type="radio" name="shop" value="'.$Ow_id.'"  class="form-control">
                  ' . "</td>"; 
               
                if($row2['Active']==0)
                {
                  echo "<td>" . $row2["O_time"] . "</td>";
                  echo "<td>" . $row2["C_time"] . "</td>";
                  echo "<td>" . $row2["cur_slot"] . "</td>";
                  #make it active later
                }  
                else
                {
                  echo "<td colspan='3'><label>Wait for few movements and refresh</label></td>";
                  
                }
                 echo "</tr>";
                if($result2)
                {
                  echo "<tr >"; 
                  echo "<td colspan='5'> <h5 id='col'>Shop    ". $row2["Shop_name"] ."   Services</h5> </td>";
                  echo "</tr >";
                   echo "<tr>";
                    $i=1;
                    $id=$row2['Ow_id'];
                    echo "<td colspan='2'> <label>Name</label> </td>";
                      echo "<td> <label>Y/N</label> </td>";
                  echo "<td>   <label>Price</label></td>";
                  echo "<td><label>Time</label></td>";
                  echo "</tr>";
                    $m=(int)$n;
                    for($i=1;$i<=$m;++$i)   
                    {
                      $col="S";
                      $col.=$i;
                      $price=$col;
                      $price.="_price";
                      $time=$col;
                      $time.="_time";
                      $name=$col;
                      $name.="_name";
                      #echo $price." ".$time." ".$name;
                      $query4="select $name,$time,$price from service_per_shop where
                        (Ow_id='$id' and
                        $col='1')";
                      $result4=mysqli_query($con,$query4);
                      if($result4)
                      {
                        while($row4=mysqli_fetch_array($result4))
                         {
                           echo "<tr>";
                          $p=$row4["$price"];
                          $t=$row4["$time"];
                          $sname=$row4["$name"];
                            echo "<td colspan='2'>" .  $sname . "</td>";
                            echo "<td>" . '<input type="checkbox" value="'
                          .$col
                          .'" name="services[]" class="form-control" maxlength="4" size="4">'. "</td>";
                            echo "<td>" . '<input type="text" value="'
                          .$p
                          .'"name="price" class="form-control" maxlength="4" size="4" disabled>' . "</td>";

                          echo "<td>" .'<input type="text" value="'
                          .$t.'"name="time" class="form-control" maxlength="4" size="4" disabled>'. "</td>";
                            echo "</tr>";

                        }

                      }
                      else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
                      {
                          echo mysqli_error($con);
                      }
                      
                    }
                }
              }
              echo"</table>";
            }
            if($i==0)
              {
                echo "<h2>Sry...No Shop is open in your area this time!!<h2>";
              }
              else {
                  echo "<input type=Submit value='Book Slot' name='booking'/>";
              }
            echo "</form>";
        }
                            
    }
    else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
    {
                  echo mysqli_error($con);
    }

  ?>
       
     
      </div>
    </section>
        </main>
    </header>
   <!-- <section>
      <?php 
    /* include 'foot.php';*/
     ?>

    </section> -->
   
<!-- Footer -->
<!-- ********** footer ends *******/ -->
</body>
</html>