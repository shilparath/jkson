<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<style>
.table-align{
	text-align: center;
	height: 40px;
}
</style>

<?php include("include/header.php"); 
function fetchSupplier(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	id,
	name
	FROM pdc_Buyer
	");
	$stmt->execute();
	$stmt->bind_result($id,$name);
	while($stmt->fetch()){
		$row[] = array('id'=>$id,'name'=>$name);
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
function fetchStates(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	name
	FROM state
	");
	$stmt->execute();
	$stmt->bind_result($name);
	while($stmt->fetch()){
		$row[] = array('name' =>$name );
	}
	if(!empty($row))
	{
		return ($row);
	}
	else
	{
		return "";
	}
}
?>
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
					<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Return Product</h6>
					<hr class="light-grey-hr"/>

					
					<div class="col-md-12">
						<div class="col-md-6">
							 <div class="form-group">
                              <label class="control-label mb-10">Supplier Name</label>
                              <select name="supplier_name" class="form-control" required>
                                <option value="" selected disabled>Select Supplier</option>
                                <?php $fetchSupplierName = fetchSupplier();
			                        						 foreach ($fetchSupplierName as $v1) { ?>
                                <option value="<?php echo $v1['id'];?>"><?php echo $v1['name'];?></option>
                                <?php }?>
                              </select>
                              <span class="help-block"> </span> </div>
						</div>	
						<div class="col-md-6">
							 <div class="form-group">
                              <label class="control-label mb-10">Company Name</label>
                             <select class="form-control" name="company_name" id="mat_code" class="mat_code_clss">
                            <option value="">Select Company</option>
								<?php
								$sql1 = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE `status`='1'");
									while($rowdata1 = mysqli_fetch_assoc($sql1)){
										?>
										<option value="<?php echo($rowdata1['id']) ?>"><?php echo($rowdata1['name']) ?></option>
								<?php
									}
								?>
                          </select>
                              <span class="help-block"> </span> </div>
						</div>
				    </div>

				    <div class="col-md-12">
							
				    </div>



				    <div class="col-md-12">
						<div class="col-md-6">
							 <div class="form-group">
                              <label class="control-label mb-10">Product Name</label>
                            <select class="form-control" name="product_name" id="product_name" class="product_name_clss"></select>
                              <span class="help-block"> </span> </div>
						</div>	
						<div class="col-md-6">
							 <div class="form-group">
                              <label class="control-label mb-10">Model Number</label>
                            <select class="form-control" name="model_number" class="mat_des_clss" id="mat_des">
                          </select>
                              <span class="help-block"> </span> </div>
						</div>
				    </div>				    
                    
					<div class="col-md-12"> 
						<div class="col-md-6">
							 <div class="form-group">
                              <label class="control-label mb-10">IMEI/SL No</label>
                            <select class="form-control" name="imei" class="mat_des_clss" id="imei">
                          </select>
                              <span class="help-block"> </span> </div>
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
					</div>
					
					<div class="col-md-12"> 
						<div class="col-md-6">
							 <div class="form-group">
								<label class="control-label mb-10">Discription</label>
								<textarea name="discription"  class="form-control"  placeholder="Return Discription"></textarea>
								<span class="help-block">  </span>
							</div>
						</div>
					</div>
					
			   
						<div class="form-actions mt-10">
							<button type="submit" class="btn btn-success  mr-10" name="save"> Save</button>
							<button type="reset" value="Reset" class="btn btn-default">Reset</button>
						</div>

					
				</div>
		</div>
	</div>
</div>
<?php
if(isset($_POST['save'])){
	$supplier_name=$_POST['supplier_name'];
	$company_name=$_POST['company_name'];
	$product_name=$_POST['product_name'];
	$model_number=$_POST['model_number'];
	$returntype=$_POST['returntype'];
	$discription=$_POST['discription'];
	$imei=$_POST['imei'];
	//imei
	$imei1="'".$_POST['imei']."'";
	$supplier_name1="'".$supplier_name."'";
	$company_name1="'".$company_name."'";
	$product_name1="'".$product_name."'";
	$model_number1="'".$model_number."'";
	$returntype1="'".$returntype."'";			
	$discription1="'".$discription."'";
	$query="SELECT distinct * FROM `insertproduct` WHERE product_name=$product_name and mat_des=$model_number1 and imeino=$imei1 ";
	//echo $query;
	$sql = mysqli_query($con,$query);
		 while($rowdata = mysqli_fetch_assoc($sql)){
		 	//$quantity = $rowdata['quantity'];
		 	$amount = $rowdata['amount']==""?0 : $rowdata['amount'];
		 	$quantity = $rowdata['quantity']=="" ? 0 :  $rowdata['quantity'];
		 	$insertproduct_id = $rowdata['id'];

		 	if($returntype=='replace')
		 	{
		 		$InsertIntoProductReturnQuery="insert into purchase_return (insert_product_id,supplier_name,company_name,product_name,model_number,returntype,discription,imei,org_quantity,org_amount) values($insertproduct_id,$supplier_name1,$company_name1,$product_name1,$model_number1,$returntype1,$discription1,$imei1,$quantity,$amount)";
		 		$InsertIntoProductReturn=mysqli_query($con,$InsertIntoProductReturnQuery);
		 		

		 	}
		 	else
		 	{
		 		$quantity1=$quantity-1;
		 		$amount1=$amount-($amount/$quantity);
		 		$updateQuery="UPDATE insertproduct set amount=$amount1 ,quantity=$quantity1 ";
		 		$InsertIntoProductReturn=mysqli_query($con,$updateQuery);
		 		$InsertIntoProductReturnQuery="insert into purchase_return (insert_product_id,supplier_name,company_name,product_name,model_number,returntype,discription,imei,org_quantity,org_amount) values($insertproduct_id,$supplier_name1,$company_name1,$product_name1,$model_number1,$returntype1,$discription1,$imei1,$quantity,$amount)";
		 		$InsertIntoProductReturn=mysqli_query($con,$InsertIntoProductReturnQuery);
		 	}
		// 	echo $updateQuery;
		 //	echo $InsertIntoProductReturnQuery;



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
	<script type="text/javascript">
	//	console.log("hiii");
		$(document).ready(function(){
			$('#mat_code').on('change', function(){
				var companyid = $('#mat_code').val();
				$.ajax({
					type:"post",
					url:"getmodel.php",
					
					data:{companyid:companyid,name:"getcompanyid"},
					success:function(data){
						$('#product_name').html(data);
					}
				});
				
			});

			$('#product_name').on('change', function(){
				
				var companyid = $('#mat_code').val();
				var product_name = $('#product_name').val();
				//alert(product_name);
				$.ajax({
					type:"post",
					url:"getmodel.php",
					
					data:{companyid:companyid,product_name:product_name,name:"get_model_no"},
					success:function(data){					
						$('#mat_des').html(data);					
						
					}
				});
				
			}); 

			$('#mat_des,#product_name,#mat_code ').on('change', function(){
				// console.log("ok") ;
				var companyid = $('#mat_code').val();
				var product_name = $('#product_name').val();
				var mat_des = $('#mat_des').val();
				
				//alert(product_name);
				$.ajax({
					type:"post",
					url:"get_imei.php",
					
					data:{companyid:companyid,product_name:product_name,mat_des:mat_des},
					success:function(data){					
						$('#imei').html(data);					
						
					}
				});
				
			});
			

		})
		
	</script>
</html>