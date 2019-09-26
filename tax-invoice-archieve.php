<?php
include("config.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
if(!$_SESSION){
	header('location:index.php'); }
$sessionname = $_SESSION['login_user'];



function fetchSellItems(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
    challan_no,
    offer_no,
    dispatched,
    date,
    invoice_date,
    remarks,
    insertProduct.mat_des as product,
    unit,
    sellItems.bill,
    SUM(sellItems.quantity),
    pl_serial_no,
    sellItems.invoice_no
    FROM sellItems
    INNER JOIN insertProduct ON sellItems.mat_des = insertProduct.id
    GROUP BY bill
    ");
    $stmt->execute();
    $stmt->bind_result($challan_no,$offer_no,$dispatched,$date,$invoice_date,$remarks,$mat_des,$unit,$bill,$quantity,$pl_serial_no,$invoice_no);
    while($stmt->fetch()){
      $row[] = array('challan_no'=>$challan_no,'offer_no'=>$offer_no,'dispatched'=>$dispatched,'date'=>$date,'invoice_date'=>$invoice_date,'remarks'=>$remarks,'product'=>$mat_des,'unit'=>$unit,'quantity'=>$quantity,'bill'=>$bill,'pl_serial_no'=>$pl_serial_no,'invoice_no'=>$invoice_no);
    }
    $stmt->close();
  	if(!empty($row)){
  	return ($row); }
  	else
  	{ return ""; }
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
													<th>Invoice Date</th>
													<th>Company</th>
													<th>Model No</th>
													<!-- <th>Price</th> -->
													<th>Invoice Amount</th>
													<th>Quantity</th>
													
													<th>View</th>
													</tr>
												</thead>

												<tbody>
                          <?php
                          
                          $i = 1;
                          $sql = mysqli_query($con,"SELECT * FROM `sellitems` WHERE 1 GROUP BY `bill`");
				 		while($v1 = mysqli_fetch_assoc($sql)){
							
						
                           ?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $v1['invoice_no']; ?></td>
														<td><?php echo $v1['invoice_date'];?></td>
														<td><?php echo $v1['company'];?></td>
														<td><?php $matdec =  $v1['mat_des']; $sql1 = mysqli_query($con,"SELECT `mat_des` FROM `insertproduct` WHERE `id`='$matdec'"); while($rowdata1 = mysqli_fetch_assoc($sql1)){echo($rowdata1['mat_des']);}?></td>
														<!-- <td><?php //echo $v1['payamount'];?></td> -->
														<td><?php echo $v1['pay_cost'];?></td>
														
														<td><?php echo $v1['quantity'];?></td>
														<td>
															<a href="customer-invoice1.php?printid=<?php echo $v1['bill']; ?>" target="_blank">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>
														</td>
													</tr>
													  <?php $i++; } ?>
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
													   <td></td>
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
