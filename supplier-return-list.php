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
?>
<!DOCTYPE html>
<html lang="en">

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
		<!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Tax Invoice Archieve </h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li class="active"><span>Tax Invoice archive</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Invoice List</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table  display table-hover mb-30">
												<thead>
													<tr>
														<th>sl no</th>
														<th>Supplier Name</th>
														<th>Product Name</th>
														<th>IMEI/SL No</th>
														<!-- <th>Company Name</th> -->
														<!-- <th>Price</th> -->
														<th>Model Number</th>
														<th>Return Type</th>
														<th>Discription</th>
														<th>Total Quantity </th>
														<th>Remaining Quantity</th>
														<th> Amount </th>
														<th> Amount before Return </th>
														<th>Returned Date </th>
													</tr>
												</thead>

												<tbody>
                          <?php
                          
                          $i = 1;
                         // $query1="SELECT * FROM `stockdetails`  hfjoin product_return_detail on product_return_detail.product_id = stockdetails.id";
                         // mysqli_query($con,$query1);
                        //  echo $query;
                          //working Code
                       //   echo "SELECT * FROM `stockdetails` join product_return_detail on product_return_detail.product_id = stockdetails.id where 1 GROUP BY id ORDER BY `product_return_detail`.`created_at` DESC"
                           $query="SELECT (select name from pdc_Buyer where id=purchase_return.supplier_name) as supplier_name,(select name from  	product_name where id=purchase_return.product_name ) as product_name,imei,model_number,returntype,discription,org_quantity,org_amount,insertproduct.quantity,insertproduct.amount,purchase_return.created_at FROM purchase_return  join insertproduct on purchase_return.insert_product_id = insertproduct.id where 1 ORDER BY purchase_return.created_at DESC ";
                         //  echo $query;
                          $sql = mysqli_query($con,$query);
				 		while($v1 = mysqli_fetch_assoc($sql)){
							
						
                           ?>
													<tr>

													 <td><?php echo $i; ?></td>
														<td><?php echo $v1['supplier_name']; ?></td>
														<td><?php echo $v1['product_name'];?></td>
														<td><?php echo $v1['imei'];?></td>
														<td><?php echo $v1['model_number'];?></td>
														<td><?php echo $v1['returntype'];?></td>
														<td><?php echo $v1['discription'];?></td>
														<td><?php echo $v1['org_quantity'];?></td>
														<td><?php echo $v1['quantity'];?>
														
														
														<td><?php echo $v1['amount'];?>
														<td><?php echo $v1['org_amount'];?>
														<td><?php echo $v1['created_at'];?>
														</td>
														
													</tr>
													  <?php $i++; } ?>
												</tbody>
												<!-- <tfoot>
												  <tr>
												       <td></td>
													   <td></td>
													   <td></td>
													   <td></td>
													   <td></td>
													   <td></td>
													   <td></td>
													   <td></td>
												  </tr>
												</tfoot> -->
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

			</div>

			<!-- Footer -->
			<?php include("include/footer.php"); ?>
			<!-- /Footer -->

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
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/dataTables-data.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>


</body>


</html>
<?php } ?>
