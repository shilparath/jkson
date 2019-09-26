<?php include("config.php"); ?>


<?php
//print_r($_GET);
$id = $_GET['name'];
?>
<table width="100%">
	<tr style="height: 40px">
		<td>#</td>
		<td>Date</td>
		<td>Amount</td>
		<td>Type</td>
		<td>MOde</td>
		<td>Ref No</td>
	</tr>
	<?php
	$i = 1;
	$sql = mysqli_query($con,"SELECT * FROM `distributer_payment_history` WHERE `distributer_id`='$id' ORDER BY `id` DESC");
	while($rowdata = mysqli_fetch_assoc($sql)){
		?>
		<tr style="height: 40px">
			<td><?php echo($i) ?></td>
			<td><?php echo($rowdata['date']) ?></td>
			<td><?php echo($rowdata['paid_amount']) ?></td>
			<td><?php if($rowdata['payment_type']==0){echo("Debit");}else{echo("Credit");} ?></td>
			<td><?php $pid = $rowdata['payment_mode']; $sql1 = mysqli_query($con,"SELECT * FROM `payment_mode` WHERE `id`='$pid'");
				while($rowdata1 = mysqli_fetch_assoc($sql1)){
					echo($rowdata1['name']);
				}
				?></td>
			<td><?php echo($rowdata['reference_no']) ?></td>
		</tr>
		<?php
			$i++;
	}
	?>
</table>
