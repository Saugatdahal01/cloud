<?php
session_start();
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
include '../connection.php';
$msg=0;
if(isset($_POST['sign']))
{

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $location=$_POST['district'];
    $address=$_POST['address'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from admin where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        // echo "<h1> already account is created </h1>";
        // echo '<script type="text/javascript">alert("already Account is created")</script>';
        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into admin(name,email,password,location,address) values('$username','$email','$pass','$location','$address')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        // $_SESSION['email']=$email;
        // $_SESSION['name']=$row['name'];
        // $_SESSION['gender']=$row['gender'];
       
        header("location:signin.php");
        // echo "<h1><center>Account does not exists </center></h1>";
        //  echo '<script type="text/javascript">alert("Account created successfully")</script>'; -->
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <script src="signin.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action=" " method="post" id="form">
        <!-- <p class="logo" style="">Food <b style="color:#06C167; ">Donate</b></p> -->
            <span class="title">Register</span>
            <br>
            <br>
            <div class="input-group">
                <label for="username">Name</label>
                <input type="text" id="username" name="username" required/>
                <div class="error"></div>
            </div>
            <div class="input-group">
                    <label for="email">Email</label>
                <input type="email" id="email" name="email" required/>
                        
                    </div>
            <!-- <div class="input-group">
                 <label for="phoneno">phone Number</label> 
                <input type="text" id="phoneno" name="phoneno" placeholder="Phone Number"  required/>
                <div class="error"></div>
            </div> -->

            <label class="textlabel" for="password">Password</label> 
             <div class="password">
              
                <input type="password" name="password" id="password"  required/>
                <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="showpassword"></i> -->
                <!-- <i class="bi bi-eye-slash" id="showpassword"></i>  -->
                <!-- <i class="uil uil-lock icon"></i> -->
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
                <?php
                    if($msg==1){
                        echo ' <i class="bx bx-error-circle error-icon"></i>';
                        echo '<p class="error">Password don\'t match.</p>';
                    }
                    ?> 
             </div>
            <!-- <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword">
                <div class="error"></div>
            </div> -->
            <div class="input-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" id="address" required/></textarea>
     
                <!-- <input type="text" id="address" name="address" required/> -->
                        
                    </div>
            <div class="input-field">
                        <!-- <label for="district">Location:</label> -->
                        <!-- <br> -->
                        <select id="district" name="district" style="padding:10px; padding-left: 20px;">
                        <option value="Kathmandu">Kathmandu</option>
                           <option value="Pokhara">Pokhara</option>
                           <option value="Butwal">Butwal</option>
                           <option value="Chitwan">Chitwan</option>
                           <option value="Nuwakot">Nuwakot</option>
                           <option value="Palpa">Palpa</option>
                           <option value="Nepalgunj">Nepalgunj</option>
                           <option value="Surkhet">Surkhet</option>
                           <option value="Dhading">Dhading</option>
                           <option value="Illam">Illam</option>
                           <option value="Dharan">Dharan</option>
                           <option value="Morang">Morang</option>
                           <option value="Jhapa">Jhapa</option>
                           <option value="Birgunj">Birgunj</option>
                           <option value="Janakpur">Janakpur</option>
                           <option value="Lalitpur">Lalitpur</option>
                           <option value="Bhaktapur">Bhaktapur</option>
                           <option value="Bharatpur" selected>Bharatpur</option>
                           <option value="Dhangadhi">Dhangadhi</option>
                           <option value="Hetauda">Hetauda</option>
                           <option value="Itahari">Itahari</option>
                           <option value="Kritipur">Kritipur</option>
                           <option value="Lamjung">Lamjung</option>
                           <option value="Gorkha">Gorkha</option>
                           <option value="Baglung">Baglung</option>
                           <option value="Sidhupalchowk">Sidhupalchowk</option>
                           <option value="Sindhuli">Sindhuli</option>
                        </select> 
                        </select> 
                        

                        <!-- <input type="password" class="password" placeholder="Create a password" required> -->
                        <!-- <i class="uil uil-map-marker icon"></i> -->
                    </div>
                  
         
            <button type="submit" name="sign">Register</button>
            <div class="login-signup" >
                    <span class="text">Already a member?
                        <a href="signin.php" class="text login-link">Login Now</a>
                    </span>
                </div>
        </form>
    </div>
    <br>
    <br>
    <script src="login.js" ></script>
    <!-- <script src="../login.js"></script> -->
</body>
</html>