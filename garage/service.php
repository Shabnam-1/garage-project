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
   
    <title>Document</title>
</head>
<body>
        
        <p>
            <ul>
                  <li><a href= "index.php">Home</a></li>
                  <li><a href="contact.php" >contact</a></li>
                  <li><a href="booking.php">booking</a></li>
                </li>
                 
            </ul>
        </p>


<div class="container">

<h1>Need to get your Car Serviced?</h1>
 
 <div class="row">
        <div class="col-sm-4" style="background-color:grey;">
        <img src="image/s-l1600-7-500x375.jpg" alt="oil" style="width:100%;">
  
        </div>
        <div class="col-sm-4" style="background-color:grey;">
        <img src="image/287548_3_800x600_6228fae015cdf26cf23b25b90632650615af9afa-500x375.jpg" alt="Tyre" style="width:100%;">
      
        </div>
        <div class="col-sm-4" style="background-color:grey;">
        <img src="image/prokachka-gidr-torm-3-500x375.jpg" alt="brakes" style="width:100%;">
          
        </div>
        
        <br>
        <br>
        <br>
</div>

   
<div class="container">
 <br>
 <br> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    
        <p>
            <h2>Oil and Filter Change</h2>
                        <li>
                        Getting your oil and filters changed is extremely important for the health of your vehicle.
                        The oil filter helps sift all the dirt and dust and other particles out of the oil to help 
                        keep it cleaner for longer. When the filter gets clogged and dirty, the contaminants are fed
                        back into your engine. This can cause corrosion and damage in your engine and reduce fuel economy.
                        The oil flow can even be blocked all together which can cause your engine to seize up and fail to 
                        work anymore. When you have your car oil change done, have the oil filter changed at the same time. 
                        Otherwise, you pass clean oil through a dirty filter and pollute the fresh oil at the same time. 
                       </li> 
                       
                    </p>
      </div>

     
        <p>
        <h2>Car Tyres </h2>
                    <li>
                    It is important to get new tyres at least every five years.Depending on the extent of the puncture, The age 
                    of the tyre is based on when it was manufactured and not on when you purchased it. Even when tyres are stored 
                    and are not on a vehicle, they start deteriorating. Depending on the extent of the puncture, you may be able to 
                    repair your car tyres in the event of a puncture. If the puncture is too extensive or cannot be repaired, you might want to look for new tyres
                     </li>
                      
                     </p>
                    
    
    
    
        <p>
        <h2>Replacement of Brake Pad and Discs</h2>
                   <li>
                   Car brakes are one of the most important parts of the vehicle, and it is necessary to get them regularly serviced
                   to ensure the safety of you.We are more than happy to inspect and service your brakes, and if they are in need of 
                   any replacement pieces, we can complete this too. Our services are of the highest quality, as we understand the 
                   importance of your brakes when driving, and we take the responsibility of ensuring that they are working very seriously.
                     </li>
                    </p>
     
        <p>
        <h2>Shocks & Suspension replacement </h2>
                   <li>
                   he suspension system in your car is designed to connect the wheels to the actual vehicle. It allows the wheels of the 
                   car to stay on the surface of the road, no matter how bumpy, without damaging the actual car. It creates stability so 
                   that the car is not bouncing around, allowing for a smoother ride for anyone in the car.we can also offer you replacement 
                   suspension components. We source all of the necessary parts and install them on site, so that you do not need to be inconvenienced.
                     </li>
                    </p>
    
        <p>
        <h2>Get a Pre NCT check  </h2>
                   <li>
                   During your NCT test, the first part of the check is the exhaust emissions when your car reaches its optimum temperature.
                    The vehicle is also checked for adequate engine oil levels. The next check is tyre pressure. They then move on to check 
                    brake fluid, oil fluid, engine coolant, power steering fluid and windscreen wash. The last check on the first phase is the
                     lights. They will check the different beam settings and check pitch angles are correct as well as the intensity levels.
                     When you take your vehicle for a Pre-NCT Check our mechanics will look for a number of things that are checked 
                     during the three phases of the NCT test.
                     </li>
                    </p>
      </div>
   

    
</body>
</html>