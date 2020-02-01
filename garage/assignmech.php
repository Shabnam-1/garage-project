<?php
 include ("common.php");
 $date=$_REQUEST["date"];
 $serviceType=$_REQUEST["service-type"];
 $mobile=$_REQUEST["mobile"];
 $name=$_REQUEST["name"];
 $serviceId = $_REQUEST["service-id"];  

 $mechId = $_POST['mech-id'];
 $postServiceId = $_POST['service-id'];

 $serviceNames  = array('AS' => 'Annual Service', 'MS' => 'Major Service', 'REP' => 'Repair', 'MJREP' => 'Major Repair');
 $con = getConnection(); 

 //update db if mechid not empty
 if(isset($_POST['service-id']) && isset($_POST['mech-id'])){
    $sql = "update serviceDetails set Mechanic = ".$mechId.", ServiceStatus = 'IN SERVICE' where ServiceId =".$postServiceId;
    $r = $con-> query($sql);
     exit("Mechanic set successfully for service id - ".$serviceId."<br> Service Date -".$date);
 }
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>
<body>
<div>
        
    <p>
<ul>
        
        <li><a href="admin.php">admin</a></li>
         
    </ul>
</p>

</div>
<br>
<div>
<p> Customer Name: <?php echo $name;?></p>
<p> Contact no: <?php echo $mobile;?></p>
<p> Date: <?php echo $date;?></p>
<p> Service: <?php echo $serviceNames[$serviceType] ;?></p>

</div>
<h3>Mechanic Assign</h3>

<?php
    $WORKLOAD_AS = 1;
    $WORKLOAD_MS = 1;
    $WORKLOAD_REP = 1;
    $WORKLOAD_MJREP = 2;   

    $requiredWorkLoad = 1;

    if($serviceType == 'MJREP'){
        $requiredWorkLoad = 2;
    }

    

    $mechanics = ['1','2','3','4'];
    $freeMechanics = [];

    
    if($con->connect_error){
        die('Connection Failed:'.$con->connect_error);
    }else{

        $sqlS = "SELECT a.*,b.* FROM garageadmin.ServiceDetails as a
        join CustomerBookings as b
        on a.BookingId = b.BookingId
        where bookingdate = '".$date."';";
        $service_rows = $con-> query($sqlS);

        $index = 0;
        $servicesArray = [];
        while($s = mysqli_fetch_assoc($service_rows)){ // loop to store the data in an associative array.
            $servicesArray[$index] = $s;
            $index++;
        }

        foreach($mechanics as $m){
            $wl = 0;
            foreach($servicesArray as $service){
                if($m == $service['Mechanic']){
                    if($service['BookingType'] == "MJREP"){
                        $wl += 2;
                    }else{
                        $wl += 1;
                    }
                }
            }
            if(($wl+$requiredWorkLoad) <= 4){
                $freeMechanics[$m] = $wl;
                //array_push($freeMechanics,$m);
                
            }
        }

        //echo json_encode($freeMechanics);

    }    

?>

<form action="" method="POST"> 
    <?php
    $sqlM = "select * from Mechanic";
    $mechanic_rows = $con-> query($sqlM);
    ?>
    <?php while($allMechanics = mysqli_fetch_assoc($mechanic_rows)): ?>
        <?php if(array_key_exists($allMechanics["MecId"],$freeMechanics)):?>
            <input type="radio" name="mech-id" value="<?php echo $allMechanics["MecId"]?>"> <?php echo $allMechanics["MecName"]?> | WorkLoad : <?php echo $freeMechanics[$allMechanics["MecId"]] ;?><br>
        <?php endif; ?>
        <?php endwhile;?>
  <br>
  <input type="hidden" name="service-id" value="<?php echo $serviceId?>">

  <input type="Submit" value="ASSIGN">
</form>

<?php mysqli_close($con);?>
</body>
</html>