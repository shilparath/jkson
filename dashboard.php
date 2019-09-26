<?php
include("config.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
if(!$_SESSION){
	header('location:index.php'); }
$sessionname = $_SESSION['login_user'];

function IND_money_format($money){
    $len = strlen($money);
    $m = '';
    $money = strrev($money);
    for($i=0;$i<$len;$i++){
        if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
            $m .=',';
        }
        $m .=$money[$i];
    }
    return strrev($m);
}

function fetchTotalIncome(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  (SELECT SUM(income)
  FROM sellItems
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE()) ) + (SELECT SUM(income)
  FROM sellitems_without_gst
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE()) ) AS income
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
}
function fetchTotalIncomeTillNow(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  (SELECT SUM(income)
  FROM sellItems)+(SELECT SUM(income)
  FROM sellitems_without_gst) AS income
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
}
function fetchMonthlyPurchasedItems(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  ROUND(SUM(tax_cost),2)
  FROM insertProduct
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE())
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
}

function fetchMonthlySoldItems(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  (SELECT ROUND(SUM(total_cost),2)
  FROM sellItems
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE()) )
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
}

function fetchMonthlyBillGenerated(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  COUNT(DISTINCT bill)
  FROM sellItems
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE())
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
}

function fetchMonthlyItemsPurchased(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  SUM(quantity)
  FROM insertProduct
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE())
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
}
function fetchMonthlyItemsSold(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  (SELECT SUM(quantity)
  FROM sellItems
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE()) ) + (SELECT SUM(quantity)
  FROM sellitems_without_gst
  WHERE MONTH(creationDate) = MONTH(CURRENT_DATE()) ) AS income
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
}

