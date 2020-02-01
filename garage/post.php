<?php  
include ("common.php");
$name = $_POST['name'];
$telephone= $_POST['telephone'];
$TypeMake= $_POST['vehicle-type'];
$LicenceDetails= $_POST['licence-details'];
$enginetype= $_POST['engine-type'];
$serviceType = $_POST['service-type'];
$Date= $_POST['date'];
$Comment = $_POST['smessage'];
$isbookingallowed = true;

$con = getConnection();
if($con->connect_error){
    die('Connection Failed:'.$con->connect_error);
}else{
   $sql= "select * from CustomerBookings where BookingDate = str_to_date('".$Date."','%m/%d/%Y')";
   
   
   $booking_rows = $con-> query ($sql);
   if($booking_rows -> num_rows >= 10 ){
       $isbookingallowed = false;
       
   }
   else {  

    $sql = "select * from Customer where ContactNum = '".$telephone."'";
    $customer_rows = $con-> query($sql);


  if($customer_rows -> num_rows > 0){
      $customer_array = mysqli_fetch_assoc( $customer_rows);
      $customer_id = $customer_array["CustomerId"];

      $sql ="insert into CustomerBookings(CustomerId, BookingType, BookingDate) values(". $customer_id .",'".$serviceType."', str_to_date('".$Date."','%m/%d/%Y'))";
    if ($con-> query($sql)== true)
    {//echo "record entered";
        $ins_id = $con->insert_id ;

    }else{
        echo "error:" .$sql. "<br>" . $con->error;
        exit();
    }

  }
  else{

    $sql ="insert into Customer (Name, ContactNum) values ('".$name."','".$telephone."')";
    if ($con-> query($sql)== true)
   {//echo "record entered";
        $ins_id = $con->insert_id ;


    }else{
        echo "error:" .$sql. "<br>" . $con->error;
        exit();
    }
    $sql ="insert into CustomerBookings(CustomerId, BookingType, BookingDate) values(".$ins_id.",'".$serviceType."',str_to_date('".$Date."','%m/%d/%Y'))";
    if ($con-> query($sql)== true)
    {//echo "record entered";
        $ins_id = $con->insert_id ;

    }else{
        echo "error:" .$sql. "<br>" . $con->error;
        exit();
    }
}
    
    $sql ="insert into ServiceDetails(BookingId, ServiceStatus,Licence, VehicleType, EngineType, Comment) values(".$ins_id.",'Booked ' , '".$LicenceDetails."', '".$TypeMake."', '".$enginetype."', '".$Comment."')";
    if ($con-> query($sql)== true)
    { //echo "record entered";
          $ins_id = $con->insert_id ;


    }else{
        echo "error:" .$sql. "<br>" . $con->error;
        exit();
    }
}
    $con->close();}




//echo "$name </br> $telephone</br> $serviceType</br>"


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="width:550px; border : solid 1px #ccc; margin: auto; text-align: center; margin-top:100px;" >
<?php if($isbookingallowed):?>
<h3>Thank you <?php $name;?> for booking your service with Ger Garage</h3><br>
<span>Your vehicle service is confirmed on <?php echo $Date?></span>
<br><br>
<a href="booking.php">Book Another Service</a>

<?php else:?>
<h3>Thank you <?php $name;?> for choosing Ger Garage</h3><br>
<span>No Slot is avialable on <?php echo $Date?>,  please choose another date.</span>

<br><br>
<a href="booking.php">Choose Another Date</a>
<?php endif;?>
</div>
</body>
</html>
