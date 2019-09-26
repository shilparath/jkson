
<?php include('config.php');
require_once("assets/numbertowords.php");


		if(!isset($_SESSION))
		{
			session_start();
		}
	if(!$_SESSION){
		header('location:index.php'); }
	$sessionname = $_SESSION['login_user'];
	if($sessionname){
	 include('include/header.php');
	include('config.php');

$id = $_REQUEST['printid'];
						$sqlb= mysqli_query($con, "select buy_material_details.* ,buyer_details.*,sum(buy_material_details.quantity) as quantity,sum(buy_material_details.amount) as amount,sum(buy_material_details.item_value) as item_value from buy_material_details inner join buyer_details on buyer_details.sl_no= buy_material_details.customer_details where buy_material_details.bill_no='$id' ");

					//SELECT IL.sl_no, IL.item_name, IL.price, IL.item_type,I.stock_in, AS ITEMTYPEID, IT.item_type FROM ho_item_list AS IL INNER JOIN itemtype AS IT ON IL.item_type = IT.sl_no WHERE IL.status='1'
					$i=1;

					$rowb = mysqli_fetch_array($sqlb);

/*	print_r($id);
	exit();
	*/?>
	<style type="text/css">
	label.error {

	padding: 0 0 0 10px;
	color: red;
	font-weight: normal;
}
.style2 {font-family: Georgia, "Times New Roman", Times, serif}
</style>
<head>
<title> TAX INVOICE(For Buyer)</title></head>
<div class="container-fluid">
  <div class="row-fluid">
    <?php include('include/sidebar.php');?>
    <noscript>
    <div class="alert alert-block span10">
      <h4 class="alert-heading">Warning!</h4>
      <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
    </div>
    </noscript>
    <div id="content" class="span10">
      <!-- content starts -->
     <!-- <div>
        <ul class="breadcrumb">
          <script type="text/javascript"> breadcrumbs() </script>
        </ul>
      </div>-->
	  <!--Success Message -->
      <div>
        <?php if(isset($_SESSION['CONFIRM']) && $_SESSION['CONFIRM']) {
		$message = $_SESSION['CONFIRM'];
		unset($_SESSION['CONFIRM']);
		?>
        <div class="alert alert-success">
          <button data-dismiss="alert" class="close" type="button">?</button>
        <!--  <strong>Well done!</strong> Data Successfully Submited. </div>-->
		<?php echo $message;?>
        <script type="text/javascript"> $('.alert').delay(3000).fadeOut(); </script>
        <?php } ?>

      </div>
	  <div id="div-msg"> <span id="msg"></span> </div>
      <div id="printto">
	  <div class="row-fluid">
        <div class="box span12">
          <div class="box-content">
            <form class="form-horizontal" method="post" action="party_wastr_entry_submit.php" name="bill_master" id="billform">


	       <table border="1" width="100%"><tr><td width="100%"><p>Buyer Name: <?php echo $rowb['buyer_name'];?></p>
		  <p> Adress:<?php echo $rowb['buyer_address'];?></p>
		  <p> GSTN No:<?php echo $rowb['gstin'];?></p>
		  <p> PAN no:<?php echo $rowb['pan'];?></p>
		  <p> CIN No:<?php echo $rowb['cin_no'];?></p>
		  </td><tr align="center"><td width="100%"><br />
<font size="+2"  >TAX INVOICE</font> <br />Issued under section 31 of the central Goods and Service Tax Act ,2017</td></tr></table><br />
<table width="100%" border="1">
  <tr>
    <td width="29%"  rowspan="2"><p>Billed To</p>
	      M/S DSK ENTERPRISERS PVT. LTD</p>
      PLOT NO-217,KUNJABAN BHAVAN,2ND FLOOR,</p>
      CUTTACK ROAD,BHUBANESWAR-751006,ODISHA</p>
      State &amp; State Code:ODISHA,21</p>
      GSTIN :21AADCD5399PIZ5
      </td>
    <td width="46%" rowspan="2">Delivery At</p>
      M/S DSK ENTERPRISERS PVT. LTD</p>
      PLOT NO-217,KUNJABAN BHAVAN,2ND FLOOR,</p>
      CUTTACK ROAD,BHUBANESWAR-751006,ODISHA</p>
      State &amp; State Code:ODISHA,21</p>
      GSTIN :21AADCD5399PIZ5    </td>
    <td width="25%" height="62"> <div align="bill">  		<span id="replacebtnvalue" style="margin-left:50px">

		</span>     </div>
</td>
  </tr>
  <?php 	$sqlp= mysqli_query($con, "select * from  buy_material_details  where buy_material_details.bill_no ='$id'");

					//SELECT IL.sl_no, IL.item_name, IL.price, IL.item_type,I.stock_in, AS ITEMTYPEID, IT.item_type FROM ho_item_list AS IL INNER JOIN itemtype AS IT ON IL.item_type = IT.sl_no WHERE IL.status='1'
					$i=1;

				$rowp = mysqli_fetch_array($sqlp);
	?>
  <tr>
    <td height="53">Invoice Number<br /><?php echo $rowp['invoice_no'];?>
     <br /> Date <?php echo $rowp['date'];?></td>
  </tr>
  <tr>
    <td height="36">S.O Number : <br /><?php echo $rowp['so_no'];
				?> </td>
    <td>Order Number :<br /><?php echo $rowp['order_no'];
				?> </td>
    <td>Place of Supply<br /><?php echo $rowp['place_of_supply'];?>
       </td>
  </tr>
</table>

<table width="100%" border="1">
  <tr>
    <td width="7%"><div align="center">Sno</div></td>
    <td width="32%"><div align="center">OUR DRG. NO/PRODUCT DESCRIPTION </div></td>
    <td width="25%"><div align="center">Customer Drg No </div></td>
    <td width="14%"><div align="center">Qty</div></td>
    <td width="8%"><p align="center">Rate/Each</p>
      <p align="center">Rs. Ps. </p></td>
    <td width="7%"><p align="center">Discount</p>
      <p align="center">(%)</p></td>
    <td width="7%"><p align="center">Total </p>
      <p align="center">Rs. Ps. </p></td>
  </tr>
    <?php 	$sql1= mysqli_query($con, "select buy_material_details.* from buy_material_details   where buy_material_details.bill_no ='$id'");

					//SELECT IL.sl_no, IL.item_name, IL.price, IL.item_type,I.stock_in, AS ITEMTYPEID, IT.item_type FROM ho_item_list AS IL INNER JOIN itemtype AS IT ON IL.item_type = IT.sl_no WHERE IL.status='1'
					$i=0;

			?>

  				<?php while($row1 = mysqli_fetch_array($sql1)) { ?>

  <tr>
  <td align="center" height="30">
				   	  <?php //echo $id;?>
<?php echo ++$i; ?></td>
 <td align="center"><?php echo $row1['mat_des'];?></td>
        <td align="center"><?php echo $row1['customer_drg_no'];?></td>
<td align="center"><?php echo $row1['quantity'];?></td>
    <td align="center"><?php echo $row1['rate'];?></td>
    <td align="center"><?php echo $row1['discount'];?></td>
    <td align="right"><?php echo $row1['amount'];?></td>
 </tr>
  <?php } ?>
  <tr>



 <?php 	$sql2= mysqli_query($con, "select sum(buy_material_details.amount) as TOTAL, buy_material_details.* from buy_material_details where buy_material_details.bill_no ='$id'");

					//SELECT IL.sl_no, IL.item_name, IL.price, IL.item_type,I.stock_in, AS ITEMTYPEID, IT.item_type FROM ho_item_list AS IL INNER JOIN itemtype AS IT ON IL.item_type = IT.sl_no WHERE IL.status='1'
					$i=0;
					$row2 = mysqli_fetch_array($sql2);

			?>

  				<?php //while($row2 = mysqli_fetch_array($sql2)) {

 $new_rounded=number_format((float)$new, 2, '.', '');
	  $new_rounded1=number_format((float)$new_balance, 2, '.', '');
	  $final_rounded=$new_rounded1-$new_rounded;

		//echo round($new,2);
?>

    <td height="91" colspan="4" rowspan="6">Whether the tax is payble on reverse charge basis:No<br />
      Insured Under M/S Tata AIG General Insurance Company Ltd.,Policy No. Date: </td>
    <td colspan="2">Sub Total :  </td>
    <td align="right"><?php  $new_amount=$row2['TOTAL'];
		 echo  $new_rounded1=number_format((float)$new_amount, 2, '.', '');
?></td>
  </tr>
  <tr>
    <td colspan="2">P &amp; F 1.5(%):      </td>
    <td align="right"><?php $pf=$new_rounded1*(1.5/100);
	echo  $pf1=number_format((float)$pf, 2, '.', '');?></td>
  </tr>
  <tr>
    <td colspan="2">Freight:       </td>
    <td align="right"><?php echo $fright=16.59;
	$sub_total=$new_rounded1+$pf1+$fright; ?></td>
  </tr>
  <tr>
    <td colspan="2">Sub Total:</td>
    <td align="right"><?php echo $sub_total;?></td>
  </tr>
  <tr>
    <td colspan="2">IGST 18(%):      </td>
    <td align="right"><?php
	//$igst1=$row2['IGST'];
	$igst1=18;
	 $sub_newtotal=$sub_total*$igst1/100;
	echo $sub_newtotal1 =number_format((float)$sub_newtotal, 2, '.', '');?></td>
  </tr>
  <tr>
    <td colspan="2">Total Value:</td>
    <td align="right"><?php  $s1=$sub_newtotal+$sub_total;
	echo $s2=number_format((float)$s1, 2, '.', '');
	?></td>
  </tr>
</table>
Total IGST In Word Rupees:
<?php $new_igst=convert_number_to_words($sub_newtotal1);
		 echo  strtoupper($new_igst);
	?><br />
Total Invoice Value In Words Rupees:<?php $new_s_total=convert_number_to_words($s2);
		 echo  strtoupper($new_s_total);
	?>
<table width="100%" border="1">
  <tr>
    <td width="51%" height="54"><p>1. No adjustment can be made after the submission of the bill.interest at prevalling Bank interest<BR /> rate p.a
      will be charged if the bill is not settled as per payment terms.<BR />
      2.The property of the goods will not pass to the buyer till <BR />the payment in full his received by us. till
      such time the goods shall be considered to be held in trust by the purchaser on our behalf.  </td>
    <td width="49%">Certified that the particulars given above are true and correct and amount indicated represents the<BR />
      price actually charged and that there is no flow of additional consideration directly or indirectly from buyer.<BR />
      Make payment in favour of &quot;JUNATICS INDIA PRIVATE LIMITED&quot;   </td>
  </tr>
  <tr>
    <td height="57"><p>Received the material in good condition with relevent documents for village ITC under GST </p>
      <p align="center">Customer Signature </p></td>
    <td><div align="center">
      <p>for JANATICS INDIA PRIVATE LIMITED </p>
      <p>&nbsp;</p>
      <p>Authorised signatory </p>
    </div></td>
  </tr>

</table>

        <div class="clearfix"></div>
               <div class="form-actions" id="btncategory">
  <button id="printbtn1" onclick="printContent('billform', 'Original Copy');" >Original</button>
 <button type="button" id="printbtn2" onclick="printContent('billform', 'Duplicate Copy');" >Duplicate</button>
  <button type="button" id="printbtn3" onclick="printContent('billform', 'Extra Copy');" >Triplicate</button>
  </div>





            </form>
          </div>
        </div>
        <!--/span-->
      </div>
      <!--/row-->
      <!--/row-->
      <!-- content ends -->
    </div>
    <!--/#content.span10-->
  </div>
</div>
<!--/.fluid-container-->
<?php include('include/footer.php'); }?>
<!--<script src="js/Room-MasterScript.js"></script>-->
<script src="js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function()
	{
	$("#sidebar ul.menu li:nth-child(7) ul").attr("style","display:block");
	$('#billform').validate();
	$('input[type="submit"]').attr('disabled','disabled');
	//add room type
	var z=0;
	$(document).on('click', '.add-row', function(){
		var id = $(this).attr('id');
		var last = parseFloat(id.split("-").pop());
		z++;
		$('#add_tr').replaceWith('');
		jQuery.ajax
		({
			type:"post",
			url:"billAjax.php",
			dataType:"text", // Data type, HTML, json etc.
			data:{action:"itemreplace"},
			success:function(response)
			{//alert(JSON.stringify(response.item_unit));

			$('.add_tr').replaceWith('<tr class="p_scents" id="row-'+z+'"><td><select name="itemype[]" class="itemtype_cls required" style="width:140px;" id="itemtype-'+z+'">'+response+'</select></td><td><select id="item_name-'+z+'" name="item_name[]" class="item_name_cls required" style="width:160px"><option>-- Select --</option></select></td><td><input type="text" name="item_price[]" class="itemprice_cls" id="item_price-'+z+'" style="width:100px;" value="0" readonly=""/><input type="hidden" name="initialprice[]" id="initialprice-'+z+'" class="initialprice_cls" /></td><td><input type="text" name="itemnumber[]" class="itemnumber_cls" value="1" id="itemnumber-'+z+'" style="width:100px;"/></td>  <td><a href="#"><button type="button" class="btn btn-small btn-danger remove-row"><i class="icon-minus"></i></button></a></td></tr><tr class="add_tr"></tr>');
				return false;
			}
		});

	})

	//remove rows
	$(document).on('click','.remove-row',function(){
		$(this).parent().parent().parent().remove();
		z--;
		$('input[type="submit"]').attr('disabled','disabled');
	})

	$('#finalAmount').click(function(e) {

		var finalAmount = 0;
		for(var i=0;i<=z;i++) {

		   finalAmount = parseInt(finalAmount) + parseInt($("#item_price-"+i).val());
		}
		$('#totalAmount').val(finalAmount);
		$('#totalDiv').html('<h3>Total Amount : '+finalAmount+'</h3>');
		  $('input[type="submit"]').removeAttr('disabled');
	})

	$(document).on('keyup', '.itemnumber_cls', function(e) {
	    var id = $(this).attr('id');
		var last = parseFloat(id.split("-").pop());
		var itemnumber = $('#'+id).val();

	//	alert(itemnumber);
		if(itemnumber.length < 1) {//alert('xx');
		$("#item_price-"+last).val('0');
		} else {
		  $("#item_price-"+last).val(parseInt(itemnumber) * parseInt($("#initialprice-"+last).val()));
		}

	})
	//room price
	$(document).on('change', '.item_name_cls', function()
	{
	    //alert("sdf");
		var pricetype = $("#price_type").val();
		//alert(pricetype);
		var id = $(this).attr('id');
		var last = parseFloat(id.split("-").pop());
		var itemnameid = $('#'+id).val();
		var itemtypeid = $('#itemtype-'+last).val();
		jQuery.ajax
		({
			type:"post",
			url:"billAjax.php",
			dataType:"text", // Data type, HTML, json etc.
			data:{itemnameid:itemnameid,itemtypeid:itemtypeid,pricetype:pricetype,action:"itemRelation"},
			success:function(response)
			{
			  if(response.trim() != 'error') {
				$("#item_price-"+last).val(response);
				$("#initialprice-"+last).val(response);
				$("#itemnumber-"+last).val('1');
			  } else {
			    $("#item_price-"+last).val('0');
				$("#initialprice-"+last).val('0');
			  }

			}
		});
	})
	//***********************************************************NEW
	$(document).on('change', '.itemtype_cls', function()
	{
		//alert("asd");
		var id = $(this).attr('id');
		var last = parseFloat(id.split("-").pop());
		var itemtypeid = $('#'+id).val();

		jQuery.ajax
		({
			type:"post",
			url:"billAjax.php",
			dataType:"html", // Data type, HTML, json etc.
			data:{itemtypeid:itemtypeid,action:"itemType"},
			success:function(response)
			{
				$("#item_name-"+last).html(response);
                $("#item_price-"+last).val('0');
				$("#initialprice-"+last).val('0');

			}
		});
	})



	//submit
	/*$('.submit').click(function()
	{
		if(ValidforNoinputOne())
		{
			$(this).parent().submit();
		}
		else
		{
			return false;
		}
	})*/
	});
	</script>
		<style type="text/css">
