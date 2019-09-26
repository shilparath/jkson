<?php  if(!empty($_GET['printid'])) {
?>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;

}
span{
  text-transform: uppercase;
}
p{
    margin-top: 2px;
    margin-bottom: 2px;
}
body{
  margin-left: 40px;
  margin-right: 40px;
}
hr{
  margin-top: 2px;
  margin-bottom: 2px;
}
@media print {
html,body{height:100%;width:100%;margin:0;padding:0;}
 @page {
  size: 21cm 29.7cm;
	max-height:100%;
	max-width:100%
  font-size: 8pt;
  overflow: hidden;
	}
}
  #printbtn{
    visibility: : none !important;
  }
</style>
<?php
include("config.php");
require_once("include/numbertowords.php");
function fetchBuyer($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  pdc_Buyer.name as customerName,
  pdc_Buyer.address as Address,
  pdc_Buyer.gstin,
  pdc_Buyer.pan,
  pdc_Buyer.cin
  FROM insertProduct
  INNER JOIN pdc_Buyer ON insertProduct.customer_details = pdc_Buyer.id
  WHERE insertProduct.bill = ?
  LIMIT 1
  ");
  $stmt->bind_param("s",$id);
  $stmt->execute();
  $stmt->bind_result($customerName,$address,$gstin,$pan,$cin);
  while($stmt->fetch()){
    $row[] = array('customerName' => $customerName,'address'=>$address,'gstin'=>$gstin,'pan'=>$pan,'cin'=>$pan );
  }
  $stmt->close();
  if(!empty($row)){
    return $row;
  } else{
    return "";
  }
}
$id = $_GET['printid'];
$Buyer = fetchBuyer($id);  ?>
<!DOCTYPE html>
<html lang="en">
<body>
<!--<table width="100%">
  <tr>
    <td>
      <?php foreach ($Buyer as $v1) { ?>
    <p> Buyer Name: <span style="margin-left:35px;"><?php echo $v1['customerName'];?><span></p>
    <p> Adress:<span style="margin-left:75px;"><?php echo $v1['address'];?></span></p>
    <p> GSTN No:<span style="margin-left:56px;"><?php echo $v1['gstin'];?></span></p>
    <p> PAN no:<span style="margin-left:72px;"><?php echo $v1['pan'];?></span></p>
    <p> CIN No:<span style="margin-left:70px;"><?php echo $v1['cin'];?></span></p>
    <?php } ?>
  </td>
  </tr>
  <tr>
    <td>
      <p style="font-size:20;text-align:center;">TAX INVOICE</p>
      <p style="text-align:center;">Issued under section 31 of the central Goods and Service Tax Act ,2017</p>
    </td>
  </tr>
