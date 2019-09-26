
<?php
		if(!isset($_SESSION))
		{
			session_start();
		}
	if(!$_SESSION){
		header('location:index.php'); }
	$sessionname = $_SESSION['login_user'];
	if($sessionname){

	 	$date = date ("Y-m-d H:i:s");//, strtotime($date1));
//$today = getdate();
include('config.php');
function fetchProduct(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT DISTINCT
	id,
	company_name
	FROM accessories_list
	");
	$stmt->execute();
	$stmt->bind_result($id,$mat_des);
	while($stmt->fetch()){
		$row[] = array('id' =>$id ,'company_name' => $mat_des );
	}
	$stmt->close();
	if(!empty($row))
	{
		return ($row);
	}
	else
	{
		return "";
	}
}
function fetchStates(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	name
	FROM state
	");
	$stmt->execute();
	$stmt->bind_result($name);
	while($stmt->fetch()){
		$row[] = array('name' =>$name );
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
function fetchParty(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT DISTINCT
	id,
	name
	FROM buyerDetails
	");
	$stmt->execute();
	$stmt->bind_result($id,$name);
	while($stmt->fetch()){
		$row[] = array('id' =>$id ,'name' => $name );
	}
	$stmt->close();
	if(!empty($row))
	{
		return ($row);
	}
	else
	{
		return "";
	}
}

	?>
<!DOCTYPE html>
<html lang="en">
<style>
.table-align{
	text-align: center;
	height: 100%;
}
</style>

<?php include("include/header.php"); ?>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper theme-4-active pimary-color-red">
			<!-- Top Menu Items -->
		<?php include("include/top_nav.php"); ?>
			<!-- /Top Menu Items -->

			<!-- Left Sidebar Menu -->
			<?php include("include/nav.php"); ?>
			<!-- /Left Sidebar Menu -->

			<!-- Right Sidebar Menu -->
			<?php include("include/dash_supplier.php"); ?>
			<!-- /Right Sidebar Menu -->

			<!-- Right Setting Menu -->
			<?php include("include/theme_color.php"); ?>

			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">customer invoice form</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="index.html">Dashboard</a></li>
							<li><a href="#"><span>Sell</span></a></li>
							<li class="active"><span>Tax Invoice</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<form method="post" id="tax_invoice" action="submit_accessories_list.php" name="bill_master" id="billform">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">	</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">

														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Customer's Info</h6>
															<hr class="light-grey-hr"/>
															<div class="row">
																

																

														</div>
														<div class="row">
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Buyer Name</label>
																		<input type="text"  name="new_customer"  class="form-control"  placeholder="New Buyer Number" required>
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Date</label>
																			<input onfocus="(this.type='date')" onblur="(this.type='text')" name="date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
																		</div>
																	</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Buyer Address</label>
																		<input type="text" name="address"  class="form-control" placeholder="Buyer Address">
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Buyer GSTIN</label>
																		<input type="text" name="gstin" data-mask="99-a****9999a-9-Z-9" class="form-control" placeholder="Buyer GSTIN No">
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Dispached through</label>
																		<select type="text" name="dispatched" class="form-control">
																			<option value="Courier">Courier</option>
																			<option value="Taken Away" selected>Taken Away</option>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Invoice No</label>
																		<input type="text" name="invoice_no" data-mask="DSK/INV/9999" class="form-control" placeholder="Enter Invoice no" required>
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">State</label>
																		<select type="text" name="state" class="form-control">
																			<?php $states = fetchStates();
																						foreach ($states as $v1) { ?>
																		<option value="<?php echo $v1['name']; ?>"<?php if($v1['name'] == "Odisha") echo "selected"; ?> ><?php echo $v1['name']; ?></option>
																		<?php } ?>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Invoice Date</label>
																		<input onfocus="(this.type='date')" onblur="(this.type='text')" name="invoice_date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Mobile No</label>
																		<input type="text" name="code"  data-mask="999 999 9999" class="form-control" placeholder="Enter Customer Mobile No" required>
																		<span class="help-block">  </span>
																	</div>
																</div>
															</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">
											<table id="POITable"  data-toggle="table"  >
												<thead>
												<tr>
													<th>ID</th>
													<th>Company Name / Model</th>
													<th>IMEI No</th>
													<th>HSN Code</th>
													<th>Unit</th>
													<th>Price Details</th>
													<th>Sale/Rate</th>
													<th>Quantity</th>
													<th>Item Value</th>
													<th>Discount</th>
													
													<th>Amount</th>
													<th>Action</th>

												</tr>
												</thead>
												<tbody >
													<tr class="table-align" id="row-0">
													<td><input type='text' style='text-align:center;width:40px;background-color: #212121;color:#fff;' name="serial_no[]"  value="1" class="serial_no_clss"></td>
													<td><select type='text' style='width:150px;background-color: #212121;color:#fff;' id="mat_des-0" name="mat_des[]" class="mat_des_clss required">
														<option value=""selected disabled> Select Product</option>
														<?php $fetchProduct = fetchProduct();
																	foreach ($fetchProduct as $v1) {?>
														<option value="<?php echo $v1['id'];?>"><?php echo $v1['company_name'];?></option><?php } ?>
													</select></td>
													<td><input type='text' style='width:90px;background-color: #212121;color:#fff;' name="pl_serial_no[]" id="pl_serial_no-0" class="pl_serial_no_cls" ></td>
													<td><input type='text' style='width:80px;background-color: #212121;color:#fff;' name="hsn_code[]" class="hsn_code_clss" id="hsn_code-0" readonly ></td>
													<td><input type='text' style='width:40px;text-align:center;background-color: #212121;color:#fff;' name="unit[]" class="unit_cls"  id="unit-0" readonly></td>
													<td>
												  		<span style="color:#fff;">MRP:</span><br><input type="text" style="width:60px;background-color: #212121;color:#fff;" name="total_cost[]" class="purchase_amount_cls"  id="purchase_amount-0" readonly></td>
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;' name="rate[]" class="rate_cls"  id="rate-0" ></td>
													<td><input type='text' style='width:50px;background-color: #212121;color:#fff;' name="quantity[]" class="quantity_cls"  id="quantity-0" ></td>
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;' name="item_value[]" class="item_value_cls"  id="item_value-0" ></td>
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;'  name="discount[]" class="discount_cls"  id="discount-0"></td>
													
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;' name="amount[]" class="amount_cls"  id="amount-0" readonly>
													<input type='hidden' style='width:60px;background-color: #212121;color:#fff;' name="income[]" class="income_cls"  id="income-0" readonly>
													<input type='hidden' style='width:60px;background-color: #212121;color:#fff;' name="stock[]" class="stock_cls"  id="stock-0" readonly></td>
													<td class="text-nowrap"><a  class="add-row mr-15" id="addrow-0" data-toggle="tooltip" data-original-title="Add Product"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
														<a onClick="deleteRow(this);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
												</tr>
												  <tr class="add_tr"></tr>
												</tbody>
											</table>
											<br>
											 <div class="row">
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label mb-10">Total Amount to Pay</label>
													<div class="input-group mb-15"> <span class="input-group-addon"><i class="fa fa-inr"></i></span>
													<input type="text" style="background-color:#212121;"  name="pay_cost" id="pay_cost" class="form-control" placeholder="Total Amount" readonly>
													</div>
													<span class="help-block">  </span>
												</div>
											</div>
										</div>
											<div class="form-actions mt-10">
				                <button type="submit" class="btn btn-success  mr-10"> Save</button>
				                <button type="reset" value="Reset" class="btn btn-default">Reset</button>
				              </div>
										<!--/Editor-->
									</div>
								</div>
							</div>

							</div>
						</div>
					</div>
					</form>


					<!-- Footer -->
				<?php include("include/footer.php");?>
					<!-- /Footer -->

				</div>
			</div>
			<!-- /Main Content -->

		</div>
		<!-- /#wrapper -->

		<!-- JavaScript -->

		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Data table JavaScript -->
		<script src="vendors/bower_components/moment/min/moment.min.js"></script>

		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
		<!-- Bootstrap-table JavaScript -->
	<script src="vendors/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<script src="dist/js/bootstrap-table-data.js"></script>

		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>

		<!-- Owl JavaScript -->
		<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

		<!-- Switchery JavaScript -->
		<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
		<!-- Bootstrap Datetimepicker JavaScript -->
	  <script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

	  <!-- Bootstrap Daterangepicker JavaScript -->
		<script src="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
			<script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
		<script>

				function deleteRow(row)
					{
					    var i=row.parentNode.parentNode.rowIndex;
					    document.getElementById('POITable').deleteRow(i);
					}



					$(document).on('change', '.mat_des_clss', function()
						{
							//alert("asd");
							var id = $(this).attr('id');
						//alert(id);
							var last = parseFloat(id.split("-").pop());
							
							var itemtypeid = $('#mat_des').val();
							var itemtypeid = $('#'+id).val();
						 var product = $('#mat_des-'+last).val();
						for(var i=0;i<last;i++){
							var chosed_product = $('#mat_des-'+i).val();
							if(chosed_product==product){
								swal("Alert!", "This item already selected", "warning");
								$('#mat_des-'+last).val('');
								return false;
							}
						}
						  //alert(itemtypeid);

							/*jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"price"},
								success:function(response)
								{
								$("#purchase_rate-"+last).val(response);
								}
							});*/
							/*jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"tax"},
								success:function(response)
								{
								$("#purchase_tax-"+last).val(response);
								}
							});*/
							jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"total_price"},
								success:function(response)
								{
								$("#purchase_amount-"+last).val(response);
								}
							});

							jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"hsn_code"},
								success:function(response)
								{
									//alert(response);
									$("#hsn_code-"+last).val(response);

								}
							});
					jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"quantity"},
								success:function(response)
								{
									
									$("#unit-"+last).val(response);
									if(response<=10){
										swal("Alert!", "Stock is running out", "warning");
										//$('#tax_invoice')[0].reset();
									}
								}
							});
					jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"price"},
								success:function(response)
								{
									$("#purchase_rate-"+last).val(response);
					     								}
							});
					jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"CGST"},
								success:function(response)
								{
									$("#cgst-"+last).val(response);
								}
							});
					jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"SGST"},
								success:function(response)
								{
									$("#sgst-"+last).val(response);
					    	}
							});
					jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"IGST"},
								success:function(response)
								{
									$("#igst-"+last).val(response);
					  		}
							});

						});

						// Add Row
						$(document).ready(function()
						{
						var z=0;
						$(document).on('click', '.add-row', function(){
							var id = $(this).attr('id');
							var last = parseFloat(id.split("-").pop());
							z++;
							$('#add_tr').replaceWith('');
							jQuery.ajax
							({
								type:"post",
								url:"retail_bill.php",
								dataType:"text", // Data type, HTML, json etc.
								data:{action:"itemreplace"},
								success:function(response)
								{//alert(JSON.stringify(response.item_unit));

								$('.add_tr').replaceWith('<tr class="table-align" id="row-'+z+'"><td><input name="serial_no[]" class="sl_no_clss required" style="text-align:center;width:40px;background-color: #212121;color:#fff;" id="sl_no-'+z+'" value="'+(z+1)+'"></td><td><select name="mat_des[]" class="mat_des_clss required" style="width:150px;background-color: #212121;color:#fff;" id="mat_des-'+z+'">'+response+'</select></td><td><input type="text" style="width:90px;background-color: #212121;color:#fff;" id="pl_serial_no-'+z+'" name="pl_serial_no[]" style="width:40px;" class="pl_serial_no_clss" /></td><td><input type="number" name="hsn_code[]" class="hsn_code_cls" id="hsn_code-'+z+'" style="width:80px;background-color: #212121;color:#fff;" readonly /></td><td><input type="number" name="unit[]" class="unit_cls" id="unit-'+z+'" style="text-align:center;width:40px;background-color: #212121;color:#fff;" readonly /></td><td><span style="color:#fff;">MRP:</span><br><input readonly type="number" style="width:60px;background-color: #212121;color:#fff;" name="total_cost[]" class="purchase_amount_cls"  id="purchase_amount-'+z+'"></td><td><input type="number" name="rate[]" class="rate_cls" id="rate-'+z+'" style="width:60px;background-color: #212121;color:#fff;"/></td><td><input type="number" name="quantity[]" class="quantity_cls" id="quantity-'+z+'" style="width:50px;background-color: #212121;color:#fff;" /></td><td><input type="number" name="item_value[]" class="item_value_cls" id="item_value-'+z+'" style="width:60px;background-color: #212121;color:#fff;" /></td><td><input type="number" name="discount[]" class="discount_cls" id="discount-'+z+'" style="width:60px;background-color: #212121;color:#fff;" /></td><td><input type="number" readonly name="amount[]" class="amount_cls" id="amount-'+z+'" style="width:60px;background-color: #212121;color:#fff;" /><input type="hidden" style="width:60px;background-color: #212121;color:#fff;" name="income[]" class="income_cls"  id="income-'+z+'" readonly><input type="hidden" style="width:60px;background-color: #212121;color:#fff;" name="stock[]" class="stock_cls"  id="stock-'+z+'" readonly></td><td><a  class="add-row mr-15" id="addrow-0" data-toggle="tooltip" data-original-title="Add Row"><i class="fa fa-pencil text-inverse m-r-10"></i></a><a onclick="deleteRow(this);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a></td></tr><tr class="add_tr"></tr>');
								return false;

								}
							});
						});
						});
						function totalAmount1(i,j)
						{
						var rate = parseFloat($("#rate-"+i).val());
						var total_price =eval(rate * j);
						//alert(total_price);
						$("#item_value-"+i).val(total_price);
						}
						$(document).on('keyup', '.quantity_cls', function()
						{
						var days = $(this).attr('id');
						var days_last = parseFloat(days.split("-").pop());
						var i = days_last;
						var z = days_last;
						var diffDays = parseFloat($("#quantity-"+i).val());
						totalAmount1(i,diffDays);
						var finalAmount = 0;
						for(var i=0;i<=z;i++) {
						finalAmount = parseInt(finalAmount) + parseInt($("#item_value-"+i).val());
						//alert(finalAmount);
						}
					});

									function totalAmount2(i,j){
										var rate = parseFloat($("#rate-"+i).val());
										var sgst = parseFloat($("#sgst-"+i).val());
										var igst = parseFloat($("#igst-"+i).val());
										var cgst = parseFloat($("#cgst-"+i).val());
										var discount = parseFloat($("#discount-"+i).val());
										var total_price = parseFloat($("#item_value-"+i).val());
										var dis_amount =eval((total_price * discount)/100);
										var amount1=total_price-dis_amount;
										/*if(igst!=0) 	var new_amount =eval(amount1 * (igst/100));
										if(sgst!=0 && cgst!=0) 	var new_amount =(eval(amount1 * (sgst/100)))+(eval(amount1 * (cgst/100)));
										var total_discount=eval(dis_amount-new_amount);
										var new_balance=eval(total_price-total_discount);*/
										$("#amount-"+i).val(amount1);
									}
			$(document).on('keyup', '.discount_cls', function(){
						var days = $(this).attr('id');
						var days_last = parseFloat(days.split("-").pop());
						var i = days_last ;
						var z = days_last ;
						var diffDays = parseFloat($("#discount-"+i).val());
						totalAmount2(i,diffDays);
						var finalAmount = 0;
						for(var i=0;i<=z;i++) {
						   finalAmount = parseFloat(finalAmount) + parseFloat($("#amount-"+i).val());

						}
						$('#pay_cost').val(Math.round(finalAmount));
					});

					$(document).on('keyup', '.rate_cls', function(){
								var days = $(this).attr('id');
								var days_last = parseFloat(days.split("-").pop());
								var i = days_last ;
								var z = days_last ;
								var diffDays = parseFloat($("#rate-"+i).val());
								totalAmount3(i,diffDays);
								var finalAmount = 0;
								for(var i=0;i<=z;i++) {
								   finalAmount = parseFloat(finalAmount) + parseFloat($("#amount-"+i).val());

								}
								$('#pay_cost').val(Math.round(finalAmount));
							});

							function totalAmount3(i,j){
								var rate = parseFloat($("#rate-"+i).val());
								var sgst = parseFloat($("#sgst-"+i).val());
								var igst = parseFloat($("#igst-"+i).val());
								var cgst = parseFloat($("#cgst-"+i).val());
								var discount = parseFloat($("#discount-"+i).val());
								var quantity = parseFloat($("#quantity-"+i).val());
								var total_price = eval(rate*quantity);
								var dis_amount =eval((total_price * discount)/100);
								var amount1=total_price-dis_amount;
								if(igst!=0) 	var new_amount =eval(amount1 * (igst/100));
								if(sgst!=0 && cgst!=0) 	var new_amount =(eval(amount1 * (sgst/100)))+(eval(amount1 * (cgst/100)));
								var total_discount=eval(dis_amount-new_amount);
								var new_balance=eval(total_price-total_discount);
								$("#item_value-"+i).val(total_price);
								$("#amount-"+i).val(new_balance);
							}

							// Check the unit is not less then quantity
							$(document).on('keyup', '.quantity_cls', function(){
										var days = $(this).attr('id');
										var days_last = parseFloat(days.split("-").pop());
										var i = days_last ;
										var z = days_last ;
										var quantity = parseFloat($("#quantity-"+i).val());
										var unit = parseFloat($("#unit-"+i).val());
										var stock_left = eval(unit - quantity);
										$("#stock-"+i).val(stock_left);
										 if(unit < quantity){
										 	swal("Alert!", "You don't have enough stock to sell", "error");
											 $("#quantity-"+i).val('');
										 	return false;
										 }
									});

							//Calculate Income
							$(document).on('keyup', '.discount_cls', function(){
										var days = $(this).attr('id');
										var days_last = parseFloat(days.split("-").pop());
										var i = days_last ;
										var z = days_last ;
										var rate = parseFloat($("#rate-"+i).val());
										var purchase_rate = parseFloat($("#purchase_rate-"+i).val());
										var discount = parseFloat($("#discount-"+i).val());
										var dis_amount =eval(rate -((rate * discount)/100));
										var income = eval(dis_amount - purchase_rate);
										$("#income-"+i).val(income);
									});




					var frm = $('#tax_invoice');
					frm.submit(function (e) {
							e.preventDefault();
							$.ajax({
									type: frm.attr('method'),
									url:  frm.attr('action'),
									data: frm.serialize(),
									success: function (data) {
										//alert(data);
										swal("Good job!", "Product is Successfully Purchased!! You can take a printout in Invoice Archieve", "success");
										$('#tax_invoice')[0].reset();
									},
									error: function (data) {
											alert('An error occurred.');
									},
							});
					});


</script>

	</body>


</html>
<?php } ?>
