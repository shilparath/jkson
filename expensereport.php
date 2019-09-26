<?php
	include('config.php');
		?>
<?php


$today_date =  date('d-m-Y');
$date = date('Y-m-d');
$sql =  mysqli_query($con,"SELECT * FROM `expense` WHERE `date`='$date'");
$amount = 0;
while($rowdata = mysqli_fetch_assoc($sql)){
	$amount1 = $rowdata['amount'];
	$amount = $amount+$amount1;
}
$sql1 = mysqli_query($con,"SELECT * FROM `expense` ORDER BY `id` DESC");
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
						<h5 class="txt-dark"> Expenses Report</h5>
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


				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
								
									<h6 class="panel-title txt-dark">Expenses as per Today <i class="fa fa-inr"></i> <?php echo $amount ?> </h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table  display table-hover mb-30">
												<thead>
													<tr class="table_align">
                            							<th>#</th>
														<th>Challan No</th>
														<th>Supplaier Name</th>
														<th>Customer Name</th>
														<th>New customer</th>
														<th>details</th>
														<th>Mode of Payment</th>
														<th>Amount</th>
														<th>Generated Date</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
                        						<?php
													$counter = 1;
													while($rowdata = mysqli_fetch_assoc($sql1)){
														?>
														<tr>
															<td><?php echo($counter) ?></td>
															<td><?php echo($rowdata['id']) ?></td>
															<td><?php 
																	$supplay = $rowdata['supplayername'];
																	$sql3 = mysqli_query($con,"SELECT `name` FROM `pdc_buyer` WHERE `id`='$supplay'");
																	while($rowdata3 = mysqli_fetch_assoc($sql3)){
																		echo($rowdata3['name']);
																	}
																?></td>
															<td><?php 
																	$bayer = $rowdata['customername'];
																	$sql3 = mysqli_query($con,"SELECT `name` FROM `buyerdetails` WHERE `id`='$bayer'");
																	while($rowdata3 = mysqli_fetch_assoc($sql3)){
																		echo($rowdata3['name']);
																	}
																?></td>
															<td><?php echo($rowdata['newcustomer']) ?></td>
															<td><?php echo($rowdata['details']) ?></td>
															<td><?php if($rowdata['mode']=="1")echo("Cash"); elseif($rowdata['mode']=="2") echo("Cheque"); else echo("Online transfer"); ?></td>
															<td><?php echo($rowdata['amount']) ?></td>
															<td><?php echo($rowdata['date']) ?></td>
															<td><a href="chalaninvoice.php?printid=<?php echo $rowdata['id'];?>" target="_blank"><i class="fa fa-print"></i></a></td>
														</tr>
														<?php
														//print_r($rowdata);
														$counter++;
													}
													?>
												</tbody>
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
