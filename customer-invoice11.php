<?php
include("config.php");
require_once("include/numbertowords.php");
$bill = $_GET['printid'];
?>

<!DOCTYPE html>
<!-- saved from url=(0050)http://localhost/zenithschool/admission/copy/pdf/1 -->
<html lang="en" class="gr__localhost"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="TeQGiKbNzkPkQ0U6GBoK5v5dt4gUj64VMbJSpYai">
  <title>J.K. Enterprises</title>
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./Zenith School_files/bootstrap.min.css">
  

</head>
<body class="hold-transition skin-blue sidebar-mini" data-gr-c-s-loaded="true">
    <section class="content">
          <!-- title row -->
<style>
    .cf_heading{
        font-weight: bold;
        color: blue;
    }
</style>
  
  <div class="pageprint" style="border: 1px solid">
  	<center><h2 style="margin-right: 20%">TAX INVOICE</h2></center>
  	<table width="100%">
  		<tr>
  			<td valign="middle" style="text-align: center" width="5%"><img src="images/photo-1.png" width="100px" height="100px"></td>
  			<td width="60%" valign="middle" style="text-align: center"><h1 style="padding: 0 !important; margin: 0 !important; font-size: 30px"><b>J.K ENTERPRISES</b></h1><br>
  			Kalinga Nagar, Nuasahi, Choudwar, Cuttack - 754071<br>
  			GSTIN-21BICPG1263H1ZJ
  			</td>
  			<td width="35%" valign="middle" style="text-align:right">Mob: 9937070460<br>
  			website: <br>
  			Email: jk@gmail.com</td>
  		</tr>
  	</table>
  	<?php $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE `bill`='$bill' LIMIT 1");
	  while($rowdata = mysqli_fetch_assoc($sql)){
		  
	  ?>
  	<table width="100%">
  		<tr>
  			<td width="70%" style="border: 1px solid; border-radius: 5px">
  				<h3 style="text-transform: capitalize; padding: 15px ">Name: <?php echo($rowdata['new_customer']) ?>
  				<br><br>
  				Address: <?php echo $rowdata['address'] ?>
  				<br><br>
  				contact no: <?php echo $rowdata['code'] ?>
  				</h3>
  			</td>
  			<td width="30%" style="border: 1px solid; margin-left: 2px">
  				<h3 style="text-transform: capitalize; padding: 15px ">
  					invoice no: <?php echo $rowdata['invoice_no'] ?><br><br>
  					date: <?php echo(date('d-m-Y')) ?>
  				</h3>
  			</td>
  		</tr>
  	</table>
  	<?php } ?>
  	<table width="100%">
  	<?php $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE `bill`='$bill'");
		//print("<pre>");
		while($rowdata = mysqli_fetch_assoc($sql)){
			//print_r($rowdata);
		
		?>
  		<tr style="margin-bottom: 5px; margin-top: 5px">
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc">Company Name</span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc"><?php echo($rowdata['company']) ?></span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc">Model</span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc"><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT `mat_des` FROM `insertproduct` WHERE `id`='$id'");while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['mat_des']); } ?></span></td>
  		</tr>
  		<tr>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc">IMEI No</span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc"><?php echo($rowdata['imeino']) ?></span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc">Colour</span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc"><?php $id = $rowdata['color']; $sql1 = mysqli_query($con,"SELECT `colorname` FROM `bobilecolor` WHERE `id`='$id'"); while($rowdat1 = mysqli_fetch_assoc($sql1)){ echo $rowdat1['colorname']; } ?></span></td>
  		</tr>
  		<tr>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc">Battry</span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc"><?php echo($rowdata['battery']) ?></span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc">Charger</span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc"><?php echo($rowdata['charger']) ?></span></td>
  		</tr>
  		<tr>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc">HSN Code</span></td>
  			<td width="25%" style="height: 40px; background: #f2ebeb; border-radius: 5px; margin-bottom: 5px; margin-top: 5px"><span class="productdesc"><?php echo($rowdata['hsn_code']) ?></span></td>
  			<td width="25%"><span class="productdesc"></span></td>
  			<td width="25%"><span class="productdesc"></span></td>
  		</tr>
  		<?php } ?>
  	</table>
  	<table width="100%">
  		<?php $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE `bill`='$bill' LIMIT 1");
		while($rowdata = mysqli_fetch_assoc($sql)){
			//print_r($rowdata);
			$totaltax = $rowdata['igst']+$rowdata['cgst']+$rowdata['sgst'];
			$taxamount = (($rowdata['pay_cost']*$totaltax)/100);
			//echo $taxamount;
			
		?>
  		<tr>
  			<td width="50%">
  				<span style="font-size: 20px; text-transform: capitalize">Total invoice amount in words: <?php echo convert_number_to_words($rowdata['pay_cost']) ?> only</span>
  				<br>
  				<br>
  				<li style="list-style: circle"> Goods once sold can not be taken back.</li>
  				<li style="list-style: circle"> This registration certificate is valid on the date of issue on this tax invoice.</li>
  			</td>
  			<td width="50%">
  				<div style="display: inline-flex; width: 100%"><div class="productdesc1">SUB TOTAL</div><div class="productdesc11"><?php echo $rowdata['pay_cost']-$taxamount; ?></div></div>
				<div style="display: inline-flex; width: 100%"><div class="productdesc1">IGST @ <?php echo $rowdata['igst'] ?> % </div><div class="productdesc11">0</div></div>
				<div style="display: inline-flex; width: 100%"><div class="productdesc1">CGST @ <?php echo $rowdata['cgst'] ?> % </div><div class="productdesc11"><?php echo($taxamount/2) ?></div></div>
				<div style="display: inline-flex; width: 100%"><div class="productdesc1">SGST @ <?php echo $rowdata['sgst'] ?> % </div><div class="productdesc11"><?php echo($taxamount/2) ?></div></div>
				<div style="display: inline-flex; width: 100%"><div class="productdesc1">GRAND TOTAL</div><div class="productdesc11"><?php echo $rowdata['pay_cost'] ?></div></div>
  			</td>
  		</tr>
  		<?php } ?>
  	</table>
  	<table width="100%">
  		<tr>
  			<td width="50%" valign="bottom">
  				<span style="font-size: 30px; text-align: center;"> <b>Thank you Visit Again</b></span>
  			</td>
  			<td width="50%" style="text-align: center">
  				<br><br>
  				<span style="font-size: 20px; text-align: center"> For J.K. Enterprises Sales</span>
  				<br><br>
  				<span style="font-size: 20px; text-align: center"> Authorised Signature</span>
  				<br><br>
  				<span style="font-size: 20px; text-align: center"> Customer's Signature</span>
  			</td>
  		</tr>
  	</table>
  </div>
  <style>
	  span.productdesc {
    font-size: 20px;
    padding-left: 20px;
}
	  .productdesc1 {
    height: 30px;
    font-size: 20px;
    margin-top: 5px;
    padding: 10px;
    background: #f2ebeb;
    margin-left: 5px;
    border-radius: 5px;
	width: 60%
}
	   .productdesc11 {
    height: 30px;
    font-size: 20px;
    margin-top: 5px;
    padding: 10px;
    background: #f2ebeb;
    margin-left: 5px;
    border-radius: 5px;
	width: 30%
}
</style>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    </section>

<script src="./Zenith School_files/jquery.min.js.download"></script>
    


</body></html>