/*@media print {
    #printbtn {
        display :  none;
    }
}*/

@media print {
  body * {
    visibility: hidden;
  }
  #billform, #printto * {
    visibility: visible;
  }
  #billform {
    position: absolute;
    left: 0;
    top: 0;
  }
}

</style>

	<style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
/*
@media print {
  body * {
    visibility: hidden;
  }
  #billform, #printto * {
    visibility: visible;
  }
  #billform {
    position: absolute;
    left: 0;
    top: 0;
  }
}
*/
</style>
<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
//var enteredtext = $('#billform').val();
$("#bill").show();
//$("#duplicate").hide();
//$("#triplicate").hide();

$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
        document.getElementById("duplicate").style.visibility = "hidden";
        document.getElementById("original").style.visibility = "visible";
        document.getElementById("triplicate").style.visibility = "hidden";

//$('#text').html(enteredtext);
}

function printContentOrg(el){
var restorepage = $('body').html();
$("#bill").show();

var printcontent = $('#' + el).clone();
//var enteredtext = $('#billform').val();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
/*$('#original').hide();
$('#duplicate').show();
$('#triplicate').hide();
*/
        document.getElementById("duplicate").style.visibility = "visible";
        document.getElementById("original").style.visibility = "hidden";
        document.getElementById("triplicate").style.visibility = "hidden";

//$('#text').html(enteredtext);
}


