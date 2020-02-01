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
    <link href="style.css"rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <title>Contact</title>
</head>
<body>
     
          
      <div>
      <h1>Contact Us</h1>
          <p>
                  <ul>
                          <li><a href="index.php">Home</a></li>
                          <li><a href="service.php">Service</a></li>
                          <li><a href="booking.php">booking</a></li>
                    </ul>
          </p>
      </div id="main">

<p><iframe width="80%" height="300" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=%20Swords%20road%20in%20Santry%2C%20Dublin%20Ireland+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/coordinates.html">gps coordinates</a></iframe></div><br /></p>
<table>
    <tr>
        <td>
            <span><strong>Address</strong></span>
            <br> 4 Bridge Street
            <br> Swords
            <br> Co. Dublin

           <p><span><strong>Contact</strong></span>
            <br> <strong>Phone:</strong> +353 1 888 6625
            <br> <strong>Fax:</strong> +353 1 890 1714
            <br><strong>Email:</strong><a href="mailto:enquiries@gergarage.com">enquiries@gergarage.com</a></p>
        </td>
        <td>
            <span><strong>Opening Hours</strong></span>
            <br>Mon: 9:00am - 6:30pm
            <br>Tue: 9:00am - 6:30pm
            <br>Wed: 9:00am - 6:30pm
            <br>Thu: 9:00am - 6:30pm
            <br>Fri: 9:00am - 6:30pm
            <br>Sat: 9:00am - 6:30pm
            <br>Sun: Closed
        </td>
        
    </tr>
    
</table>
</div>



</body>
</html>