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
													<th>Invoice No</th>
													<th>Product Code</th>
													<th>Product Name</th>
													<th>HSN Number</th>
													<!-- <th>Price</th> -->
													<th>Quantity</th>
													<th>Return Amount</th>
													<th>Return Discription</th>
													<th>Returned Type</th>
													<th>Damaged Quantity</th>
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
                           $query="SELECT * FROM `stockdetails`  join product_return_detail on product_return_detail.product_id = stockdetails.id where 1 ORDER BY `product_return_detail`.`created_at` DESC ";
                          $sql = mysqli_query($con,$query);
				 		while($v1 = mysqli_fetch_assoc($sql)){
							
						
                           ?>
													<tr>

													 <td><?php echo $i; ?></td>
														<td><?php echo $v1['invoice_no']; ?></td>
														<td><?php echo $v1['mat_code'];?></td>
														<td><?php echo $v1['mat_des'];?></td>
														<td><?php echo $v1['hsn_code'];?></td>
														<td><?php echo $v1['quantity'];?></td>
														<td><?php echo $v1['return_amount'];?></td>
														<td><?php echo $v1['discription'];?></td>
														<td><?php echo $v1['return_type'];?></td>
														<td><?php echo $v1['damaged_quantity'];?>
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