function last8Transanction(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  sellItems.invoice_no,
  code,
  date,
  insertProduct.mat_des,
  sellItems.quantity,
  sellItems.amount
  FROM sellItems
  INNER JOIN insertProduct ON sellItems.mat_des = insertProduct.id
  LIMIT 8
  ");
  $stmt->execute();
  $stmt->bind_result($invoice_no,$code,$date,$mat_des,$quantity,$amount);
  while ($stmt->fetch()) {
    $row[] = array('invoice_no' => $invoice_no,'code'=>$code,'date'=>$date,'mat_des'=>$mat_des,'quantity'=>$quantity,'amount'=>$amount );
  }
  $stmt->close();
  if(!empty($row))
  {
    return $row;
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
            <div class="container-fluid pt-25">
				<!-- Row -->


				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-warning card-view">
							<div class="panel-heading small-panel-heading relative">
								<div class="pull-left">
									<h6 class="panel-title txt-light">Monthly Invoices</h6>
								</div>
								<div class="clearfix"></div>
								<div class="head-overlay"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="sm-data-box data-with-border bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block">Purchased</span>
													<span class="txt-light block counter"><i class="fa fa-inr" aria-hidden="true"></i><span class="counter-anim"><?php echo IND_money_format(fetchMonthlyPurchasedItems()); ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<span class="weight-500 uppercase-font txt-light  block">Sold</span>
													<span class="txt-light block counter"><i class="fa fa-inr" aria-hidden="true"></i><span class="counter-anim"><?php echo IND_money_format(fetchMonthlySoldItems()); ?></span></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-success card-view">
							<div class="panel-heading small-panel-heading relative">
								<div class="pull-left">
									<h6 class="panel-title txt-light">Monthly Revenue</h6>
								</div>
								<div class="clearfix"></div>
								<div class="head-overlay"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="block"><i class="zmdi zmdi-trending-up txt-warning font-18 mr-5"></i><span class="weight-500 uppercase-font txt-light">growth</span></span>
													<span class="txt-light block counter"><i class="fa fa-inr" aria-hidden="true"></i><span class="counter-anim"><?php echo IND_money_format(fetchTotalIncome()); ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default card-view">
								<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">My Stats</h6>
								</div>
								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body row">
										<div class="">
											<div class="pl-15 pr-15 mb-15">
												<div class="pull-left">
													<i class="zmdi zmdi-collection-folder-image inline-block mr-10 font-16"></i>
													<span class="inline-block txt-dark">Customer's Invoice Generated</span>
												</div>
													<span class="inline-block txt-warning pull-right weight-500"><?php echo fetchMonthlyBillGenerated(); ?></span>
												<div class="clearfix"></div>
											</div>
											<hr class="light-grey-hr mt-0 mb-15"/>
											<div class="pl-15 pr-15 mb-15">
												<div class="pull-left">
													<i class="zmdi zmdi-format-list-bulleted inline-block mr-10 font-16"></i>
													<span class="inline-block txt-dark">No of Products Purchased</span>
												</div>
													<span class="inline-block txt-danger pull-right weight-500"><?php echo fetchMonthlyItemsPurchased(); ?></span>
												<div class="clearfix"></div>
											</div>
											<hr class="light-grey-hr mt-0 mb-15"/>
											<div class="pl-15 pr-15 mb-15">
												<div class="pull-left">
													<i class="zmdi zmdi-ticket-star inline-block mr-10 font-16"></i>
													<span class="inline-block txt-dark">No of Products Sold</span>
												</div>
												<span class="inline-block txt-primary pull-right weight-500"><?php echo fetchMonthlyItemsSold(); ?></span>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							</div>




					</div>

					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Recent Transanction Details</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>

								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
										  <table class="table table-hover mb-0">
											<thead>
											  <tr>
												<th>Invoice No</th>
												<th>Contact No</th>
												<th>Date</th>
												<th>Model No</th>
												<th>Quantity</th>
                        <th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php
                        $fetchPartys = last8Transanction();
                        foreach ($fetchPartys as $v1) {
                        ?>
											  <tr class="table_align">
												<td><?php echo $v1['invoice_no']; ?></td>
												<td><center><?php echo $v1['code'];?></center></td>
												<td><center><?php echo $v1['date']; ?></center></td>
												<td><center><?php echo $v1['mat_des']; ?></center></td>
												<td><?php echo $v1['quantity']; ?></td>
                        <td><i class="fa fa-inr"></i>&nbsp;<?php echo $v1['amount']; ?></td>
											  </tr>
												<?php } ?>
											</tbody>
										  </table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Row -->
        <div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo (int)(fetchMonthlyItemsSold()/fetchMonthlyItemsPurchased() * 100) ?></span>%</span>
													<span class="weight-500 uppercase-font txt-light block font-13">Items Selling Rate </span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo (int)(fetchMonthlySoldItems()/fetchMonthlyPurchasedItems()*100); ?></span>%</span>
													<span class="weight-500 uppercase-font txt-light block">growth rate </span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-redo txt-light data-right-rep-icon"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo IND_money_format(fetchTotalIncomeTillNow());?></span></span>
													<span class="weight-500 uppercase-font txt-light block">income till now</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="fa fa-inr txt-light data-right-rep-icon"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa");?></span></span>
													<span class="weight-500 uppercase-font txt-light block">time</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
													<i class="fa fa-clock-o txt-light data-right-rep-icon"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Row -->
				<!-- <div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Recent Purchase Details</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block full-screen">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview border-none" id="support_table">
												<thead>
													<tr>
														<th>Bill No</th>
														<th>Supplier Name</th>
														<th>Invoice No</th>
														<th>Material Code</th>
														<th>Material Description</th>
														<th>Quantity</th>
														<th>Rate</th>
														<th>Discount</th>
														<th>Total Amount</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
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
														<td>

														</td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
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

	<!-- Counter Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="dist/js/productorders-data.js"></script>

	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

	<!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>

	<!-- Chartist JavaScript -->
	<script src="vendors/bower_components/chartist/dist/chartist.min.js"></script>
	<script src="dist/js/chartist-data.js"></script>

	<!-- ChartJS JavaScript -->
	<script src="vendors/chart.js/Chart.min.js"></script>

	<script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard3-data.js"></script>
</body>

</html>
<?php } ?>
