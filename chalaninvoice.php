<?php
	include('config.php');
?>
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
  width: 210mm;
  height : 297mm;
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
  table, td, th {
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>
<?php
include('config.php');
require_once("include/numbertowords.php");
$id = $_GET['printid'];
$sql = mysqli_query($con,"SELECT * FROM `expense` WHERE `id`='$id'");
while($expenses = mysqli_fetch_assoc($sql)){
 ?>
<html>
<body>
  <table width="100%">
    <tr>
      <td colspan="2"><center><font size="30">SARADA ENTERPRISES</font><br>Plot No.-182/3577, Mukundaprasada, P N College, Khordha,Pin - 752057</br>
Email id : saradenterprises16@gmail.com
Mob. - 8018547350</br> GSTIN-21ALJPM4220A1ZX</center> </td>
    </tr>
    <tr>
      <td>Challan No : <?php echo $expenses['id']; ?></td>
      <td>Date and Time: <?php echo $expenses['date']; ?> </td>
    </tr>
  </table>
<br>
  <table width="100%">
    <tr>
      <td>Supplier Name : <b><?php $supplierid = $expenses['supplayername']; $sql1 = mysqli_query($con,"SELECT `name` FROM `pdc_buyer` WHERE `id`='$supplierid'");
		  while($rowdata = mysqli_fetch_assoc($sql1)){ echo($rowdata['name']);}
		  ?></b></td>
      <td>Customer Name :<b><?php $customerid = $expenses['customername']; $sql1 = mysqli_query($con,"SELECT `name` FROM `buyerdetails` WHERE `id`='$customerid'");
		  while($rowdata = mysqli_fetch_assoc($sql1)){ echo($rowdata['name']);}
		  ?></b></td>
    </tr>
    <tr>
      <td>Details : <b><?php echo $expenses['details']; ?></b></td>
      <td>Payment Mode : <b><?php  if($expenses['mode'] == 1) echo "Cash"; else if($expenses['mode'] == 2) echo "Cheque"; else if($expenses['mode'] == 3) echo "Online Transanction";?></b> </td>
    </tr>
    <tr>
      <td>Amount : <b><?php echo $expenses['amount']; ?></b></td>
      <td>Amount in Words : <b><span><?php echo convert_number_to_words($expenses['amount']);?> ONLY</span></b> </td>
    </tr>
    <tr>
      <td></td>
      <td><center>Signature</center><br><br><br><br></td>
    </tr>
  </table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
 //window.print();
 //window.close();
});
</script>
</html>

<?php }} else {header('Location : dashboard.php');}  ?>