</table>-->
<br>
<table width="100%">
  <tr>
    <td>
      <p>Bill To</p>
      J.K. ENTERPRISES</p>
      Kalinga Nagar, Nuasahi, Choudwar, Cuttack-754071</p>
      Email id : jk@yahoo.com</p>
      Mob. - 00000000</p>
      GSTIN :21BICPG1263H1ZJ</p>
       
      </p>
    </td>
    <td>
      Bill From</p>
      <?php echo $v1['customerName'];?></p>
      Address: <?php echo $v1['address'];?></p>
      GST No : <?php echo $v1['gstin'];?></p>
      PAN No :<?php echo $v1['pan'];?>
    </td>
    
    <?php
    function fetchProductDetails($id){
      global $mysqli;
      $stmt = $mysqli->prepare("SELECT
      invoice_no,
      rdate,
      so_no,
      order_no,
      place_of_supply,
      mat_des,
      customer_drg_no,
      quantity,
      rate,
      discount,
      amount
      FROM insertProduct
      WHERE bill = ?
      LIMIT 1
      ");
      $stmt->bind_param("s",$id);
      $stmt->execute();
      $stmt->bind_result($invoice_no,$rdate,$so_no,$order_no,$place_of_supply,$mat_des,$customer_drg_no,$quantity,$rate,$discount,$amount);
      while($stmt->fetch()){
        $row[] = array('invoice_no' => $invoice_no,'rdate'=>$rdate,'so_no'=>$so_no,'order_no'=>$order_no,'place_of_supply'=>$place_of_supply,'mat_des'=>$mat_des,'customer_drg_no'=>$customer_drg_no,'quantity'=>$quantity,'rate'=>$rate,'discount'=>$discount,'amount'=>$amount );
      }
      $stmt->close();
      if(!empty($row)){
        return $row;
      } else{
        return "";
      }
    }
     ?>
     <?php $result = fetchProductDetails($id);
     foreach ($result as $v2) { ?>
    <td>
      <br>
      <p style="text-align:center;">ORIGINAL</p>
      <br>
      <hr>
      <p>Invoice No: <span><?php echo $v2['invoice_no'];?></span></p>
      <p>Date: <span><?php echo $v2['rdate'];?></span></p>
    </td>
  </tr>
  <tr>
    <td>
      <p> S.O. Number : <span><?php echo $v2['so_no']; ?></span><p>
    </td>
    <td>
      <p> Order Number : <span><?php echo $v2['order_no']; ?></span><p>
    </td>
    <td>
      <p> Place of Supply : <span><?php echo $v2['place_of_supply']; ?></span><p>
    </td>
  </tr>
  <?php } ?>
</table>
<br>
<table width="100%">
  <tr>
    <th>
      Sl. No.
    </th>
    <th>
      Company Name
    </th>
    <th>
     Model No
    </th>
    <th>
      HSN Code
    </th>
    <th>
      IMEI No
    </th>
    <th>
      Color
    </th>
    <th>
      Quantity
    </th>
    <th>
      Rate/Each
    </th>
    
    <th>
      Discount(%)
    </th>
    <th>
      Total
    </th>
  </tr>
  <?php
  function fetchProductDetails1($id){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    invoice_no,
    rdate,
    so_no,
    order_no,
    place_of_supply,
    mat_code,
    mat_des,
    hsn_code,
    customer_drg_no,
    quantity,
    rate,
    discount,
    amount,
    imeino,
    color
    FROM insertProduct
    WHERE bill = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $stmt->bind_result($invoice_no,$rdate,$so_no,$order_no,$place_of_supply,$mat_code,$mat_des,$hsn_code,$customer_drg_no,$quantity,$rate,$discount,$amount,$imeino,$color);
    while($stmt->fetch()){
      $row[] = array('invoice_no' => $invoice_no,'rdate'=>$rdate,'so_no'=>$so_no,'order_no'=>$order_no,'place_of_supply'=>$place_of_supply,'mat_code'=>$mat_code,'mat_des'=>$mat_des,'hsn_code'=>$hsn_code,'customer_drg_no'=>$customer_drg_no,'quantity'=>$quantity,'rate'=>$rate,'discount'=>$discount,'amount'=>$amount,'imeino'=>$imeino,'color'=>$color );
    }
    $stmt->close();
    if(!empty($row)){
      return $row;
    } else{
      return "";
    }
  }
  $i=0;
   $result = fetchProductDetails1($id);
  foreach ($result as $v2) { ?>
  <tr>
    <td>
      <p style="text-align:center;">#<?php echo ++$i; ?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['mat_code'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['mat_des'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['hsn_code'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['imeino'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php $colorid = $v2['color']; $sql = mysqli_query($con,"SELECT * FROM `bobilecolor` WHERE `id`='$colorid'"); while($rowdata = mysqli_fetch_assoc($sql)){ echo($rowdata['colorname']);} ?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['quantity'];?></p>
    </td>
    <td>
      <p style="text-align:center;">Rs&nbsp;<?php echo $v2['rate'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['discount'];?>%</p>
    </td>
    <td>
      <p style="text-align:center;">Rs&nbsp;<?php echo $v2['amount'];?>/-</p>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="8">
      <p style="text-align:center;">Whether the tax is payble on reverse charge basis:No<br/>
      Insured Under M/S Tata AIG General Insurance Company Ltd.,Policy No. Date:</p>
    </td>
    <?php function fetchtaxes($id){
      global $mysqli;
      $stmt = $mysqli->prepare("SELECT
      ROUND(SUM(amount),2),
      ROUND(SUM(freight),2),
      cgst,
      igst,
      sgst,
	  SUM(taxamount_insert)
      FROM insertProduct
      WHERE bill = ?
      ");
      $stmt->bind_param("s",$id);
      $stmt->execute();
      $stmt->bind_result($rate,$freight,$cgst,$igst,$sgst,$taxamount_insert);
      while($stmt->fetch()){
        $row[] = array('rate' =>$rate ,'freight'=>$freight,'cgst'=>$cgst,'igst'=>$igst,'sgst'=>$sgst,'taxamount_insert'=>$taxamount_insert);
      }
      if(!empty($row))
    	{
    		return ($row);
    	}
    	else
    	{
    		return "";
    	}
    }
    $taxess = fetchtaxes($id);
    foreach ($taxess as $v1) {
      $taxxess = $v1['cgst']+$v1['igst']+$v1['sgst'];
      $totall =$v1['rate']+$v1['freight'];

    }
    $total_amount =$totall+$v1['taxamount_insert'] ;

    ?>
    <td>
      <p style="text-align:center;">Sub Total</p>
      <hr>
      <p style="text-align:center;">Freight:</p>
      <hr>
      <p style="text-align:center;">Sub Total</p>
      <hr>
      <p style="text-align:center;">GST :</p>
      <hr>
      <p style="text-align:center;">Total Value :</p>
    </td>
    <td>
      <p style="text-align:center;"> Rs  <?php  echo ($v1['rate']);  ?>/-</p>

        <hr>
        <p style="text-align:center;"> Rs&nbsp;<?php  echo ($v1['freight']);  ?>/-</p>
        <hr>
        <p style="text-align:center;"> Rs&nbsp;<?php echo $totall;?>/-</p>
        <hr>
        <p style="text-align:center;"> Rs <?php echo($v1['taxamount_insert']) ?>/-</p>
        <hr>
        <p style="text-align:center;"> Rs&nbsp; <?php echo round($total_amount); ?>/-</p>
    </td>
  </tr>
</table>
<p>Total IGST In Word Rupees:<?php $new_igst=convert_number_to_words(($totall)/100 * $taxxess);
		 echo  strtoupper($new_igst);?></p>
<p>Total Invoice Value In Words Rupees:<?php $new_s_total=convert_number_to_words($total_amount);
		 echo  strtoupper($new_s_total);?></p>
     <!--<table width="100%">
       <tr>
         <td>
           <p>
             1. No adjustment can be made after the submission of the bill.interest at prevalling Bank interest rate p.a
               will be charged if the bill is not settled as per payment terms.<br/><br>
               2.The property of the goods will not pass to the buyer till the payment in full his received by us. till
               such time the goods shall be considered to be held in trust by the purchaser on our behalf.
           </p>
         </td>
         <td>
          <p> Certified that the particulars given above are true and correct and amount indicated represents the
             price actually charged and that there is no flow of additional consideration directly or indirectly from buyer.<BR />

           </p>
         </td>
       </tr>
       <tr>
         <td>
           <p style="text-align:center;">Received the material in good condition with relevent documents for village ITC under GST </p>
           <br>
           <br>
           <br>
           <p style="text-align:center;">Customer Signature</p>
         </td>
         <td>
           <p style="text-align:center;">for NEW ROCKS MOBILE WORLD</p>
           <br>
           <br>
           <br>
           <p style="text-align:center;">Authorised signatory</p>
         </td>
       </tr>
     </table>-->
     <br>
     <center><button id="printbtn" onClick="window.print();" type="submit" name="submit">PRINT </button></center>
     <br>
     <br>
     <br>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
// $( document ).ready(function() {
//     window.print();
// });
</script>
</html>

<?php } else {header('Location : dashboard.php');}  ?>
