<?php
include ("common.php");
$con = getConnection();
if($con->connect_error){
  die('Connection Failed:'.$con->connect_error);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/demos/style.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $( function() {
          $("#datepicker").datepicker({ beforeShowDay: function(date) { var day = date.getDay(); return [(day != 0), '']; } });
         
        } );
    </script>
    
    <style>
input {
         width: 80%;
         height: 30px;
         border: 5px solid #aaa;
         border-radius: 5px;
         margin: 5px 0px;
         outline: none;
         font-size: 15px;
     }
 input, select{
       width: 80%;
       height: 60px;
       border: 5px solid #aaa;
       border-radius: 8px;
       margin: 5px 0px;
       outline: none;
       font-size: 15px;
     }
     ul{
    list-style-type:none;
    margin: 0%;
    padding: 0%;
    
    }
    
    ul li{
        
        float: left;
        width: 150px;
        height: 25px;
        line-height: 25px;
        background-color: rgb(236, 167, 18);
        
    }
    input[type= submit]{
        width: 20%;
        background-color: lightblue;
        color: black;
        padding: 5px 5px;
        margin: 5px 0;
        border: none;
        font-size: 15px;
    }
</style>
    <title>Document</title>
</head>
<body>


<div>
       
    <p>
<ul>
          <li><a href= "index.php">Home</a></li>
          <li><a href="service.php">Service</a>
          <li><a href="contact.php" >contact</a></li>
       
         
    </ul>
</p>

</div>

<br>
<br>

<div class = "form">
<form action="post.php" method="post">

    <h2>Book a Service</h2>
    
  <input type = "text" name ="name" placeholder="Enter Full Name">
  <input type = "text" name ="telephone" placeholder="Enter Telephone"> 
  <input type = "text" name ="licence-details" placeholder=" Licence details"> 
  <select id= "Vehciletype" name ="vehicle-type">
  <option value = "NA">Select Vehicle Type </option>
  <option value = "Maruti Suzuki Alto 800"> Maruti Suzuki Alto 800</option>
  <option value = "Maruti Suzuki Alto 900">Maruti Suzuki Alto 900</option>
  <option value = "Hyundai Grand i10">Hyundai Grand i10</option>
  <option value = "Maruti Suzuki Ciaz"> Maruti Suzuki Ciaz</option>
  <option value = "Maruti Suzuki Omni">Maruti Suzuki Omni</option>
  <option value = "atsun GO+">atsun GO+</option>
  <option value = "Mahindra Scorpio">Mahindra Scorpio</option>
  <option value = "Land Rover Discovery Sport">Land Rover Discovery Sport</option>
  <option value = "Renault Duster">Renault Duster</option>
  <option value = "Skoda Yeti">Skoda Yeti</option>
  <option value = "Honda CR-V"> Honda CR-V </option>
  <option value = "Volvo S60 Cross Country">Volvo S60 Cross Country</option>
  <option value = "Mercedes-Benz GLE Coupe">Mercedes-Benz GLE Coupe</option>
  <option value = "Audi R8">Audi R8</option>
  <option value = "Ford Mustang">Ford Mustang</option>
  <option value = "Audi A3 Cabriolet">Audi A3 Cabriolet</option>
  <option value = "Mercedes-AMG SLC 43">Mercedes-AMG SLC 43</option>
  <option value = "Hyundai Elantra">Hyundai Elantra</option>
  <option value = "Skoda Octavia">Skoda Octavia</option>
  <option value = "MINI Cooper S 3 Door">MINI Cooper S 3 Door</option>
  <option value = "Volkswagen Polo GTI">Volkswagen Polo GTI </option>
  <option value = "Citroen Berlingo">Citroen Berlingo</option>
  <option value = "Honda Activa 6G">Honda Activa 6G</option>
  <option value = "Yamaha YZF R15 V3">Yamaha YZF R15 V3</option>
  <option value = "Bajaj Pulsar NS200">Bajaj Pulsar NS200</option>
  <option value = "Ford Transit Connect">Ford Transit Connect</option>
  <option value = "Citroen Berlingo">Citroen Berlingo</option>
  <option value = "Fiat Doblo Cargo">Fiat Doblo Cargo</option>
  <option value = "Mercedes-Benz Citan">Mercedes-Benz Citan</option>
  <option value = "Nissan NV200">Nissan NV200</option>
  <option value = "TATA Motors Starbus 36 EX AC">TATA Motors Starbus 36 EX AC </option>
  <option value = "Force Traveller 26 Mini Bus">Force Traveller 26 Mini Bus</option>
  <option value = "LDV Maxus">LDV Maxus</option>
  <option value ="other">others</option>
</select>
 
  <select id = "Engine Type" name="engine-type" >
        <option value = "NA">Select Engine Type</option>
        <option value = "D">Diesel</option>
        <option value = "P">Petrol</option>
        <option value = "H">Hybrid</option>
        <option value = "E">Electric</option>
        </select>
   <select id = "Service" name="service-type">
      <option value = "NA">Select Service</option>
      <option value = "AS">Annual Service</option>
      <option value = "MS">Major Service</option>
      <option value = "REP">Repair / Fault</option>
      <option value = "MJREP"> Major Repair</option>
      </select>
      
     <input type="text" name= "date" id="datepicker" placeholder="Select Date">
    
  
      <input type = "message" name ="smessage" placeholder="Any Brief Description">
 
      <input type="Submit" value="Submit">
</form>
     
 
</div>
</body>
</html>
