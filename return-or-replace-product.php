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
							<li class="active"><span>Return Product</span></li>
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
																		<label class="control-label mb-10">Product Name</label>
																		<select name="productname" class="form-control" >
                                     										 <option value="" selected disabled>Select Product Name</option>
                                     											<?php $sql = mysqli_query($con,"SELECT * FROM `stockdetails`");
																				while($rowdata = mysqli_fetch_assoc($sql)){
																					?>
																					<option value="<?php echo($rowdata['id']) ?>"><?php echo($rowdata['mat_des']) ?></option>
																					<?php
																				}
																			?>
																		</select>
																		<span class="help-block"> </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group ">
																		<label class="control-label mb-10">Product Amount</label>
																		<input type="text"  name="amount"  class="form-control"  placeholder="Product Amount">
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Return Type</label>
																		<select name="returntype" class="form-control" >
                                     										 <option value="" selected disabled>Select Return Type</option>
																			  <option value="replace" >Replace</option>
																			  <option value="damaged" >Damaged</option>	
																		</select>
																		<span class="help-block"> </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Discription</label>
																		<textarea name="discription"  class="form-control"  placeholder="Return Discription"></textarea>
																		<span class="help-block">  </span>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Job Order</label>
																		<input type="text" class="form-control" name="jobOrder" placeholder="Job Order" />
																		
																		<span class="help-block">  </span>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Expected Compillation Date</label>
																		<input type="date" name="ecd" class="form-control"  placeholder="Expected Date To Solve the problem" >				
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
											$productname = $_POST['productname'];
											//$color = $_POST['mobilecolor'];
											$amount = $_POST['amount'];
											$returntype = $_POST['returntype'];
											$discription= $_POST['discription'];
											$jobnumber = "'".$_POST['jobOrder']."'";
											$expactedDate = "'".$_POST['ecd']."'";
											//GLOBAL $quantity;
											$sql = mysqli_query($con,"SELECT * FROM `stockdetails` WHERE `id`=$productname ");
												 while($rowdata = mysqli_fetch_assoc($sql)){
													
													
											if($returntype=="replace"){
												
                                                      	$quantity = $rowdata['quantity'];
                                                      //	$refundedAmount=$rowdata['refunded-amount'];
												
		                                            //  $quantity2 = $quantity+$amount;
												   // $sql2 = mysqli_query($con,"UPDATE `stockdetails` SET 'discription'=$discription,'refunded-amount'=$refundedAmount,'return-type'=$returntype WHERE `id`=$productname");
														$productId=	$rowdata['id'];
														$productnameDis = "'".$rowdata['mat_des']."'";
														$amount = $_POST['amount'];
														$returntype = "'".$returntype."'";
														$discription= "'".$discription."'";
														$totalQuantity = $rowdata['quantity'];
														// $jobnumber = "'' ".$_POST['jobOrder']."'";

                                                      	$InsertIntoProductReturnQuery="insert into product_return_detail (product_id,product_name,discription,return_type,return_amount,total_quantity,job_number,expected_date) values($productId,$productnameDis,$discription,$returntype,$amount,$totalQuantity,$jobnumber,$expactedDate)";
                                                      	$InsertIntoProductReturn=mysqli_query($con,$InsertIntoProductReturnQuery);
                                                     // echo	$InsertIntoProductReturnQuery;
												   // echo "dfghdf<br/>";
                                                  
											}else{
										
										
											$damageQuantity = $rowdata['damage_quantity'];
										//	echo $damageQuantity."<br/>";
                                             $damaged2 = $damageQuantity+1;
                                          //   echo $damaged2."<br/>";
                                             $totalQuantity = $rowdata['quantity'];
                                             $totalQuantity1=$totalQuantity-1;
										 	$sql3 = mysqli_query($con,"UPDATE `stockdetails` SET damage_quantity=$damaged2,quantity=$totalQuantity1 WHERE `id`=$productname");

										 				$productId=	$rowdata['id'];
										 				$productnameDis=	"'".$rowdata['mat_des']."'";
														//$productname = "'".$productname."'";
														$amount = $_POST['amount'];
														$returntype = "'".$returntype."'";
														$discription= "'".$discription."'";
														

                                                      	// $InsertIntoProductReturnQuery="insert into product_return_detail (product_id,product_name,discription,return_type,return_amount,total_quantity,job_number,expected_date) values($productId,$productname,$discription,$returntype,$amount,$totalQuantity,$expactedDate)";
                                                     	$InsertIntoProductReturnQuery="insert into product_return_detail (product_id,product_name,discription,return_type,return_amount,total_quantity,damaged_quantity,job_number,expected_date) values($productId,$productnameDis,$discription,$returntype,$amount,$totalQuantity,$damaged2,$jobnumber,$expactedDate)";
                                                      	$InsertIntoProductReturn=mysqli_query($con,$InsertIntoProductReturnQuery);
                                                     // 	echo 	$InsertIntoProductReturnQuery;
                                                      //	echo "UPDATE `stockdetails` SET damage_quantity=$damaged2 WHERE `id`=$productname";	
										
											}
										//	echo $InsertIntoProductReturnQuery;
											// echo "UPDATE `stockdetails` SET `damage-quantity`=$damaged2,'discription'=$discription,'return-type'=$returntype WHERE `id`=$productname";
											//exit();
											// header("location:return-product.php");
											
										}
									}
										?>
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