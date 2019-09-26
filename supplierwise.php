<?php
include("config.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
if(!$_SESSION){
	header('location:index.php'); }
$sessionname = $_SESSION['login_user'];

function fetchProduct($s){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT ROUND(SUM(tax_cost),2),pdc_Buyer.name,customer_details FROM `insertproduct` INNER JOIN pdc_Buyer on insertProduct.customer_details = pdc_Buyer.id WHERE `customer_details`= ?
    ");
    $stmt->bind_param("s",$s);
    $stmt->execute();
    $stmt->bind_result($tax_cost,$buyername,$customer_details);
    while($stmt->fetch()){
      $row[] = array('tax_cost'=>$tax_cost,'buyername'=>$buyername,'customer_details'=>$customer_details);
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
  function fetchSup(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT DISTINCT customer_details FROM `insertproduct` 
    ");
    $stmt->execute();
    $stmt->bind_result($customer_details);
    while($stmt->fetch()){
      $row[] = array('customer_details'=>$customer_details);
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
  function fetchPay($p){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT DISTINCT paid_amount,pending_amount FROM `supplier_payment` WHERE customer_details= ?
	");
	$stmt->bind_param("s",$p);
    $stmt->execute();
    $stmt->bind_result($paid_amount,$pending_amount);
    while($stmt->fetch()){
      $row[] = array('paid_amount'=>$paid_amount,'pending_amount'=>$pending_amount);
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
						<h5 class="txt-dark">Supplier Wise</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li class="active"><span>Supplier Wise</span></li>
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
											<table id="datable_3" class="table  display table-hover mb-30">
												<thead>
													<tr>
								                        <th>#</th>
								                        <!-- <th>Company Name</th>
														<th>Model No</th>
														<th>Invoice No</th> -->
								                        <th>Supplier Name</th>
								                        <th>Total Price</th>
														<th>Paid</th>
														<th>Pending</th>
														<th>Pay</th>
														<th>History</th> 
													</tr>
												</thead>
													<tbody>
														<?php
				 $counter = 1;
				 $sql = mysqli_query($con,"SELECT * FROM `supplier_payment_log` WHERE 1");
				 while($rowdata = mysqli_fetch_assoc($sql)){
					 ?>
					 <tr>
					 	<td><?php echo($counter) ?></td>
					 	<td>
					 		<?php $s_id = $rowdata['pdc_bayer_id'];
							$sql1 = mysqli_query($con,"SELECT * FROM `pdc_buyer` WHERE `id`='$s_id'");
					 while($rowdaat1 = mysqli_fetch_assoc($sql1)){
						 echo $sname = $rowdaat1['name'];
					 }
							?>
					 	</td>
					 	<td><?php echo($rowdata['total_amount']) ?></td>
					 	<td><?php echo($rowdata['total_paid_amount']) ?></td>
					 	<td><?php echo($rowdata['total_due']) ?></td>
					 	<td>&nbsp; &nbsp;<a  data-toggle="modal" data-id="<?php echo $rowdata['pdc_bayer_id'] ?>" data-name="<?php echo  $sname ?>" data-amount="<?php echo $rowdata['total_amount'] ?>" data-pendingamount="<?php echo $rowdata['total_due'] ?>" data-target="#exampleModal"  class="open-AddBookDialog mr-25" data-toggle="tooltip" data-original-title="Pay"><i class="fa fa-cc-mastercard  text-danger"></i> </a></td>
					 	<td><a href="supplier_payment_history.php?name=<?php echo($rowdata['pdc_bayer_id']); ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a></td>
					 </tr>
					 <?php
						 $counter++;
				 }
				 
				 ?>
													</tbody>
												
												<tfoot>
													  <tr>

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
                <?php
                

                
                ?>
                <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h5 class="modal-title" id="exampleModalLabel1">Pay Pending Balance</h5>
													</div>
													<div class="modal-body">
														<form action="ajax_pay_supplier.php" method="POST">
														    <div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Total Balance:</label>
																<input type="text" class="form-control" id="total_bal" readonly style='background-color:#212121' name="total_bal"  >
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Pending Balance:</label>
																<input type="text" class="form-control" id="pending_bal"  style='background-color:#212121' name="pending_bal"  >
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Paying Amount:</label>
																<input type="text" class="form-control" id="paying_amount" name="paying_amount" autocomplete="off" >
															</div>
															<div class="form-group" >
																<label for="recipient-name" class="control-label mb-10">Payment Type:</label>
																<!-- <input type="text" class="form-control" id="ptype" name="ptype" autocomplete="off" > -->
																<select class="form-control" id="mode" name="mode">
                                                                    <option value="1">Cash</option>
																	<option value="2">Cheque</option>
																	<option value="3">Online</option>
																	<option value="4">NEFT</option>
																</select>
															</div>
															<div class="form-group" >
																<label for="recipient-name" class="control-label mb-10">Ref No:</label>
																<input type="text" class="form-control" id="ref_no" name="ref_no" autocomplete="off" >
															</div>
															<div class="form-group" hidden>
																<label for="recipient-name" class="control-label mb-10">Name:</label>
																<input type="text" class="form-control" id="name" name="name" autocomplete="off" >
															</div>
															
															  <input type="hidden" name="cid" id="cid">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<input type="submit" class="btn btn-primary" value="Submit">
													</div>
												</form>
												</div>
											</div>
										</div>
                                        

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

<script>
$(document).on("click", ".open-AddBookDialog", function () {
		   var cid = $(this).data('id');
		   var name = $(this).data('name');
		   console.log(cid);
		  // var bur = $(this).data('id');
		   var amount = $(this).data('amount');
		   var pendingamount = $(this).data('pendingamount');
		   $(".modal-body #total_bal").val( amount );
		   $(".modal-body #pending_bal").val( pendingamount );
		   $(".modal-body #name").val( name );
		   //$(".modal-body #amount").val( bur );
		   $(".modal-body #cid").val( cid );
		});

</script>

</html>
<?php } ?>
