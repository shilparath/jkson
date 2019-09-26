<?php
//error_reporting(0);
if(!empty($_GET['printid'])) {
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

function IsfetchExistingCustomer($id){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT DISTINCT
	customer_details
	FROM sellItems
  WHERE bill = ?
	");
  $stmt->bind_param("s",$id);
	$stmt->execute();
	$stmt->bind_result($customer);
	$stmt->store_result();
  $stmt->fetch();
  $stmt->close();
	return $customer;
}

function IfCustomerNew($id){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    new_customer,
    address,
    gstin
    FROM sellItems
    WHERE bill = ?
    LIMIT 1
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $stmt->bind_result($new_customer,$address,$gstin);
    while($stmt->fetch()){
      $row[] = array('new_customer' =>$new_customer ,'address'=>$address,'gstin'=>$gstin );
    }
    if(!empty($row))
    {
      return $row;
    }
    else
    {
      return "";
    }

}

function fetchBuyer($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  buyerDetails.name as customerName,
  buyerDetails.address as Address,
  buyerDetails.gstin,
  buyerDetails.pan,
  buyerDetails.cin
  FROM sellItems
  INNER JOIN buyerDetails ON sellItems.customer_details = buyerDetails.id
  WHERE sellItems.bill = ?
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

if(IsfetchExistingCustomer($id) == 0){
$customer =IfCustomerNew($id);
} else {
$customer = fetchBuyer($id); } ?>
<!DOCTYPE html>
<html lang="en">
<body>
<table width="100%">
  <tr>
    <td>
      <?php foreach ($customer as $v1) { ?>
    <p> Buyer Name: <span style="margin-left:35px;"><?php if(IsfetchExistingCustomer($id) == 0){ echo $v1['new_customer']; } else {echo $v1['customerName'];}?><span></p>
    <p> Adress:<span style="margin-left:75px;"><?php echo $v1['address'];?></span></p>
    <p> GSTN No:<span style="margin-left:56px;"><?php echo $v1['gstin'];?></span></p>
    <p> PAN no:<span style="margin-left:72px;"><?php if(IsfetchExistingCustomer($id) == 0){ echo ""; } else {echo $v1['pan'];}?></span></p>
    <p> CIN No:<span style="margin-left:70px;"><?php if(IsfetchExistingCustomer($id) == 0){ echo ""; } else {echo $v1['cin'];}?></span></p>
    <?php } ?>
  </td>
  </tr>
  <tr>
    <td>
      <p style="font-size:20;text-align:center;">TAX INVOICE</p>
      <p style="text-align:center;">Issued under section 31 of the central Goods and Service Tax Act ,2017</p>
    </td>
  </tr>
</table>
<br>
<table width="100%">
  <tr>
    <td>
      <p>Billed From</p>
  	      <?php  if(IsfetchExistingCustomer($id) == 0){ echo $v1['new_customer']; } else {echo $v1['customerName'];}?>,</p>
          <?php echo $v1['address'];?>,</p>
          State &amp; State Code:ODISHA,21</p>
          GSTIN :<?php echo $v1['gstin'];?>
    </td>
    <td>
      Delivery At</p>
      M/S NEW ROCKS MOBILE WORLD</p>
      JAJPUR STATION ROAD,JAJPUR BUS STAND BYPASS</p>
      RAILWAY STATION,JAJPUR-755019,ODISHA</p>
      State &amp; State Code:ODISHA,21</p>
      GSTIN :*******************
    </td>
    <?php
    function fetchProductDetails($id){
      global $mysqli;
      $stmt = $mysqli->prepare("SELECT
      po_no,
      date,
      dispatched,
      invoice_no,
      state,
      remarks
      FROM sellItems
      WHERE bill =?
      LIMIT 1
      ");
      $stmt->bind_param("s",$id);
      $stmt->execute();
      $stmt->bind_result($po_no,$date,$dispatched,$invoice_no,$state,$remarks);
      while($stmt->fetch()){
        $row[] = array('po_no' =>$po_no ,'date'=>$date,'dispatched'=>$dispatched,'invoice_no'=>$invoice_no,'state' =>$state,'remarks'=>$remarks);
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
      <p>Date: <span><?php echo $v2['date'];?></span></p>
    </td>
  </tr>
  <tr>
    <td>
      <p> Dispatched : <span><?php echo $v2['dispatched']; ?></span><p>
    </td>
    <td>
      <p> Remarks : <span><?php echo $v2['remarks']; ?></span><p>
    </td>
    <td>
      <p> State: <span><?php echo $v2['state']; ?></span><p>
    </td>
  </tr>
  <?php } ?>
</table>
<br>
<table width="100%">
  <tr>
    <th>
      Sr No
    </th>
    <th>
      Model No
    </th>
    <th>
      IMEI No
    </th>
    <th>
      Battery No
    </th>
    <th>
      Charger No
    </th>
    <th>
      Quantity
    </th>
    <th>
      Rate/Each<br>
      Rs. Ps.
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
    sellItems.invoice_no,
    sellItems.date,
    sellItems.po_no,
    insertProduct.mat_des,
    sellItems.quantity,
    sellItems.rate,
    sellItems.discount,
    sellItems.amount,
    sellItems.imeino,
    sellItems.battery,
    sellItems.charger
    FROM sellItems
    INNER JOIN insertProduct ON sellItems.mat_des = insertProduct.id
    WHERE sellItems.bill = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $stmt->bind_result($invoice_no,$date,$po_no,$mat_des,$quantity,$rate,$discount,$amount,$imeino,$battery,$charger);
    while($stmt->fetch()){
      $row[] = array('invoice_no' => $invoice_no,'date'=>$date,'po_no'=>$po_no,'mat_des'=>$mat_des,'quantity'=>$quantity,'rate'=>$rate,'discount'=>$discount,'amount'=>$amount,'imeino'=>$imeino,'battery'=>$battery,'charger'=>$charger );
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
      <p style="text-align:center;"><?php echo $v2['mat_des'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['imeino'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['battery'];?></p>
    </td>
    <td>
      <p style="text-align:center;"><?php echo $v2['charger'];?></p>
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
    <td colspan="7">
      <p style="text-align:center;">Whether the tax is payble on reverse charge basis:No<br/>
      Insured Under M/S Tata AIG General Insurance Company Ltd.,Policy No. Date:</p>
    </td>
    <?php function fetchtaxes($id){
      global $mysqli;
      $stmt = $mysqli->prepare("SELECT
      SUM(amount),
      cgst,
      igst,
      sgst
      FROM sellItems
      WHERE bill = ?
      ");
      $stmt->bind_param("s",$id);
      $stmt->execute();
      $stmt->bind_result($rate,$cgst,$igst,$sgst);
      while($stmt->fetch()){
        $row[] = array('rate' =>$rate ,'cgst'=>$cgst,'igst'=>$igst,'sgst'=>$sgst);
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
      $totall =$v1['rate'];

    }
    $total_amount = (($totall)/100 * $taxxess) + $totall;

    ?>
    <td>
      <p style="text-align:center;">Sub Total</p>
      <hr>

      <p style="text-align:center;">Sub Total</p>
      <hr>
      <p style="text-align:center;">IGST <?php echo $taxxess; ?> (%):</p>
      <hr>
      <p style="text-align:center;">Total Value :</p>
    </td>
    <td>
      <p style="text-align:center;"> Rs  <?php  echo ($v1['rate']);  ?>/-</p>

        <hr>

        <p style="text-align:center;"> Rs&nbsp;<?php echo $totall;?>/-</p>
        <hr>
        <p style="text-align:center;"> Rs <?php echo ($totall)/100 * $taxxess
    	  ?>/-</p>
        <hr>
        <p style="text-align:center;"> Rs&nbsp; <?php echo $total_amount; ?>/-</p>
    </td>
  </tr>
</table>
<p>Total IGST In Word Rupees:<?php $new_igst=convert_number_to_words(($totall)/100 * $taxxess);
		 echo  strtoupper($new_igst);?></p>
<p>Total Invoice Value In Words Rupees:<?php $new_s_total=convert_number_to_words($total_amount);
		 echo  strtoupper($new_s_total);?></p>
     <table width="100%">
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
     </table>
     <br>

     <br>
     <br>
     <br>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {

  window.print();
  window.close();
});
</script>
</html>

<?php } else {header('Location : dashboard.php');}  ?>
