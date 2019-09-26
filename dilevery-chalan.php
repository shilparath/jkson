
<?php
include("config.php");
		if(!isset($_SESSION))
		{
			session_start();
		}
	if(!$_SESSION){
		header('location:index.php'); }
	$sessionname = $_SESSION['login_user'];
	if($sessionname){
	$date = date ("Y-m-d H:i:s");//, strtotime($date1));
	function fetchProduct(){
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT DISTINCT
		id,
		mat_des
		FROM insertProduct
		");
		$stmt->execute();
		$stmt->bind_result($id,$mat_des);
		while($stmt->fetch()){
			$row[] = array('id' =>$id ,'mat_des' => $mat_des );
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
	height: 40px;
}

.p_scents{
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
						  <h5 class="txt-dark">Tax Invoice</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li class="active"><span>Tax Invoice</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<form method="post" method="post" action="submit_delivery_list.php"  id="dilevery_chalan">
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
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Tax Form</h6>
															<hr class="light-grey-hr"/>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Our Challan No</label>
																		<input type="text" class="form-control" name="challan_no" placeholder="Enter Challan No">
																		<span class="help-block"> </span>
																	</div>
																</div>

																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="control-label mb-10 text-right">Challan Date</label>
																			<input type='date' name="challan_date" class="form-control"  placeholder="Enter Date & Time"/>
																	</div>
																</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label mb-10">Our Offer No</label>
																	<input type="text" class="form-control" name="offer_no" placeholder="Enter Offer No">
																	<span class="help-block"> </span>
																</div>
															</div>

															<div class="col-sm-6">
																<div class="form-group">
																	<label class="control-label mb-10 text-right">Purchase Date</label>
																		<input type='date' name="purchase_date" class="form-control"  placeholder="Enter Date & Time"/>
																</div>
															</div>
													</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group ">
																	<label class="control-label mb-10">Your Purchase Order No</label>
																	<input type="text"  id="so" name="order_no"   class="form-control"  placeholder="S.O. Number">
																	<span class="help-block">  </span>
																</div>
															</div>

																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">No of Package</label>
																		<input type="text"  id="so"name="no_of_pkg"   class="form-control"  placeholder="S.O. Number">
																		<span class="help-block">  </span>
																	</div>
																</div>

															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Dispached through</label>
																		<input type="text" name="dispached"  class="form-control" placeholder="Enter Invoice no">
																		<span class="help-block">  </span>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Net Weight(Approx)</label>
																		<input type="text" name="net_wt"  id="place_of_supply" class="form-control" placeholder="Enter Net Weight(Approx)">
																		<span class="help-block">  </span>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group ">
																	<label class="control-label mb-10">Remarks</label>
																	<input type="text" name="remarks"  class="form-control" placeholder="Enter Remarks">
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
												<tr class="table-align">
													<th>Sr No</th>
													<th><center>Material Description</center></th>
													<th><center>IMEI No</center></th>
													<th><center>Company Code</center></th>
													<th><center>HSN Code</center></th>
													<th><center>Unit</center></th>
													<th><center>Quantity</center></th>
													<th><center>Action</center></th>

												</tr>
												</thead>
												<tbody >
													<?php $i=0;?>
													<tr class="table-align">
													<td><input type='text' style='width:40px;background-color: #212121;color:#fff;' name="serial_no[]" id="serial_no-0" value="<?php echo $i=$i+1;?>"></td>
													<td><select type='text' id="mat_des-0" name="mat_des[]" style='width:240px;background-color: #212121;color:#fff;'  class="mat_des_clss">
														<option value="" >Select the Material</option>
														<?php
															$fetchProducts = fetchProduct();
															foreach ($fetchProducts as $v1) {?>
																<option value="<?php echo $v1['id']; ?>"><?php echo $v1['mat_des']; ?></option><?php } ?>
													</select></td>
													<td><input type='text' style='width:140px;background-color: #212121;color:#fff;' name="pl_serial_no[]" id="pl_serial_no-0"></td>
													<td><input type='text' style='width:180px;background-color: #212121;color:#fff;' name="material_code[]" id="material_code-0" ></td>
													<td><input type='text' style='width:90px;background-color: #212121;color:#fff;' name="hsn_code[]" id="hsn_code-0"></td>
													<td><input type='text' style='width:60px;background-color: #212121;color:#fff;'  name="unit[]" id="unit-0"></td>
													<td><input type='text' style='width:70px;background-color: #212121;color:#fff;'  name="quantity[]" id="quantity-0"></td>
													<td class="text-nowrap"><a  id="addmorePOI" class="mr-15 add-row" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil	 text-inverse m-r-10"></i> </a> <a onclick="deleteRow(this);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
												</tr>
												<tr class="add_tr"></tr>
												</tbody>
											</table>

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
		<script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
	  <!-- Bootstrap Daterangepicker JavaScript -->
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>


		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
		<script>
		$(document).ready(function()
		{
		$("#sidebar ul.menu li:nth-child(7) ul").attr("style","display:block");

		//$('input[type="submit"]').attr('disabled','disabled');
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
				url:"material_bill.php",
				dataType:"text", // Data type, HTML, json etc.
				data:{action:"itemreplace"},
				success:function(response)
				{//alert(JSON.stringify(response.item_unit));

				$('.add_tr').replaceWith('<tr class="p_scents" id="row-'+z+'"><td><input  name="sl_no[]" class="sl_no_clss required" style="width:40px;background-color: #212121;color:#fff;" id="sl_no-'+z+'" value="'+(z+1)+'"></td><td><select style="width:240px;background-color: #212121;color:#fff;" name="mat_des[]" class="mat_des_clss required" style="width:140px" id="mat_des-'+z+'">'+response+'</select></td><td><input style="width:140px;background-color: #212121;color:#fff;" type="text" name="pl_serial_no[]" id="pl_serial_no-'+z+'" class="pl_serial_no_clss" /></td><td><input type="text" style="width:180px;background-color: #212121;color:#fff;" name="material_code[]" class="material_code_clss" id="material_code-'+z+'"  /></td><td><input type="text" style="width:90px;background-color: #212121;color:#fff;" name="hsn_code[]" class="hsn_code_cls" id="hsn_code-'+z+'"  /></td><td><input  style="width:60px;background-color: #212121;color:#fff;" type="text" name="unit[]" class="unit_cls" id="unit-'+z+'"  /></td><td><input type="text" name="quantity[]" class="quantity_cls" id="quantity-'+z+'" style="width:70px;background-color: #212121;color:#fff;" /></td><td><a href="javascript:void(0)" class="mr-15 add-row" id="addrow-0"><i class="fa fa-pencil	 text-inverse m-r-10"></i></a><a href="#"><a onclick="deleteRow(this);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a></tr><tr class="add_tr"></tr>');
					return false;
				}
			});

		});
		});
		//remove rows
		$(document).on('click','.remove-row',function(){
			$(this).parent().parent().parent().remove();
			z--;
			$('input[type="submit"]').attr('disabled','disabled');
		});
				function deleteRow(row)
					{
					    var i=row.parentNode.parentNode.rowIndex;
					    document.getElementById('POITable').deleteRow(i);
					}

					$(document).on('change', '.mat_des_clss', function()
						{

							var id = $(this).attr('id');
							var last = parseFloat(id.split("-").pop());
							var itemtypeid = $('#mat_des').val();
									var itemtypeid = $('#'+id).val();

						    		// alert(itemtypeid);

							jQuery.ajax
							({
								type:"post",
								url:"material_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"material_code"},
								success:function(response)
								{
									$("#material_code-"+last).val(response);
								}
							});

							jQuery.ajax
							({
								type:"post",
								url:"material_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"hsn_code"},
								success:function(response)
								{
									$("#hsn_code-"+last).val(response);
								}
							});
									jQuery.ajax
							({
								type:"post",
								url:"material_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"Unit"},
								success:function(response)
								{
									$("#unit-"+last).val(response);
								}
							});
											jQuery.ajax
							({
								type:"post",
								url:"material_bill.php",
								dataType:"html", // Data type, HTML, json etc.
								data:{itemtypeid:itemtypeid,action:"material_code"},
								success:function(response)
								{
									$("#material_code-"+last).val(response);
					                $("#item_price-"+last).val('0');
									$("#initialprice-"+last).val('0');

								}
							});
						});

						var frm = $('#dilevery_chalan');
						frm.submit(function (e) {
								e.preventDefault();
								$.ajax({
										type: frm.attr('method'),
										url:  frm.attr('action'),
										data: frm.serialize(),
										success: function (data) {
												swal("Good job!", "Dilevary Challan is Successfully Added in the Portal!! You can take a printout in Invoice Archieve", "success");
													//$('#dilevery_chalan')[0].reset();
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
