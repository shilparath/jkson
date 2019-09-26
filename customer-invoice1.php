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
    <p>TAX INVOICE<br><br>
    <img src="images/logo.jpeg" height="95px" width="95px"><br><br>
     At:Kalinga Nagar, Nuasahi, Choudwar, Cuttack - 754071<br>
  Email id : jksons222@gmail.com<br>
    Mob. - 7077658222<br>
    GSTIN : 21BUAPG6522J1Z1<br></p>
    <div align="right" style="width:60%">Original for Recipient</div><br><br>
  </div>
  <div class="col-sm-12">
    <?php $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE `bill`='$bill' LIMIT 1");
      while($rowdata = mysqli_fetch_assoc($sql)){
          
      ?>
  </div>
  <div class="col-sm-12" style="margin-top: -21px;">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table class="table table-bordered" border="1" width="100%">
          <tr>
            <td style="width:60%">
              <p>Details Of Receiver (Billed To)</p>
              <p>Name: <?php echo($rowdata['new_customer']) ?></p>
              <p>Phone No: <?php echo $rowdata['code'] ?></p>
              <p>Address: <?php echo $rowdata['address'] ?></p>
              <p>State: <?php echo $rowdata['state'] ?></p>
              <p>GST No: <?php echo $rowdata['gstno'] ?></p></td>
            <td align="center">
              Invoice No: <?php echo $rowdata['invoice_no'] ?> </td>
            <td align="center">Date:
              <?php $date = strtotime($rowdata['invoice_date']); echo $newformat = date('d-m-Y',$date); ?></td>
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
            $tax = $rowdata['cgst']+$rowdata['sgst']+$rowdata['igst'];
            //print_r($rowdata);
        
        ?>
              <tr>
                <td><?php echo $xy++ ?></td>
                <td><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT `mat_code` FROM `insertproduct` WHERE `id`='$id'");while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['mat_code']); } ?></td>
                <td><?php $id = $rowdata['mat_des']; $sql1 = mysqli_query($con,"SELECT product_name.name as product_name FROM `insertproduct` JOIN product_name ON insertproduct.product_name = product_name.id WHERE insertproduct.id='$id'");while($rowdata1 = mysqli_fetch_assoc($sql1)){ echo($rowdata1['product_name']); } ?></td>
                <td><?php echo($rowdata['hsn_code']) ?></td>
                <td><?php echo($rowdata['quantity']) ?></td>
                <td>Pcs.</td>
                <td><?php  $singe_amount = ($rowdata['rate']*100)/($tax+100); echo number_format((float)($singe_amount), 2, '.', '')  ?></td>
                <td><?php $total_amount_without_tax = $singe_amount* $rowdata['quantity']; echo number_format((float)($total_amount_without_tax), 2, '.', '') ?></td>
                <td><?php echo($rowdata['discount']) ?></td>
                <td><?php $tax_amount_per_product = $rowdata['item_value']-$total_amount_without_tax; echo number_format((float)($tax_amount_per_product), 2, '.', '') ?></td>
                <td><?php echo($rowdata['cgst']) ?>%</td>
                <td><?php echo number_format((float)(($tax_amount_per_product/2)), 2, '.', '') ?></td>
                <td><?php echo($rowdata['sgst']) ?>%</td>
                <td><?php echo number_format((float)(($tax_amount_per_product/2)), 2, '.', '') ?></td>
                <td><?php echo($rowdata['igst']) ?>%</td>
                <?php $total =$total+$rowdata['amount']; $payamt=$rowdata['pay_cost']; $finance=$total-$payamt; ?>
                <td><?php 
                        if($rowdata['igst'] == 0)
                            {
                                echo($rowdata['igst']); 
                            }
                         else
                            { 
                                echo($rowdata['tax_amount']); 
                            }
                        ?>                </td>
              </tr>
              <?php } ?>
              <tr>
                <td colspan="9" rowspan="8">Invoice Total (In Words) :<?php $tax_amountt = convert_number_to_words(($total));
		 echo  strtoupper($tax_amountt);?></td>
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
                <td colspan="5"><b>Company's Bank Details</b><br>
                  Bank Name - Bank of Baroda<br>
                   A/c. No - 36260200000224<br>
                  IFSC Code - BARB0MAHATA<br>
                  Branch - CTC, Mahatab Road<hr>
                  <br>
                  </p>
                  <p>LOADING POINT : .....................</p>
                  <p>CARRIER DETAILS : ...................</p></td>
                <td colspan="5"><h6>Declaration :</h6>
                  <p>We declare that this invoice shows the actual</p>
                  <p>Price of the goods described and that all perticulars are true and correct</p>
                  <p>All subject to Cuittack Jurisdiction</p>
                <td colspan="6" align="center"><h6>For J.K & Sons</h6>
                  <h6 class="text-center">Authorised Signatory</h6></td>
              </tr>
			  <tr>
                <td colspan="16" align="center"><b>  This is a Computer Generated Invoice </b></td>
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
