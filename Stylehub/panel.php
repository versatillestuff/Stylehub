 <?php 
   include 'dbcon.php';
   session_start();
   if(!isset($_SESSION['name2']))
   {
     ?>
          <script >
             alert( "You have Logged out, Plz Login again");
            location.replace("index.php");
          </script>
     <?php
   }
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Home</title>
<link rel="stylesheet" href="css/login.css"/>

    <?php 
     include 'links/link.php';
     include 'dbcon.php';
     ?>	
</head>
 <body>
    <?php
            function update_slot(&$con,&$cur_slot1)
            {
              $Ow_id=$_SESSION['Ow_id'];
              $query1="select * from owner_details
                where Ow_id=$Ow_id;";
              $result1=mysqli_query($con,$query1);
              if($result1)
              {
                $row1=mysqli_fetch_assoc($result1);
                $slot=time();
                 $h = new SplMinHeap();
                $str=$row1["time_string"];
                $delimiter=" ";
                $token=strtok($str,$delimiter);
                #echo strtotime($token)." ";
                #echo strtotime($cur_slot1);
                  while($token)
                  {
                    if(strtotime($token)<strtotime($cur_slot1))
                    {
                      $h->insert(strtotime($cur_slot1));
                    }
                    else{
                      $h->insert(strtotime($token));
                    }
                    $token=strtok($delimiter);
                  }
                $str1="";
                $cur_slot=(string)date('h:ia',$h->top());
                while(!$h->isEmpty())
                {
                  $str1.=(string)date('h:ia',$h->top())." ";
                  $h->extract();
                }
                #echo $str1;
                $query2="update owner_details
                  set cur_slot='$cur_slot1', time_string='$str1'
                  where Ow_id='$Ow_id';";
                $result2=mysqli_query($con,$query2);
                if(!$result2)
                {
                  if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
                  {
                      echo mysqli_error($con);
                  }
                }
                else
                {?>
                <script>
                  /*location.replace("panel.php");
                </script>
                <?php
                }
              }
              else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
              {
                  echo mysqli_error($con);
              }
            }
            if(isset($_POST['changetime']))
            {
              $cur_slot1=mysqli_real_escape_string($con,$_POST['slot']);
              update_slot($con,$cur_slot1);
            }
      ?>
    <header>
      <main>
          <section>
            <div class="header">
              <a href="#" class="logo">HairCraft</a>
                <a href="#">Home</a>
                <a href="#about">Contact</a>
                <a href="#about">About</a>
                <a href="logout.php" id="right1">SignOut</a>
                <a class='no-link' href="#" id="right2">Welcome,<?php echo $_SESSION['name2']; ?></a>
            </div>
          </section>
        </main>
        <?php
        #taking updated current slot
                #console.log(123);
                header("refresh: 60*5");  #for auto refreash after every five minutes to update current slot and time_string
                $Ow_id=$_SESSION['Ow_id'];
                $Shop_name=$_SESSION['Shop_name'];
                $query1="select cur_slot from owner_details where Ow_id='$Ow_id'";
                $result1=mysqli_query($con,$query1);
                if($result1)
                {
                  while($row1=mysqli_fetch_array($result1))
                  {
                    $cur_slot=max($row1['cur_slot'],date("h:ia",time()));
                    update_slot($con,$cur_slot);
                  }
                }
                else if(isset($_GET['Check_error']) && $GET['Check_error']='abc')
                {
                    echo mysqli_error($con);
                }
            ?>
          <section class="section">
            <div class="box" style="top: 40%;">
              <form action=" <?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                <div class="input-box">
            <input
              type="text"
              name="slot" 
              value="<?php echo $cur_slot ;?>"
              id="name"
              autocomplete="off"
              required
            />
            <label for="Username"><?php echo $Shop_name; ?></label>
          </div>
          <div class="input-box">
             <p class="font-weight-bold" style="text-align: center;">Formate : HH:MM:AM/PM</p>
          </div>
        <div class="input-box">
            <input
              type="submit"
            name="changetime"
              value="change" 
            />
          </div>
            </form>
           </div>
          </section>
              
         </main>
         </header>
    <section>
 <!-- *************************footer start************************* -->
<?php                
   include 'foot.php';

     ?>
    </section>
   
<!-- Footer -->
<!-- **************************** footer ends *********************/ -->

    
</body>
</html>