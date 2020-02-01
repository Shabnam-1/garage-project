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
 $serviceCharges = array('AS' => 200, 'MS' => 200, 'REP' => 300, 'MJREP' => 400);
 $con = getConnection(); 
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
   
    <title>Document</title>
</head>
<body>

<div class='container'>
    
    <div style="border:solid #ccc 1px; margin-top: 60px;padding:4px;">
    <h3>Customer Details</h3>
        <div>
            Name : <?php echo $name;?><br>
            Mobile : <?php echo $mobile;?><br>
            Service Type : <?php echo $serviceType;?><br>
            Service ID : <?php echo $serviceId;?><br>
            Booking Date : <?php echo $date;?><br>
        </div>
    </div>
    <hr>
    <div>
        <h3>Billing Details</h3>
        <table id="billing">
            <tr>
                <th>
                    Item Name
                </th>
                <th>
                    Qty
                </th>
                <th>
                    Price
                </th>
                <th>
                    Total
                </th>
            </tr>
            

           

            

        </table>
        <div  style="color:blue; text-align:right;" >
                   <span style="font-size:18px;" id="add-item" onclick="addItemRow()">ADD ITEM</span>
        </div>


        <hr>

        <div  style="text-align:right;" >
        <div style="font-size:18px;">
            
        <?php echo $serviceNames[$serviceType].': &#8364; '. $serviceCharges[$serviceType];?>
        </div>
                   <h3>Grand Total</h3>
                   <div>&#8364; <span style="font-size: 38px" id="g-total"></span></div>
        </div>
        <hr>
        <div style="text-align:right; font-size:18px;">
            <span onclick="window.print()">PRINT INVOICE</span>
        </div>
    </div>
<div>

<script>
    var rowCount = 0;
    var grandTotal = <?php echo $serviceCharges[$serviceType];?>;
    $('#g-total').html(grandTotal);
    var addItemRow = () => {
        this.rowCount++;
        var table = document.getElementById("billing");

// Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(-1);

// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
var cell4 = row.insertCell(3);

<?php
    $sqlM = "select * from automobileparts";
    $mechanic_rows = $con-> query($sqlM);
    ?>



// Add some text to the new cells:
cell1.innerHTML = `<select id="c0`+this.rowCount+`" onchange="itemSelected(`+this.rowCount+`)">
<option value="0">SELECT PARTS</option>
<?php while($allMechanics = mysqli_fetch_assoc($mechanic_rows)): ?>
    
    <option value='<?php echo $allMechanics["price"]?>'><?php echo $allMechanics["partsName"]?></option>
            
        <?php endwhile;?></select>`;
cell1.id = 'c1'+this.rowCount;
cell2.innerHTML = "<input type='number' onblur='computeTotalPrice("+ this.rowCount+")'>";
cell2.id = 'c2'+this.rowCount;
cell3.innerHTML = "<input type='number' value='0'>";
cell3.id = 'c3'+this.rowCount;
cell4.innerHTML = "";
cell4.id = 'c4'+this.rowCount;
    }




    var computeTotalPrice = (rowNo) =>{
        console.log(rowNo);
        var total = $('#c2'+ rowNo).find('input')[0].value * $('#c3'+ rowNo).find('input')[0].value;
        grandTotal += total;
        grandTotal.toFixed(2);
        $('#c4'+ rowNo).html(total);
        $('#g-total').html(grandTotal);
        
    }

    var itemSelected =  (rowNo) =>{
        $('#c3'+ rowNo).find('input')[0].value = document.getElementById("c0"+rowNo).value;
    }
    </script>

    <?php mysqli_close($con);?>

</body>
</html>