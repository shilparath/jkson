<?php
include("config.php");
require_once("include/numbertowords.php");
$bill = $_GET['printid'];
?>
<!DOCTYPE html>
<html>
<head>
<title>print</title>
</head>
<body>
    <div class="container" align="center" >
<div class="col-lg-12 col-md-12 col-sm-12">
	<table width="100%" border="1">
<tr>
 <td align="center" style="font-family: algerian">ORIGINAL FOR SUPPLIER</td>
 <td align="center" style="font-family: algerian">ORIGINAL FOR BUYER</td>
 <td align="center" style="font-family: algerian">ORIGINAL FOR TRANSPORTER</td>
</tr>
<tr >

<td colspan="3" align="center" style="font-family: algerian;font-size:40px;background-color:#CCCCCC" ><img src="images/jksons.png" ></td>
</tr>
<tr >
<td colspan="3" align="center" style="font-family: algerian;background-color:#CCCCCC"><p>At:Kalinga Nagar, Nuasahi,</p><p> Choudwar, Cuttack-754071</p><strong>GSTIN :21BICPG1263H1ZJ</strong></p></td>
</tr>
</table>
</div>
<div class="col-sm-12">
<?php $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE `bill`='$bill' LIMIT 1");
      while($rowdata = mysqli_fetch_assoc($sql)){
          
      ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<table class="table table-bordered" border="1" width="100%">
		<tr>
		   <td>
             <p><strong>Bill To</strong></p>
    </td>
	  <td>
        <p><strong>Place of Supply</strong></p>
    </td>
	<td align="center"><strong>Invoice No</strong></td>
	<td align="center"><strong>Dated</strong></td>
		</tr>
		<tr >
		<td > 
      <strong><?php echo $rowdata['new_customer'] ?></strong></p>
      <?php echo $rowdata['address'] ?></p>
     <!-- Email id : jk@yahoo.com</p>-->
      <!--Mob. - 00000000</p>-->
      <!--GSTIN :21BICPG1263H1ZJ</p>-->
       
      </p></td>
		<td >
      J.K & Sons</p>
      Kalinga Nagar, Nuasahi, Choudwar, Cuttack-754071</p></td>
		<td align="center"><p><?php echo $rowdata['invoice_no'] ?></p></td>
		<td align="center"><p><?php echo $rowdata['invoice_date'] ?></p></td>
		</tr>
</table><br>
</div>
</div>
</div>
<div class="col-sm-12" style="margin-top: -21px;">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<!--<table class="table table-bordered" border="1" width="100%">
			<tr>
				<td>
		<h6>Details Of Receiver (Billed To)</h6>
		<h6>Name: <?php echo($rowdata['new_customer']) ?></h6>
		<h6>Address: <?php echo $rowdata['address'] ?></h6>
		<h6>State: <?php echo $rowdata['state'] ?></h6>
		<h6>State Code:</h6>
		<h6>GSTIN / Unique ID:</h6>
</td>
<td>
		<h6>Details Of Consignee (Shipped To)</h6>
		<h6>Name: <?php echo($rowdata['new_customer']) ?></h6>
		<h6>Address: <?php echo $rowdata['address'] ?></h6>
		<h6>State: <?php echo $rowdata['state'] ?></h6>
		<h6>State Code</h6>
		<h6>GSTIN / Unique ID:</h6>
</td>
</tr>
</table>-->
</div>
</div>
</div>
<?php } ?>
<div class="col-sm-12" style="margin-top: -21px;">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12"><br>
	<div class="table-responsive">
		<table class="table table-bordered" border="1" width="100%">
			
				<tr height="50px">
					<th colspan="4">Description Of Goods</th>
					<th colspan="2">HSN Code</th>
					<th colspan="2">QTY</th>
					<th colspan="2">Units</th>
					<th colspan="3">RATE PER M.T</th>
					<th colspan="5">Amount</th>
                    <!--<th >Model No</th>
					<th >HSN Code</th>
					<th >Qty.</th>
					<th >Unit</th>
					<th >Rate</th>
					<th >Total</th>
					<th >Discount</th>
					<th >Taxable Value</th>
					<th >CGST</th>
					<th >SGST</th>
					<th >IGST</th>-->
				</tr>
				<!--<tr>
					<th>Rate</th>
					<th>Amount</th>
					<th>Rate</th>
					<th>Amount</th>
					<th>Rate</th>
					<th>Amount</th>
				</tr>-->
			
            <tbody>
                <?php $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE `bill`='$bill'");
        //print("<pre>");
                $xy = 1;
				$total = 0;
        while($rowdata = mysqli_fetch_assoc($sql)){
            //print_r($rowdata);
        
        ?>
            	 <tr height="100px">
                    <!--<td><?php echo $xy++ ?></td>-->
                    <td clospan="2"><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT `mat_code` FROM `insertproduct` WHERE `id`='$id'");while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['mat_code']); } ?></td>
                    <td colspan="3"><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT `mat_des` FROM `insertproduct` WHERE `id`='$id'");while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['mat_des']); } ?></td>
                    <td colspan="2" align="center"><?php echo($rowdata['hsn_code']) ?></td>
                    <td colspan="2" align="center"><?php echo($rowdata['quantity']) ?></td>
                    <td colspan="2" align="center">Pcs.</td>
                    <td colspan="3" align="center"><?php $t=$rowdata['amount']; $t2=$rowdata['cgst']+$rowdata['sgst']; $tax=$t*($t2/100); echo($rowdata['rate']-$tax); ?></td>
                    <td colspan="5" align="center"><?php $t=$rowdata['amount']; $t2=$rowdata['cgst']+$rowdata['sgst']; $tax=$t*($t2/100); $totalafterqnty = ($rowdata['rate']-$tax) * $rowdata['quantity']; echo($totalafterqnty); ?></td>
					</tr>
					<tr style="background-color:#CCCCCC">
					  <td colspan="13"><strong>Taxable Value</strong></td>
					 
					  <td colspan="4" align="center"><?php echo($totalafterqnty);?></td>
					</tr>
					<tr height="80px">
					  <td colspan="10"><strong>ADD IGST <?php $t2=$rowdata['cgst']+$rowdata['sgst'];echo $t2;?></strong></td>
					  <td colspan="3"><strong> <?php $t2=$rowdata['cgst']+$rowdata['sgst'];echo $t2;?></strong></td>
					  <td colspan="4" align="center"><?php $t2=$rowdata['cgst']+$rowdata['sgst']; $tax=$t*($t2/100);  echo($tax);?></td>
					</tr>
					<tr style="background-color:#CCCCCC">
					  <td colspan="13"><strong>Total Value including IGST</strong></td>
					  <td colspan="4" align="center"><?php $total =$total+$rowdata['amount']; echo($total);?></td>
					</tr>
					<tr height="120px">
					  <td colspan="13"><strong>RO</strong></td>
					  <td colspan="4" align="center">0</td>
					</tr>
					<tr style="background-color:#CCCCCC">
					  <td colspan="13" ><strong>G.Total</strong></td>
					  <td colspan="4" align="center"><?php  echo($total);?></td>
					</tr>
                    <!--<td><?php echo($rowdata['discount']) ?></td>
                    <td><?php $t=$rowdata['amount']; $t2=$rowdata['cgst']+$rowdata['sgst']; $tax=$t*($t2/100);  echo($tax); ?></td>
                    <td><?php echo($rowdata['cgst']) ?>%</td>
                    <td><?php echo($tax/2) ?></td>
                    <td><?php echo($rowdata['sgst']) ?>%</td>
                    <td><?php echo($tax/2) ?></td>
                    <td><?php echo($rowdata['igst']) ?>%</td>-->
                    <?php $total =$total+$rowdata['amount']; $payamt=$rowdata['pay_cost']; $finance=$total-$payamt; ?>
                   <!-- <td>
                        <?php 
                        if($rowdata['igst'] == 0)
                            {
                                echo($rowdata['igst']); 

                            }
                         else
                            { 
                                echo($rowdata['tax_amount']); 
                            }
                        ?>   
                    </td>-->
                
                 <?php } ?>
             <!--   <tr>
                    <td colspan="9" rowspan="8">Invoice Total (In Words) :</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    
                </tr>
                <tr>
                    <td colspan="6">Total</td>
                    <td><?php echo($total) ?></td>
                </tr>
                <tr>
                    <td colspan="6">Paid</td>
                    <td><?php echo($payamt) ?></td>
                </tr>
                <tr>
                    <td colspan="6">Finance</td>
                    <td><?php echo($finance) ?></td>
                </tr>
                <tr>
                    <td colspan="6">Loading Charges</td>
                    <td><?php echo $loading_charge = 0; ?></td>
                </tr>
                <tr>
                    <td colspan="6">Transport Charges</td>
                    <td><?php echo $transport_charge = 0; ?></td>
                </tr>
                <?php $invoice_total = $total+$loading_charge+$transport_charge;
						$invoice_total_round_off = round($invoice_total);
						$roundoff = $invoice_total-$invoice_total_round_off;
				?>
                <tr>
                    <td colspan="6">R.Off</td>
                    <td><?php echo($roundoff) ?></td>
                </tr>
                <tr>
                    <td colspan="6">Invoice Total</td>
                    <td><?php echo($invoice_total_round_off) ?></td>
                </tr>-->
                <tr>
                    <td colspan="5">
                        <p>Company's GSTIN: 21BICPG1263H1ZJ</p>
                        <p>Company's PAN: BICPG1263N</p>
                        
                    </td>
                    <td colspan="8" rowspan="3"><p><strong>Declaration</strong></p>
					                            <p>*We declare that this invoice shows the actual</p>
												<p>&nbsp;&nbsp;Price og the goods described and that all </p></br>
												<p>*All subject to Cuttack Jurdisdiction.
					</td>
					 <td colspan="8" rowspan="6" align="center"><p><strong>For J.K & Sons</strong></p>
					                                </br></br>
					                                <p>Authorised Signatory</p></td>
                </tr>
                <tr>
                  <!--  <td colspan="5">
                        <p>LOADING POINT: MANGULI</p>
                        <p>DRIVER DETAILS: </p>
						<p>VEHICLE REGDN NO: </p>
                        </td>-->
                    
                </tr>
				<tr><td colspan="5">F.O.R DELIVERY</td>
				</tr>
				<tr>
				<td colspan="17" align="center" style="font-family: algerian"><strong>THIS IS A COMPUTERED GENERATED INVOICE</strong></td>
				</tr>
            </tbody>
		</table>
	</div>
</div>	
</div>
</div>
</div>
</body>
</html>