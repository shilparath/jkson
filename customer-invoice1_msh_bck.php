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
	<h6 class="text-center">TAX INVOICE</h6>
	<h3 class="text-center">J.K. ENTERPRISES</h3>
	<h6 class="text-center">At:Kalinga Nagar, Nuasahi, Choudwar, Cuttack - 754071</h6>
	<h6 class="text-center">Email id : jk@yahoo.com</h6>
	<h6 class="text-center">Mob. - 0000000000</h6>
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
		<h5>GSTIN : 21BICPG1263H1ZJ</h5>
	</td><td>
		<h6>Mode Of Transport : By Road</h6>
		<h6>Vech. No. :</h6>
		<h6>Date & Time Of Supply :</h6>
		<h6>Place Of supply :</h6></td>
</table><br>
</div>
</div>
</div>
<div class="col-sm-12" style="margin-top: -21px;">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<table class="table table-bordered" border="1" width="100%">
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
</table>
</div>
</div>
</div>
<?php } ?>
<div class="col-sm-12" style="margin-top: -21px;">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12"><br>
	<div class="table-responsive">
		<table class="table table-bordered" border="1" width="100%">
			
				<tr>
					<th rowspan="2">Sl. No.</th>
					<th rowspan="2">Description Of Goods</th>
                    <th rowspan="2">Model No</th>
					<th rowspan="2">HSN Code</th>
					<th rowspan="2">Qty.</th>
					<th rowspan="2">Unit</th>
					<th rowspan="2">Rate</th>
					<th rowspan="2">Total</th>
					<th rowspan="2">Discount</th>
					<th rowspan="2">Taxable Value</th>
					<th colspan="2">CGST</th>
					<th colspan="2">SGST</th>
					<th colspan="2">IGST</th>
				</tr>
				<tr>
					<th>Rate</th>
					<th>Amount</th>
					<th>Rate</th>
					<th>Amount</th>
					<th>Rate</th>
					<th>Amount</th>
				</tr>
			
            <tbody>
                <?php $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE `bill`='$bill'");
        //print("<pre>");
                $xy = 1;
				$total = 0;
        while($rowdata = mysqli_fetch_assoc($sql)){
            //print_r($rowdata);
        
        ?>
            	 <tr>
                    <td><?php echo $xy++ ?></td>
                    <td><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT `mat_code` FROM `insertproduct` WHERE `id`='$id'");while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['mat_code']); } ?></td>
                    <td><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT `mat_des` FROM `insertproduct` WHERE `id`='$id'");while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['mat_des']); } ?></td>
                    <td><?php echo($rowdata['hsn_code']) ?></td>
                    <td><?php echo($rowdata['quantity']) ?></td>
                    <td>Pcs.</td>
                    <td><?php $t=$rowdata['amount']; $t2=$rowdata['cgst']+$rowdata['sgst']; $tax=$t*($t2/100); echo($rowdata['rate']-$tax); ?></td>
                    <td><?php $t=$rowdata['amount']; $t2=$rowdata['cgst']+$rowdata['sgst']; $tax=$t*($t2/100); $totalafterqnty = ($rowdata['rate']-$tax) * $rowdata['quantity']; echo($totalafterqnty); ?></td>
                    <td><?php echo($rowdata['discount']) ?></td>
                    <td><?php $t=$rowdata['amount']; $t2=$rowdata['cgst']+$rowdata['sgst']; $tax=$t*($t2/100);  echo($tax); ?></td>
                    <td><?php echo($rowdata['cgst']) ?>%</td>
                    <td><?php echo($tax/2) ?></td>
                    <td><?php echo($rowdata['sgst']) ?>%</td>
                    <td><?php echo($tax/2) ?></td>
                    <td><?php echo($rowdata['igst']) ?>%</td>
                    <?php $total =$total+$rowdata['amount']; $payamt=$rowdata['pay_cost']; $finance=$total-$payamt; ?>
                    <td>
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
                    </td>
                </tr>
                 <?php } ?>
                <tr>
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
                </tr>
                <tr>
                    <td colspan="8">
                        <p>Certified that the particulars given above true 
                        and correct and the amount indicated</p>
                        <p>a. Represent the price actually charged
                           and that there is no flow additional 
                           considaration directly or indirectly from 
                           the buyer or</p>
                        <p>b. is provisional as additional considaration will be received from the buyer on an</p>
                    </td>
                    <td colspan="8">Electronic referance Number</td>
                </tr>
                <tr>
                    <td colspan="8">
                        <h6>TERMS OF SALE :</h6>
                        <p>1.Goods once sold will not be taken back or exchangeed.</p>
                        <p>2.Seller is not responsible for any loss or damageed of goods in transit.</p>
                        <p>3.Buyer undertakes to submit prescribed ST declaration to sender on demand Dispute 
                           if any will be subject to seller court jurisdication.</p></td>
                    <td colspan="8"><h6 class="text-center">For J.K. ENTERPRISES</h6>
                        <h6 class="text-center">Authorised Signatory</h6>
                    </td>
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