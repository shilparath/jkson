
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
					<form method="post" id="register_product" action="accessories_submit.php" name="bill_master" id="billform">
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
										<div class="table-wrap">
											<table id="POITable"  data-toggle="table"  >
												<thead>
												<tr>
													<th>ID</th>
													<th>Company Name</th>
													<th>Model No</th>
													<th>HSN Code</th>
													
													
													
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
													<td><input type='text' style='width:90px;background-color: #212121;color:#fff;' name="mat_code[]" ></td>
													<td><input type='text' style='width:90px;background-color: #212121;color:#fff;' name="mat_des[]" ></td>
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;' name="hsn_code[]"  ></td>
													
													
													
													<td><input type='number' style='width:60px;background-color: #212121;color:#fff;' name="quantity[]" class="quantity_cls"  id="quantity-0"></td>
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
						$('#add_tr').replaceWith('');

							$('.add_tr').replaceWith('<tr class="table-align" id="row-'+z+'"><td><input type="text" name="sl_no[]" class="sl_no_cls" id="sl_no-'+z+'" style="text-align:center;width:40px;background-color: #212121;color:#fff;" value="'+(z+1)+'"/></td><td><input type="text" name="mat_code[]" class="mat_code_clss" id="mat_code-'+z+'" style="width:90px;background-color: #212121;color:#fff;"/></td><td><input type="text" name="mat_des[]" class="mat_des_clss" id="mat_des-'+z+'" style="width:90px;background-color: #212121;color:#fff;"/></td><td><input type="text" name="hsn_code[]" class="hsn_code_cls" id="hsn_code-'+z+'" style="width:60px;background-color: #212121;color:#fff;"/></td><td><input type="number" name="quantity[]" class="quantity_cls" id="quantity-'+z+'" style="width:60px;background-color: #212121;color:#fff;" /></td><td><input type="number" name="rate[]" class="rate_cls" id="rate-'+z+'" style="width:60px;background-color: #212121;color:#fff;"/></td><td><input type="number" name="discount[]" class="discount_cls" id="discount-'+z+'" style="width:50px;background-color: #212121;color:#fff;" /></td><td><input type="text" name="amount[]" class="amount_cls" id="amount-'+z+'" style="width:60px;background-color: #212121;color:#fff;" /></td><td><input type="text" name="tax_cost[]" class="tax_cls" id="tax_cost-'+z+'" style="width:80px;background-color: #212121;color:#fff;" /></td><td><a href="javascript:void(0)" class="mr-15 add-row" id="addrow-0"><i class="fa fa-pencil	 text-inverse m-r-10"></i></a><a onclick="deleteRow(this);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a></td></tr><tr class="add_tr"></tr>');
								return false;
					});
					});
					function totalAmount1(i,j)
					{
						var rate = parseFloat($("#quantity-"+i).val());
						var total_price =eval(rate * j);
						//alert(rate);
						if($("#quantity-"+i).val()!="" && $("#rate-"+i).val()!=""){
							$("#amount-"+i).val(total_price);
						}
						
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
									/*var sgst = parseFloat($("#sgst-"+i).val());
									var igst = parseFloat($("#igst-"+i).val());
									var cgst = parseFloat($("#cgst-"+i).val());*/
									var discount = parseFloat($("#discount-"+i).val());
									var rate = parseFloat($("#rate-"+i).val());
									var quantity = parseFloat($("#quantity-"+i).val());
									var total_price =eval(rate * quantity);
									var dis_amount =eval((total_price * discount)/100);
									var amount1=total_price-dis_amount;
									if($("#discount-"+i).val()!=""){
										$('#tax_cost-'+i).val(amount1);
									}
									//alert(amount1);
									//if(sgst!=0 && cgst!=0) 	var new_amount =(eval(amount1 * (sgst/100)))+(eval(amount1 * (cgst/100)));
									//if() 	var new_amount =eval(amount1 * (cgst/100));
									//if(igst!=0) 	var new_amount =eval(amount1 * (igst/100));
									//var total_discount=eval(dis_amount-new_amount);
									//var new_balance=eval(total_price-total_discount);
									//alert(new_balance);
									//$('#tax_cost-'+i).val(new_balance);
									//$("#amount-"+i).val(amount1);
					//alert(amount1);
									//$("#tax_cost-"+i).val(amount1);
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
					   		finalAmount = parseFloat(finalAmount) + parseFloat($("#tax_cost-"+i).val());
											
							}
						if($("#discount-"+z).val()!=""){
							//alert(finalAmount);
							$('#tot_cost').val(Math.round(finalAmount));
						}
						
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
