<?php include('config.php'); ?>
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
						  <h5 class="txt-dark">master form</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="index.html">Dashboard</a></li>
							<li><a href="#"><span>Component</span></a></li>
							<li class="active"><span>Add Product name</span></li>
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
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Add product Name</h6>
															<hr class="light-grey-hr"/>

															
															<div class="col-md-12">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Company Name</label>
																		<select name="companyname" class="form-control" >
                                     										 <option value="" selected disabled>Select Company name</option>
                                     											<?php $sql = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE `status`='1'");
																				while($rowdata = mysqli_fetch_assoc($sql)){
																					?>
																					<option value="<?php echo($rowdata['id']) ?>"><?php echo($rowdata['name']) ?></option>
																					<?php
																				}
																			?>
																		</select>
																		<span class="help-block"> </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Product Name</label>
																		<input type="text"  name="mobilecompany"  class="form-control"  placeholder="Product Name">
																		<span class="help-block">  </span>
																	</div>
																</div>
															</div>
																<div class="form-actions mt-10">
																	<button type="submit" class="btn btn-success  mr-10" name="save_color"> Save</button>
																	<button type="reset" value="Reset" class="btn btn-default">Reset</button>
																</div>

															
														</div>
												</div>
											</div>
										</div>
										<?php
										if(isset($_POST['save_color'])){
											$product_name = $_POST['mobilecompany'];
											//$color = $_POST['mobilecolor'];
											$companyname = $_POST['companyname'];
											$sql = mysqli_query($con,"INSERT INTO `product_name`(`company_id`,`name`) VALUES ('$companyname','$product_name')");
											header("location:addproductname.php");
											
										}
										
										?>
									</div>
								</div>
								
								
								<div class="panel-wrapper collapse in" style="margin-top: 20px">
									<div class="panel-body">
										<div style="color: white; margin-bottom: 20px"><span>List of All Company</span></div>
										<div>
											<table width="50%">
												<tr style="color:blue;">
													<th>Company Name</th>
													<th>Product Name</th>
													<th>Action</th>
												</tr>
										<?php
										$sql = mysqli_query($con,"SELECT * FROM `product_name` WHERE 1");
										while($rowdata = mysqli_fetch_assoc($sql)){
											?>
											
												<tr>
													<?php
													$companyid = $rowdata['company_id'];
													$sql12 = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE id = '$companyid'");
										$rowdata12 = mysqli_fetch_assoc($sql12);
											?>
													<td width="50%" style="height: 30px"><?php echo($rowdata12['name']) ?></td>
													<td width="50%" style="height: 30px"><?php echo($rowdata['name']) ?></td>
													<!-- <td width="25%" style="height: 30px"><a href="editproduct_name.php?id=<?php echo($rowdata['id']) ?>"><i class="fa fa-edit"></i></a></td> -->
													<td width="25%" style="height: 30px"><a href="deleteproductname.php?id=<?php echo($rowdata['id']) ?>" style="color: red"><i class="fa fa-remove"></i></a></td>
												</tr>
											
											<?php
											
										}
										?>
										</table>
												
												
												
											</div>
										
										
										
										
									
									</div>
								</div>
								
								
							</div>
						</div>
					</div>
					</form>
				<?php include("include/footer.php");?>
				</div>
			</div>
		</div>
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/moment/min/moment.min.js"></script>
		<script src="dist/js/jquery.slimscroll.js"></script>
		<script src="vendors/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
		<script src="dist/js/bootstrap-table-data.js"></script>
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>
		<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
		<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	  <script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		<script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		<script src="dist/js/init.js"></script>
  </form>
	</body>
</html>