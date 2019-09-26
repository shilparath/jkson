<?php
include("config.php");
require_once("include/numbertowords.php");
$bill = $_GET['printid'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<body>
	<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
	body {
		font-family: modern;

	}

		@page {
  size: A4;
  margin: 0;
}
@media print {
    #printbtn {
        display :  none;
    }
}
.top_l{
font-weight: bold;
}
.well{background-color: transparent;
	border-radius: 0px;
	box-shadow: none;
	}
	</style>

</head>
<body>
<div class="container">
	<div class="row top_l">
		<div class="col-lg-4 col-md-4 col-sm-4  col-xs-4"><h6 class="pull-left">GST NO. 21ALJPM4220A1ZX</h6></div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><h5 class="text-center"> CHALAN</h5></div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><h6 class="pull-right">Mob. NO. :8018547350</h6></div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center><img src="images/logo.jpeg" height="95px" width="95px"></center>
			<h6 class="text-center">At:Kalinga Nagar, Nuasahi, Choudwar, Cuttack - 754071</h6>
			<h6 class="text-center">Email id : jk@yahoo.com</h6>
		</div>
	</div>
<?php 
	$sql = mysqli_query($con,"SELECT * FROM `sellitems_without_gst` WHERE `bill`='$bill' LIMIT 1");
	while($rowdata = mysqli_fetch_assoc($sql)){
	?>
		<div class="well">
			<div class="row"> 
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					To <?php echo($rowdata['new_customer']) ?>
				</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<h6>Challan No. : <?php echo($rowdata['invoice_no']) ?></h6>
					<h6>Date : <?php echo($rowdata['invoice_date']) ?> </h6>
				</div>
			</div>
		</div>
		<?php } ?>
	<div class="row"> 
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
					<tr>
                        <th>Sl. No.</th>
                        <th>Description oF Goods</th>
                        <th>Qnty.</th>
                        <th>Rate</th>
                        <th>Amount</th>
					</tr>
				</thead>
                    <tbody>
                       <?php 
						$counter = 1;
						$total_qty = 0;
						$total_rate = 0;
						$totalamount = 0;
						$sql = mysqli_query($con,"SELECT * FROM `sellitems_without_gst` WHERE `bill`='$bill'");
						while($rowdata = mysqli_fetch_assoc($sql)){
						?>
                        <tr>
                            <td><?php echo($counter) ?></td>
                             <td><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT * FROM `insertproduct` WHERE `id`='$id'"); while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['mat_code']); echo(" / "); echo($rowdata1['mat_des']);} ?></td>
                             <td><?php echo($rowdata['quantity']); $total_qty= $total_qty+$rowdata['quantity'] ?></td>
                             <td><?php echo($rowdata['rate']); $total_rate = $total_rate+$rowdata['item_value']; ?></td>
                             <td><?php echo($rowdata['amount']) ?></td>
                             <?php $totalamount = $rowdata['pay_cost'] ?>
                        </tr>
                       
                       
                        <?php $counter++; } ?>
                         <tr>
                            <td colspan="2"><p class="pull-right">Grand Total</p></td>
                             <td><?php echo($total_qty) ?></td>
                             <td><?php //echo($total_rate) ?></td>
                             <td><?php echo($totalamount) ?></td>
                        </tr>
                    </tbody>
				</table>
			</div>
		</div>
	</div>
			<button onclick="myFunction()" id="printbtn" type="submit" class="btn btn-info pull-right">Print</button>
</div>


<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>
</body>
</html>