function printContentDpl(el){
$("#bill").show();

var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
//var enteredtext = $('#billform').val();
$('body').empty().html(printcontent);
/*$('#original').hide();
$('#duplicate').hide();
$('#triplicate').show();
*/
        document.getElementById("duplicate").style.visibility = "hidden";
        document.getElementById("original").style.visibility = "hidden";
        document.getElementById("triplicate").style.visibility = "visible";

window.print();
$('body').html(restorepage);

//$('#text').html(enteredtext);
}
</script>

<script>
function printContent(el, btnvalue){

$('#replacebtnvalue').html(btnvalue);
$('#btncategory').remove();

var restorepage = $('body').html();
var printcontent = $('#' + el).clone();

$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}

function printContentOrg(el){
var restorepage = $('body').html();
$("#bill").show();

var printcontent = $('#' + el).clone();
//var enteredtext = $('#billform').val();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
$('#original').hide();
$('#duplicate').show();
$('#triplicate').hide();
$("#printbtn1").hide();
$("#printbtn2").hide();
$("#printbtn3").hide();


     /*   document.getElementById("duplicate").style.visibility = "visible";
        document.getElementById("original").style.visibility = "hidden";
        document.getElementById("triplicate").style.visibility = "hidden";
*/
//$('#text').html(enteredtext);
}


function printContentDpl(el){
$("#bill").show();

var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
//var enteredtext = $('#billform').val();
$('body').empty().html(printcontent);
$('#original').hide();
$('#duplicate').hide();
$('#triplicate').show();
$("#printbtn1").hide();
$("#printbtn2").hide();
$("#printbtn3").hide();


      /*  document.getElementById("duplicate").style.visibility = "hidden";
        document.getElementById("original").style.visibility = "hidden";
        document.getElementById("triplicate").style.visibility = "visible";
*/
window.print();
$('body').html(restorepage);

//$('#text').html(enteredtext);
}
</script>
