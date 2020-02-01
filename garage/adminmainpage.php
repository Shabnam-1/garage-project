<?php
 include ("common.php"); 

function updateServiceStatus(){
    $con = getConnection();

     //update db if service status and service id not empty not empty
    if(isset($_POST['service-id']) && isset($_POST['service-status'])){
        $sql = "update serviceDetails set ServiceStatus = '".$_POST['service-status']."' where ServiceId =".$_POST['service-id'];
        $r = $con-> query($sql);
        echo "Service status changed to - ".$_POST['service-status'].", for service id - ".$_POST['service-id'];
    }

    mysqli_close($con);
}
 
function getBooking($start_date,$end_date){
   
    $con = getConnection();
 if($con->connect_error){
   die('Connection Failed:'.$con->connect_error);
 }
 if(!empty($start_date) && !empty($end_date)){
 $sql ="SELECT SD.ServiceId ,C.Name, C.ContactNum, CB.BookingType, (CB.BookingDate) as bdt,  SD.ServiceStatus, SD.Mechanic from Customer C inner join CustomerBookings CB on C.CustomerId = CB.CustomerId  
       inner join ServiceDetails SD on CB.BookingId= SD.BookingId  where CB.BookingDate >= str_to_date('".$start_date."','%m/%d/%Y') 
       and CB.BookingDate <= str_to_date('".$end_date."','%m/%d/%Y')";
       
}
else if(!empty($start_date)){
    $sql ="SELECT SD.ServiceId,C.Name, C.ContactNum, CB.BookingType,(CB.BookingDate) as bdt , SD.ServiceStatus, SD.Mechanic  from Customer C inner join CustomerBookings CB on C.CustomerId = CB.CustomerId 
     inner join ServiceDetails SD on CB.BookingId= SD.BookingId where CB.BookingDate = str_to_date('".$start_date."','%m/%d/%Y')";
      
}
else if(!empty($end_date)){
    $sql ="SELECT SD.ServiceId,C.Name, C.ContactNum, CB.BookingType,(CB.BookingDate) as bdt, SD.ServiceStatus, SD.Mechanic  from Customer C inner join CustomerBookings CB on C.CustomerId = CB.CustomerId 
    inner join ServiceDetails SD on CB.BookingId= SD.BookingId  where CB.BookingDate = str_to_date('".$end_date."','%m/%d/%Y')";
   
}
else{
    echo "Please select either start date or end date or both";
    return;
}

 
 $results_rows=$con-> query($sql);

 if($results_rows -> num_rows > 0){
    
    
echo "<table border='1'
style=margin-top:100px>  
<tr>
<th>Booking Date</th>
<th>Name</th>
<th>Contact no</th>
<th>Booking Type</th>
<th>Service Status</th>
<th>Mechanic Assign</th>

</tr>";

while($row = mysqli_fetch_assoc( $results_rows))
{
echo "<tr>";
echo "<td>" . $row['bdt'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['ContactNum'] . "</td>";
echo "<td>" . $row['BookingType'] . "</td>";
echo "<td>" . '<form action="" method="POST"> <select name="service-status">
<option value="Booked" '.($row['ServiceStatus'] == 'Booked'? 'selected':'').'>Booked</option>
<option value="IN SERVICE" '.($row['ServiceStatus'] == 'IN SERVICE'? 'selected':'').'>In Service</option>
<option value="FIXED" '.($row['ServiceStatus'] == 'FIXED'? 'selected':'').'>Fixed/Completed</option>
<option value="COLLECTED" '.($row['ServiceStatus'] == 'COLLECTED'? 'selected':'').'>Collected</option>
<option value="UNREPAIRABLE" '.($row['ServiceStatus'] == 'UNREPAIRABLE'? 'selected':'').'>Unrepairable / Scrapped</option>
</select>' . "
<input type='hidden' name='service-id' value='".$row["ServiceId"]."'>
<input type='hidden' name='start' value='".$_POST['start']."'>
<input type='hidden' name='end' value='".$_POST['end']."'>
<br>
<input type='Submit' value='CHANGE STATUS' style='font-size:12px; width:100%;'>
</form>
</td>";
$assignUrl = "/garage/assignmech.php?date=".$row['bdt']."&service-type=".$row['BookingType']."&mobile=".$row['ContactNum']."&name=".$row['Name']."&service-id=".$row['ServiceId'];
$invoiceUrl = "/garage/invoice.php?date=".$row['bdt']."&service-type=".$row['BookingType']."&mobile=".$row['ContactNum']."&name=".$row['Name']."&service-id=".$row['ServiceId'];
if (!empty($row['Mechanic'])){
    echo "<td>" . $row['Mechanic'] . "</td>";
    echo ($row['ServiceStatus']  == 'FIXED' || $row['ServiceStatus']  == 'UNREPAIRABLE') ? "<td> <a style='color:blue' href='".$invoiceUrl."' target='_blank'>INVOICE</a> </td>":'<td></td>';
}else{
    echo "<td> <a style='color:blue' href='".$assignUrl."' target='_blank'>ASSIGN</a> </td>";
    
}


echo "</tr>";
}
echo "</table>";
 }
 else{
     echo "No bookings found";
 }

mysqli_close($con);

}
//date filter
$start_date = $_POST['start'];
$end_date = $_POST['end'];
updateServiceStatus();
getBooking($start_date,$end_date);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
  } );
  </script>
</head>
<Body>

<div style="position:absolute;top:0;right:0;margin-top:20px; margin-right:20px;text-align:centre">

<form name="form1" method="post" action="log_out.php">
<ul class="nav navbar-nav">
        <li><a href="logout.php">LOGOUT</a></li>
</ul>
</form>
</div>

<form method="post"> 
<div style="position:absolute;top:0;left:0;margin-top:40px; margin-left:80px;">

<p> Start Date: <input type="text"  name= "start" id="datepicker"></p>
</div>

<div style="position:absolute;top:0;left: 349px;margin-top:60px; ">

End Date: <input type="text"  name="end" id="datepicker1"></p>


</div>
<div style="position:absolute;top:0;left: 600px;margin-top:60px; ">
<button class="check" name="checkBookingBtn">Check Bookings</button>
</div>
</form>


</body>
</html>