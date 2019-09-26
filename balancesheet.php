<?php
	include('config.php');
		?>
<?php






$today_date =  date('d-m-Y');
$date  = date('Y-m-d');
$sql = mysqli_query($con,"SELECT * FROM `expense` WHERE `date`='$date'");
$amount = 0;
while($rowdata = mysqli_fetch_assoc($sql)){
	$amount1 = $rowdata['amount'];
	$amount = $amount+$amount1;
}
$sql2 = mysqli_query($con,"SELECT * FROM `expense` WHERE 1");



?>
<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php"); ?>
<style>
.table_align{
	text-align: center;
	height: 100%;
}
</style>

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
						<h5 class="txt-dark"> Balance Sheet</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="javascript:void()">Invantory Management System</a></li>
							<li class="active"><span>Expenses Report</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->


        <div class="row">
          <div class="col-sm-12">
          <!--search and date filter-->
         
							
							
							
						</div>
          </div>
<!--<div class="row">
          <div class="col-sm-12">
          <!--search and date filter-->
         
							
							
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title inline-block txt-dark">Total Expenses Today : <i class="fa fa-inr"></i>&nbsp;<?php echo($amount) ?>
										</h6><span></span>
									</div>
									<div class="pull-right">
										<span class="label label-info capitalize-font inline-block ml-10">Income</span>
									</div>
									<div class="clearfix"></div>
								</div>
								<div  class="panel-wrapper collapse in">
									<!-- <div  class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
									</div> 
								</div>
							</div>
						</div>
          </div>-->
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Expenses as per Month</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_4" class="table  display table-hover mb-30">
												<thead>
													<tr class="table_align">
														<th>#</th>
														<th>Challan No</th>
														<th>Supplaier<br>Name</th>
														<th>Customer<br>Name</th>
														<th>New customer</th>
														<th>Finance</th>
														<th>Invoice</th>
														<th>details</th>
														<th>Mode of Payment</th>
														<th>Ref No</th>
														<th>Credit</th>
														<th>Debit</th>
														<th>Balance</th>
														<th>Generated Date</th>
													</tr>
												</thead>

												<tbody>
                         							<?php
														$counter = 1;$balance = 0; $credit = 0; $debit = 0;
														while($rowdata = mysqli_fetch_assoc($sql2)){
															?>
															<tr>
																<td><?php echo($counter) ?></td>
																<td><?php echo($rowdata['id']) ?></td>
																<td>
																	<?php 
																	$supplay = $rowdata['supplayername'];
																	// $sql3 = mysqli_query($con,"SELECT `name` FROM `pdc_buyer` WHERE `id`='$supplay'");
																	// while($rowdata3 = mysqli_fetch_assoc($sql3)){
																	// 	echo($rowdata3['name']);
																	// }
																	echo $supplay;
																?>
																</td>
																<td>
																	<?php 
																	$bayer = $rowdata['customername'];
																	$sql3 = mysqli_query($con,"SELECT `name` FROM `buyerdetails` WHERE `id`='$bayer'");
																	while($rowdata3 = mysqli_fetch_assoc($sql3)){
																		echo($rowdata3['name']);
																	}
																?>
																</td>
																<td><?php echo($rowdata['newcustomer']) ?></td>
																<td><?php echo($rowdata['finance_agent']) ?></td>
																<td><?php echo($rowdata['invoice_no']) ?></td>
																<td><?php echo($rowdata['details']) ?></td>
																<td><?php if($rowdata['mode']=="1")echo("Cash"); elseif($rowdata['mode']=="2") echo("Cheque"); elseif($rowdata['mode']=="3") echo("Online transfer"); else echo("NEFT"); ?></td>
																<td><?php echo($rowdata['ref_no']) ?></td>
																<td><?php if($rowdata['paytype']=="1"){ echo($rowdata['amount']); $balance = $balance+$rowdata['amount']; $credit = $credit+$rowdata['amount']; } ?></td>
																<td><?php if($rowdata['paytype']=="0"){ echo($rowdata['amount']); $balance = $balance-$rowdata['amount']; $debit = $debit+$rowdata['amount']; } ?></td>
																<td><?php echo $balance ?></td>
																<td><?php echo($rowdata['date']) ?></td>
															</tr>
															<?php
																$counter++;
													}
													?>
													<!-- <tr>
														<td>Total</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td><?php //echo($credit) ?></td>
														<td><?php //echo($debit) ?></td>
														<td><?php //echo($balance) ?></td>
														<td></td>
													</tr> -->
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
