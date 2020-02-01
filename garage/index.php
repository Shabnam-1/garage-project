<?php
session_start();
$con = mysqli_connect('127.0.0.1:8889', 'root' , 'root','garageadmin');
if($con){
    echo "connection successful";
}else {
    echo" no connection test";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <title>Ger's Garage</title>
</head>
<body>


    <div>
        <h1>Ger's Garage</h1>
    <p>
<ul>
          <li><a href= "index.php">Home</a></li>
          <li><a href="service.php">Service</a>
          <li><a href="contact.php" >contact</a></li>
          <li><a href="booking.php">booking</a></li>
          <li><a href="admin.php">admin</a></li>

         
    </ul>
</p>

</div>

<p><img src ="image/I-Pace-carousel-04-620x310.jpg"></p>

              
       <div>
           <p><h2>About Ger's Garage </h2></p>
           <p>
                We are one of Dublin's leading independent vehicle's service centre, Ger's Garage offer top quality service. We are based on the Swords road in Santry, Dublin 9 and have been serving the local area for over 15 years.</p>
                 <p> We cater for all types of Vehicle Service and supply new parts aswell. Ger's Garage provides a full diagnostic service on all makes of cars and light commercial vehicles. Over the years we have built up a massive customer base through our reliability, competitive pricing, high quality service and customer service.</p>
                 <p>Our focus is customer satisfaction and our staffs are highly trained and use the most advanced technology when servicing a vehicle.</p>
              
           
           </p>
       </div>
       

</body>
</html>
