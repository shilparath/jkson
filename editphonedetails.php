<?php include('config.php'); ?>
<?php ob_start() ?>
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
							
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<form method="post" id="register_product" action="" name="bill_master" id="billform">
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
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i></h6>
															<hr class="light-grey-hr"/>
															<div class="row">
															
															<?php
																$id = $_GET['name'];
																$sql1 = mysqli_query($con,"SELECT * FROM `mobiledetails` WHERE `id`='$id'");
																while($rowdata1 = mysqli_fetch_assoc($sql1)){
																?>
																<input type="hidden" name="id" value="<?php echo($id) ?>">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Company Name</label>
																		<select name="companyname" class="form-control" >
                                     										 <option value="" selected disabled>Select Company name</option>
                                     											<?php $sql = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE `status`='1'");
																				while($rowdata = mysqli_fetch_assoc($sql)){
																					?>
																					<option  <?php if($rowdata1['companyname']==$rowdata['id']){echo("selected");} ?> value="<?php echo($rowdata['id']) ?>"><?php echo($rowdata['name']) ?></option>
																					<?php
																				}
																			?>
																		</select>
																		<span class="help-block"> </span>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Product Name</label>
																		<select name="product_name" class="form-control" >
                                     										 <option value="" selected disabled>Select Product name</option>
                                     											<?php $sql = mysqli_query($con,"SELECT * FROM `product_name` ");
																				while($rowdata = mysqli_fetch_assoc($sql)){
																					?>
																					<!-- <option value="<?php echo($rowdata['id']) ?>"><?php echo($rowdata['name']) ?></option> -->
																					<option  <?php if($rowdata1['companyname']==$rowdata['id']){echo("selected");} ?> value="<?php echo($rowdata['id']) ?>"><?php echo($rowdata['name']) ?></option>
																					<?php
																				}
																			?>
																		</select>
																		<span class="help-block"> </span>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Model</label>
																		<input type="text"  name="modelname"  class="form-control"  placeholder="Order Number" value="<?php echo($rowdata1['modelname']) ?>">
																		<span class="help-block">  </span>
																	</div>
																</div>
																<!-- <div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Color</label>
																		<select name="color" class="form-control" >
                                     										 <option value="" selected disabled>Select Color</option>
                                     											<?php $sql = mysqli_query($con,"SELECT * FROM `bobilecolor` WHERE `status`='1'");
																				while($rowdata = mysqli_fetch_assoc($sql)){
																					?>
																					<option <?php if($rowdata1['color']==$rowdata['id']){echo("selected");} ?> value="<?php echo($rowdata['id']) ?>"><?php echo($rowdata['colorname']) ?></option>
																					<?php
																				}
																			?>
																		</select>
																		<span class="help-block"> </span>
																	</div>
																</div> -->
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">HSN code</label>
																		<input type="text"  name="hsncode"  class="form-control"  placeholder="Order Number"  value="<?php echo($rowdata1['hsncode']) ?>">
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Dealer Price</label>
																		<input type="text"  name="price"  class="form-control"  placeholder="Order Number"  value="<?php echo($rowdata1['price']) ?>">
																		<span class="help-block">  </span>
																	</div>
																</div>
																<!-- <div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Market Price</label>
																		<input type="text"  name="market_price"  class="form-control"  placeholder="Order Number"  value="<?php echo($rowdata1['market_price']) ?>">
																		<span class="help-block">  </span>
																	</div>
																</div> -->
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">GST</label>
																		<input type="text"  name="gst"  class="form-control"  placeholder="Order Number"  value="<?php echo($rowdata1['gst']) ?>">
																		<span class="help-block">  </span>
																	</div>
																</div>
															<?php } ?>
														</div>
														
															</div>
														</div>
														

												</div>
											</div>
										</div>
									</div>
								</div>


								
											
											<div class="form-actions mt-10">
				                <button type="submit" class="btn btn-success  mr-10" name="mobiledetails"> Save</button>
				                <button type="reset" value="Reset" class="btn btn-default">Reset</button>
				             

							</div>
						</div>
					</div>
					</form>
		
					
					<?php
						//print("<pre>");
						//print_r($_POST);
					if(isset($_POST['mobiledetails'])){
						$id = $_POST['id'];
						$companyname = $_POST['companyname'];
						$product_name = $_POST['product_name'];
						$modelname = $_POST['modelname'];
						// $color = $_POST['color'];

						$hsncode = $_POST['hsncode'];
						$price = $_POST['price'];
						// $market_price = $_POST['market_price'];
						$gst = $_POST['gst'];
						$sql = mysqli_query($con,"UPDATE `mobiledetails` SET `companyname`='$companyname',`product_name`='$product_name',`modelname`='$modelname',`color`='$color',`hsncode`='$hsncode',`price`='$price',`gst`='$gst' WHERE `id`='$id'") or die(mysqli_error());
						header("location:addphonedetails.php");
					}

						?>
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
  </form>
	</body>


</html>

