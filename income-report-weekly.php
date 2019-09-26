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
    sellItems.invoice_no,
    SUM(sellItems.income)
    FROM sellItems
    INNER JOIN insertProduct ON sellItems.mat_des = insertProduct.id
    WHERE YEARWEEK(sellItems.creationDate) = YEARWEEK(NOW())
    GROUP BY sellItems.bill
    ");
    $stmt->execute();
    $stmt->bind_result($challan_no,$offer_no,$dispatched,$date,$invoice_date,$remarks,$mat_des,$unit,$bill,$quantity,$pl_serial_no,$invoice_no,$income);
    while($stmt->fetch()){
      $row[] = array('challan_no'=>$challan_no,'offer_no'=>$offer_no,'dispatched'=>$dispatched,'date'=>$date,'invoice_date'=>$invoice_date,'remarks'=>$remarks,'product'=>$mat_des,'unit'=>$unit,'quantity'=>$quantity,'bill'=>$bill,'pl_serial_no'=>$pl_serial_no,'invoice_no'=>$invoice_no,'income'=>$income);
    }
    $stmt->close();
  	if(!empty($row)){
  	return ($row); }
  	else
  	{ return ""; }
}

function fetchTotalIncome(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  SUM(income)
  FROM sellItems
  WHERE YEARWEEK(sellItems.creationDate) = YEARWEEK(NOW())
  ");
  $stmt->execute();
  $stmt->bind_result($income);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $income;
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
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Weekly Income Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="javascript:void()">Invantory Management System</a></li>
							<li class="active"><span>Income Report</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

        <div class="row">
          <div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title inline-block txt-dark">Weekly Income : <i class="fa fa-inr"></i>&nbsp;<?php echo fetchTotalIncome(); ?></h6>
									</div>
									<div class="pull-right">
										<span class="label label-info capitalize-font inline-block ml-10">income</span>
									</div>
									<div class="clearfix"></div>
								</div>
								<div  class="panel-wrapper collapse in">
									<!-- <div  class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
									</div> -->
								</div>
							</div>
						</div>
          </div>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Income as per Invoice Generated this week</h6>
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
														<th>Bill No</th>
                            <th>Dispatched</th>
														<th>Remarks</th>
														<th>Invoice date</th>
                            <th>Material Description</th>
                            <th>Invoice No</th>
                            <th>Quantity</th>
														<th>Income</th>
                            <th>Invoice</th>
													</tr>
												</thead>

												<tbody>
                          <?php
                          $items = fetchSellItems();
                          $i = 1;
                          foreach ($items as $v1) {
                           ?>
													<tr class="table_align">
														<td>#<?php echo $i; ?></td>
														<td><?php echo $v1['bill'];?></td>
                            <td><?php echo $v1['dispatched'];?></td>
                            <td><?php echo $v1['remarks'];?></td>
                            <td><?php echo $v1['invoice_date'];?></td>
                            <td><?php echo $v1['product'];?></td>
                            <td><?php echo $v1['invoice_no'];?></td>
                            <td><?php echo $v1['quantity'];?></td>
														<td>
															<i class="fa fa-inr"></i>&nbsp;&nbsp;<?php echo $v1['income'];?>
														</td>
                            <td>
															<a href="customer-invoice.php?printid=<?php echo $v1['bill']; ?>" target="_blank">
																<i class="fa fa-file-text-o" aria-hidden="true"></i>
															</a>
														</td>
													</tr>
													  <?php $i++; } ?>
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
<?php } ?>
