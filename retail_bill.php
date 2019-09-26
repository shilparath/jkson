<?php
	include('config.php');
function fetchProduct1(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT DISTINCT
	id,
	company_name
	FROM accessories_list
	");
	$stmt->execute();
	$stmt->bind_result($id,$mat_des);
	while($stmt->fetch()){
		$row[] = array('id' =>$id ,'company_name' => $mat_des );
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
	function fetchProductDetailsbyID($itemtypeid){
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT
		id,
		sl_no,
		company_name,
		model_no,
		hsn_code,
		quantity,
		rate_per_each,
		discount,
		amount,
		total_amount,
		total_pay
		FROM accessories_list
		WHERE id = ?
		");
		$stmt->bind_param("s",$itemtypeid);
		$stmt->execute();
		$stmt->bind_result($id,$sl_no,$company_name,$model_no,$hsn_code,$quantity,$rate_per_each,$discount,$amount,$total_amount,$total_pay);
		while($stmt->fetch()){
			$row[] = array('id' =>$id ,'sl_no' => $sl_no,'company_name'=>$company_name,'model_no'=>$model_no,'hsn_code'=>$hsn_code,'quantity'=>$quantity,'rate_per_each'=>$rate_per_each,'discount'=>$discount,'amount'=>$amount,'total_amount'=>$total_amount,'total_pay'=>$total_pay);
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









if($_POST['action'] == 'itemreplace')
	{
		$html1 = '<option value="" selected disabled>Select the  Product</option>';
		$fetchProduct = fetchProduct1();
					foreach ($fetchProduct as $v1) {
		   $html1.='<option value="'.$v1['id'].'">'.$v1['company_name'].'</option>';
		}

		echo $html1;
	}
if($_POST['action']=='hsn_code'){
		$itemtypeid = $_POST['itemtypeid'];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['hsn_code'];
		}
	}
if($_POST['action']=='quantity'){
		$itemtypeid = $_POST['itemtypeid'];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['quantity'];
		}
	}
if($_POST['action']=='total_price'){
		$itemtypeid = $_POST['itemtypeid'];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['rate_per_each'];
		}
	}
?>