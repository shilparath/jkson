
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

function fetchSupplier(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	id,
	name
	FROM pdc_Buyer
	");
	$stmt->execute();
	$stmt->bind_result($id,$name);
	while($stmt->fetch()){
		$row[] = array('id'=>$id,'name'=>$name);
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

	?>
<!DOCTYPE html>
<html lang="en">
<style>
.table-align{
	text-align: center;
	height: 40px;
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
						  <h5 class="txt-dark">suplier invoice form</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="index.html">Dashboard</a></li>
							<li><a href="#"><span>Component</span></a></li>
							<li class="active"><span>Add Product</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<form method="post" id="register_product" action="buyer_invoice_submit.php" name="bill_master" id="billform">
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
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Add Product</h6>
															<hr class="light-grey-hr"/>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Supplier Name</label>
																		<select name="customer_details" class="form-control" >
                                      <option value="" selected disabled>Select Supplier</option>
                                      <?php $fetchSupplierName = fetchSupplier();
			                        						 foreach ($fetchSupplierName as $v1) { ?>
                                      <option value="<?php echo $v1['id'];?>"><?php echo $v1['name'];?></option>
                                      <?php }?>
																		</select>
																		<span class="help-block"> </span>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Order Number</label>
																		<input type="text"  name="order_no"  class="form-control"  placeholder="Order Number">
																		<span class="help-block">  </span>
																	</div>
																</div>

														</div>
														<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="control-label mb-10 ">Date</label>
																			<input type='date' name="start_date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Purchase Order Number</label>
																		<input type="text"  id="so"name="so_no"   class="form-control"  placeholder="S.O. Number">
																		<span class="help-block">  </span>
																	</div>
																</div>

															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Invoice Number </label>
																		<input type="text" name="invoice_no" class="form-control" placeholder="Enter Invoice no">
																		<span class="help-block">  </span>
																	</div>
																</div>


																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Place of Supply</label>
																		<select type="text" name="place_of_supply" class="form-control">
																			<?php $states = fetchStates();
																						foreach ($states as $v1) { ?>
																		<<option value="<?php echo $v1['name']; ?>"<?php if($v1['name'] == "Odisha") echo "selected"; ?> ><?php echo $v1['name']; ?></option>
																		<?php } ?>
																		</select>
																		<span class="help-block">  </span>
																	</div>
																</div>
															</div>
														</div>
														<!--<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10"> Save</button>
															<button type="reset" value="Reset" class="btn btn-default">Reset</button>
														</div>-->

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
													<th>Company Name</th>
													<th>Model No</th>
													<th>HSN Code</th>
													<th>IMEI No</th>
													<th>Colour</th>
													<th>CGST%</th>
													<th>SGST%</th>
													<th>IGST%</th>
													
													<th>Quantity</th>
													<th>Rate/Each</th>
													<th>discount</th>
													<th>Amount</th>
													<th>Total Amount</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody >
													<tr class="table-align">
													<td><input type='text' style='text-align:center;width:40px;background-color: #212121;color:#fff;' name="sl_no[]" value="1" ></td>
													<td>
														<select style='width:90px;background-color: #212121;color:#fff;' name="mat_code[]" id="mat_code-0" class="mat_code_clss">
															<option value="">Select Company</option>
															<?php
																$sql1 = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE `status`='1'");
																	while($rowdata1 = mysqli_fetch_assoc($sql1)){
																		?>
																		<option value="<?php echo($rowdata1['name']) ?>"><?php echo($rowdata1['name']) ?></option>
																		<?php
																	}
															?>
														</select>
													<!--<input type='text' style='width:90px;background-color: #212121;color:#fff;' name="mat_code[]" >--></td>
													
													<td>
													<select style='width:90px;background-color: #212121;color:#fff;' name="mat_des[]" class="mat_des_clss" id="mat_des-0"></select>
													</td>
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;' name="hsn_code[]" class="hsn_code_cls" id="hsn_code-0" readonly></td>
													
													<td><input type="text" style="width:60px;background-color: #212121;color:#fff;" name="imeino[]" id="imei-0" class="imei_no"></td>
													
													<td><select style="width:60px;background-color: #212121;color:#fff;" name="color[]" id="color-0" class="color">
														<option value="">Select Color</option>
														<?php
															$sql = mysqli_query($con,"SELECT * FROM `bobilecolor` WHERE 1");
															while($rowdata = mysqli_fetch_assoc($sql)){
																?>
																<option value="<?php echo $rowdata['id'] ?>"><?php echo($rowdata['colorname']) ?></option>
																<?php
															}
														?>
													</select></td>

													<td><input type='number' style='width:40px;background-color: #212121;color:#fff;'  class="cgst_cls"  id="cgst-0"  name="cgst[]" readonly></td>
													<td><input type='number' style='width:40px;background-color: #212121;color:#fff;'  class="sgst_cls"  id="sgst-0" name="sgst[]" readonly></td>
													<td><input type='number' style='width:40px;background-color: #212121;color:#fff;'  class="igst_cls"  id="igst-0" name="igst[]" readonly></td>
													
													<td><input type='number' style='width:60px;background-color: #212121;color:#fff;' name="quantity[]" class="quantity_cls"  id="quantity-0" value= '1' readonly></td>
													<td><input type='number' style='width:60px;background-color: #212121;color:#fff;'  class="rate_cls"  id="rate-0" name='rate[]'></td>
													<td><input type='number' style='width:50px;background-color: #212121;color:#fff;'   class="discount_cls"  id="discount-0" name='discount[]'></td>
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;'  class="amount_cls"  id="amount-0" name='amount[]' readonly></td>
													<td><input type='text' style='width:80px;background-color: #212121;color:#fff;'  class="tax_cls"  name="tax_cost[]" id="tax_cost-0" readonly></td>
													<td class="text-nowrap"><a id="addrow-0" class="add-row mr-15" data-toggle="tooltip" data-original-title="Add Product"> <i class="fa fa-pencil	 text-inverse m-r-10"></i> </a> <a onClick="deleteRow(this);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
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
													<input type="text" style="background-color:#212121" name="pay_cost" id="tot_cost" class="form-control" placeholder="Total Amount" readonly>
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

					<!-- /Row -->



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
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		<script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>


		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
		<script>
	$(document).ready(function(){
		$(".imei_no").keypress(function(event){
              console.log('Key pressed!!');
              if (event.which == '10' || event.which == '13') {
                  event.preventDefault();
              }
          });
	})
	</script>
		<script>

			$(document).on('change', '.mat_code_clss', function(){
				var days = $(this).attr('id');
				var days_last = parseFloat(days.split("-").pop());
				var companyid = $('#mat_code-'+days_last).val();
				//alert(companyid);
				$.ajax({
					type:"post",
					url:"getdata.php",
					data:{companyid:companyid,name:"getcompanyid"},
					success:function(data){
						$('#mat_des-'+days_last).html(data);
					}
				});
				
			});
			
			$(document).on('change', '.mat_des_clss', function(){
				var days = $(this).attr('id');
				var days_last = parseFloat(days.split("-").pop());
				var companyid = $('#mat_code-'+days_last).val();
				var model = $('#mat_des-'+days_last).val();
				$.ajax({
					type:"post",
					url:"getdata.php",
					data:{companyid:companyid,name:"getalldata",model:model},
					success:function(data){
						//alert(data);
						var a = jQuery.parseJSON(data);
						$('#hsn_code-'+days_last).val(a.hsncode);
						$('#rate-'+days_last).val(a.price);
						$('#cgst-'+days_last).val(a.gst/2);
						$('#sgst-'+days_last).val(a.gst/2);
						$('#igst-'+days_last).val(0);
					}
				});
				
			});
			
				function deleteRow(row)
					{
					    var i=row.parentNode.parentNode.rowIndex;
					    document.getElementById('POITable').deleteRow(i);
					}

					$(document).ready(function(){
					var z=0;
					$(document).on('click', '.add-row', function(){
						var id = $(this).attr('id');
						var last = parseFloat(id.split("-").pop());
						z++;
						var name = "get_color_name";
						$.ajax({
							type:"post",
							url:"get_color_data.php",
							data:{name:name},
							success:function(data){
								//alert(data);
								$('#color-'+z).html(data);
							}
						});
						$.ajax({
							type:"post",
							url:"get_company_data.php",
							data:{name1:"getcompanyname"},
							success:function(data){
								//alert(data);
								$('#mat_code-'+z).html(data);
							 }
						});
						
						$('#add_tr').replaceWith('');

							$('.add_tr').replaceWith('<tr class="table-align" id="row-'+z+'"><td><input type="text" name="sl_no[]" class="sl_no_cls" id="sl_no-'+z+'" style="text-align:center;width:40px;background-color: #212121;color:#fff;" value="'+(z+1)+'"/></td><td><select name="mat_code[]" class="mat_code_clss" id="mat_code-'+z+'" style="width:90px;background-color: #212121;color:#fff;"><option value="">Select Company</option></select></td><td><select style="width:90px;background-color: #212121;color:#fff;" name="mat_des[]" class="mat_des_clss" id="mat_des-'+z+'"></select></td><td><input type="text" name="hsn_code[]" class="hsn_code_cls" id="hsn_code-'+z+'" style="width:60px;background-color: #212121;color:#fff;" readonly/></td><td><input type="text" style="width:60px;background-color: #212121;color:#fff;" name="imeino[]" id="imei-'+z+'" class="imei_no"></td><td><select style="width:60px;background-color: #212121;color:#fff;" name="color[]" id="color-'+z+'" class="color"></select></td><td><input type="number" name="cgst[]"  class="cgst_cls" id="cgst-'+z+'" style="width:40px;background-color: #212121;color:#fff;" readonly /></td><td><input type="number" name="sgst[]" class="sgst_cls" id="sgst-'+z+'" style="width:40px;background-color: #212121;color:#fff;" readonly /></td><td><input type="number" name="igst[]" class="igst_cls" id="igst-'+z+'" style="width:40px;background-color: #212121;color:#fff;" readonly /></td><td><input type="number" name="quantity[]" class="quantity_cls" id="quantity-'+z+'" style="width:60px;background-color: #212121;color:#fff;" value="1" readonly/></td><td><input type="number" name="rate[]" class="rate_cls" id="rate-'+z+'" style="width:60px;background-color: #212121;color:#fff;"/></td><td><input type="number" name="discount[]" class="discount_cls" id="discount-'+z+'" style="width:50px;background-color: #212121;color:#fff;" /></td><td><input type="text" name="amount[]" class="amount_cls" id="amount-'+z+'" style="width:60px;background-color: #212121;color:#fff;" readonly /></td><td><input type="text" name="tax_cost[]" class="tax_cls" id="tax_cost-'+z+'" style="width:80px;background-color: #212121;color:#fff;" /></td><td><a href="javascript:void(0)" class="mr-15 add-row" id="addrow-0"><i class="fa fa-pencil	 text-inverse m-r-10"></i></a><a onclick="deleteRow(this);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a></td></tr><tr class="add_tr"></tr>');
						
						$(".imei_no").keypress(function(event){
              console.log('Key pressed!!');
              if (event.which == '10' || event.which == '13') {
                  event.preventDefault();
              }
          });
								return false;
													
					});
					});
							
					function totalAmount1(i,j)
					{
						var rate = parseFloat($("#quantity-"+i).val());
						var total_price =eval(rate * j);
						//alert(rate);
						$("#amount-"+i).val(total_price);
					}

					$(document).on('keyup', '.rate_cls', function()
					{
					var days = $(this).attr('id');
					var days_last = parseFloat(days.split("-").pop());
					var i = days_last ;
					var z = days_last ;
					//alert(days);
					//alert(z);
					var diffDays = parseFloat($("#rate-"+i).val());
					//alert(diffDays);
					totalAmount1(i,diffDays);
					var finalAmount = 0;
					for(var i=0;i<=z;i++) {
					finalAmount = parseInt(finalAmount) + parseInt($("#amount-"+i).val());
					//alert(finalAmount);
					}
					//$('#pay_cost').val(finalAmount);
					//$('#notes_fees').html('<h3>Total Amount : '+finalAmount+'</h3>');

				});

				function totalAmount2(i,j)
				{
					 				var rate = parseFloat($("#rate-"+i).val());
									var sgst = parseFloat($("#sgst-"+i).val());
									var igst = parseFloat($("#igst-"+i).val());
									var cgst = parseFloat($("#cgst-"+i).val());
									var discount = parseFloat($("#discount-"+i).val());
									var rate = parseFloat($("#rate-"+i).val());
									var quantity = parseFloat($("#quantity-"+i).val());
									var total_price =eval(rate * quantity);
									var dis_amount =eval((total_price * discount)/100);
									var amount1=total_price-dis_amount;
									//alert(amount1);
									if(sgst!=0 && cgst!=0) 	var new_amount =(eval(amount1 * (sgst/100)))+(eval(amount1 * (cgst/100)));
									//if() 	var new_amount =eval(amount1 * (cgst/100));
									if(igst!=0) 	var new_amount =eval(amount1 * (igst/100));
									var total_discount=eval(dis_amount-new_amount);
									var new_balance=eval(total_price-total_discount);
									//alert(new_balance);
									$('#tax_cost-'+i).val(new_balance);
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
					   		finalAmount = parseInt(finalAmount) + parseInt($("#tax_cost-"+i).val());
							}
								$('#tot_cost').val(finalAmount);
				});

				// Manage Tax Feild
				$(document).on('keyup', '.cgst_cls', function(){
								var days = $(this).attr('id');
								var days_last = parseFloat(days.split("-").pop());
								var i = days_last ;
								var z = days_last ;
								var diffDays = parseFloat($("#cgst-"+i).val());
								$('#sgst-'+i).val(diffDays);
								$('#igst-'+i).val(0);
			});
			$(document).on('keyup', '.igst_cls', function(){
							var days = $(this).attr('id');
							var days_last = parseFloat(days.split("-").pop());
							var i = days_last ;
							var z = days_last ;
							var igst = parseFloat($("#igst-"+i).val());
							if(igst>0){
								$('#sgst-'+i).val("0");
								$('#cgst-'+i).val("0");
							}
		});


				
					//alert("asgfra");
					var frm = $('#register_product');
				frm.submit(function (e) {
						e.preventDefault();
						$.ajax({
								type: frm.attr('method'),
								url:  frm.attr('action'),
								data: frm.serialize(),
								success: function (data) {
									//alert(data);
										swal("Good job!", "Product is Successfully Added in the Portal!! You can take a printout in Invoice Archieve", "success");
										$('#register_product')[0].reset();
								},
								error: function (data) {
										alert('An error occurred.');
								},
						});
				});
				


</script>
  </form>
	</body>


</html>
<?php } ?>
