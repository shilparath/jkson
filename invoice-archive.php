<?php
include("config.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
if(!$_SESSION){
	header('location:index.php'); }
$sessionname = $_SESSION['login_user'];
function fetchProduct(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT DISTINCT
  insertProduct.id,
  mat_code,
  mat_des,
  order_no,
  invoice_no,
  customer_details,
  pdc_Buyer.name,
  amount,
  tax_cost,
  rdate,
  ROUND(pay_cost,2),
  bill,
  quantity
  FROM insertProduct
  INNER JOIN pdc_Buyer on insertProduct.customer_details = pdc_Buyer.id
  group by bill
  ");
  $stmt->execute();
  $stmt->bind_result($id,$mat_code,$mat_des,$order_no,$invoice_no,$customer_details,$buyername,$amount,$tax_cost,$rdate,$pay_cost,$bill,$quantity);
  while($stmt->fetch()){
    $row[] = array('id'=>$id,'order_no' =>$order_no ,'invoice_no'=>$invoice_no,'customer_details'=>$customer_details,'buyername'=>$buyername,'mat_code'=>$mat_code,'mat_des'=>$mat_des,'amount'=>$amount,'tax_cost'=>$tax_cost,'rdate'=>$rdate,'pay_cost'=>$pay_cost,'bill'=>$bill,'quantity'=>$quantity );
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
						<h5 class="txt-dark">Supplier Invoice Archive</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li class="active"><span>Invoice archive</span></li>
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
								                        <th>#</th>
								                        <th>Supplier Name</th>
														<!--<th>Model No</th>-->
														<th>Invoice No</th>
								                        <th>FROM</th>
								                        <th>Total Price</th>
														<th>Purchased on</th>
														<th>View</th>
													</tr>
												</thead>

												<tbody>
                          <?php
				 //print("<pre>");
                            $i = 1;
                            $product = fetchProduct();
                            foreach ($product as $v1) {  ?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $v1['buyername']; ?></td>
                            							<!--<td><?php echo $v1['mat_des']; ?></td>-->
														<td><?php echo $v1['invoice_no']; ?></td>
							                            <td><?php echo $v1['buyername']; ?></td>
							                            <td><?php echo $v1['pay_cost']; ?></td>
							                            <td><?php echo $v1['rdate']; ?></td>
														<td>
															<a href="invoice.php?printid=<?php echo $v1['bill']; ?>" target="_blank">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>
														</td>
													</tr>
													<?php $i++;} ?>
												</tbody>
												<tfoot>
													  <tr>
														
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td class="text-nowrap"></td>
													</tr>
													</tfoot>
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
