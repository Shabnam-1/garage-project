<?php
include ("common.php");
$con = getConnection();
if($con->connect_error){
  die('Connection Failed:'.$con->connect_error);
}



else{
  if(isset($_POST['login'])){
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $sql ="select * from adminTable where user= '".$username."' and pass ='".$password."' limit 1";
  
  $admin_rows = $con-> query($sql);

  if($admin_rows -> num_rows > 0){
    echo "login successful";
   header ("Location:adminmainpage.php");
   exit();
  }
  else{
    echo "login failed";
   exit();
  }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>
</head>
<body>
     
        <p>
            <ul>
                  <li><a href= "index.php">Home</a></li>
                 
                </li>
                 
            </ul>
        </p>
  
        <div class="admin">
        <form method="post">
        <h2>Admin Login Page</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label>Email ID</label>
                            <input type = "text" name ="user" placeholder="Enter Full Name"  value="" class="form-control" autocomplete="off">
                          </div>
                          <p>
                          <div class="form-group">
                          <label>Password</label>
                            <input type = "password" name ="pass" placeholder="Enter Password" value="" class="form-control" autocomplete="off">
                         </div>
                       </p>
                       <div class="form-group">
                         <button class="btn btn-primary btn-block" type="sub" name="login">Log In</button>
                        
                 </div>
              </div>
            </div>
         </div>
   
    
</body>
</html>
