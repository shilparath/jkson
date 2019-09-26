<?php
	include('config.php');
	function fetchProduct1(){
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT DISTINCT
		id,
		mat_des,
		mat_code
		FROM insertProduct
		");
		$stmt->execute();
		$stmt->bind_result($id,$mat_des,$mat_code);
		while($stmt->fetch()){
			$row[] = array('id' =>$id ,'mat_des' => $mat_des,'mat_code'=>$mat_code );
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
		hsn_code,
		imeino,
		quantity,
		amount,
		tax_cost,
		cgst,
		sgst,
		igst,
		rate,
		discount,
		mat_code,
		mat_des,
		quantity_avail
		FROM insertProduct
		WHERE mat_des = ?
		ORDER BY id DESC LIMIT 1
		");
		$stmt->bind_param("s",$itemtypeid);
		$stmt->execute();
		$stmt->bind_result($id,$hsn_code,$imeino,$quantity,$amount,$tax_cost,$cgst,$sgst,$igst,$rate,$discount,$mat_code,$mat_des,$quantity_avail);
		while($stmt->fetch()){
			$row[] = array('id' =>$id ,'hsn_code' => $hsn_code,'imeino'=>$imeino,'quantity'=>$quantity,'amount'=>$amount,'tax_cost'=>$tax_cost,'cgst'=>$cgst,'sgst'=>$sgst,'igst'=>$igst,'rate'=>$rate,'discount'=>$discount,'mat_code'=>$mat_code,'mat_des'=>$mat_des,'quantity_avail'=>$quantity_avail );
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

	function fetchUnit($itemtypeid,$response){
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT
		
		quantity,
		mat_des,
		avail
		FROM stockdetails
		WHERE mat_des = ? AND 
		imeino=?
		");
		$stmt->bind_param("ss",$itemtypeid,$response);
		$stmt->execute();
		$stmt->bind_result($quantity,$mat_des,$avail);
		while($stmt->fetch()){
			$row[] = array('quantity'=>$quantity,'mat_des'=>$mat_des,'avail'=>$avail );
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


    function fetchMrktprice($matcode){
        global $mysqli;
		$stmt = $mysqli->prepare("SELECT
		market_price
		FROM mobiledetails
		WHERE modelname = ?
		");
		$stmt->bind_param("s",$matcode);
		$stmt->execute();
		$stmt->bind_result($market_price);
		while($stmt->fetch()){
			$row[] = array('market_price' =>$market_price);
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
		   $html1.='<option value="'.$v1['id']."///".$v1['mat_code'].'">'.$v1['mat_code']."/".$v1['mat_des'].'</option>';
		}

		echo $html1;
	}
	if($_POST['action']=='price'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['rate'];
		}
	}
	if($_POST['action']=='tax'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['rate']*(($v1['sgst']/100) + ($v1['cgst']/100)+ ($v1['igst']/100));
		}
	}
	if($_POST['action']=='total_price'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['rate']+($v1['rate']*(($v1['sgst']/100) + ($v1['cgst']/100)+ ($v1['igst']/100)));
		}
	}
	if($_POST['action']=='hsn_code'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['hsn_code'];
		}
		//echo $itemtypeid;
	}
	if($_POST['action']=='IMEI'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['imeino'];
		}
	}
	if($_POST['action']=='quantity'){
		
		$response = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$response);
		$itemtypeid = $itemtypeid3[2];
		$sql = mysqli_query($con,"SELECT * FROM `stockdetails` WHERE `id`='$itemtypeid'");
		while($rowdata =  mysqli_fetch_assoc($sql)){
			echo($rowdata['avail']);
		}
	}
	if($_POST['action']=='SGST'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['sgst'];
		}
	}
	if($_POST['action']=='CGST'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['cgst'];
		}
	}
	if($_POST['action']=='IGST'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['igst'];
		}
	}
	if($_POST['action']=='material_code'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			echo $v1['mat_code'];
		}
	}
	if($_POST['action']=='Unit'){
		$response = $_POST['response'];
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchUnit($itemtypeid,$response);
		foreach ($result as $v1) {
			echo $v1['avail'];
		}
	}
	if($_POST['action']=='rate'){
		$itemtypeid2 = $_POST['itemtypeid'];
		$itemtypeid3 = explode("///",$itemtypeid2);
		$itemtypeid = $itemtypeid3[0];
		$result = fetchProductDetailsbyID($itemtypeid);
		foreach ($result as $v1) {
			//echo $v1['rate'];
			$matcode = $v1['mat_des'];
			$result2 = fetchMrktprice($matcode);
			foreach($result2 as $v2){
				echo $v2['market_price'];
			}
		}
	}
	?>
