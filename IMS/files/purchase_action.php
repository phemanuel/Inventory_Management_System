<?php

//product_action.php

include('database_connection.php');
include('dbconfig1.php');
include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];
$supplyid = $_SESSION['supplyid'];
$date1 = date('Y-m-d');
$monthkeep = date('m');
$user_id = $_SESSION['user_id'];

if ($monthkeep == "01") {
$month1 = "JANUARY";
}
else if ($monthkeep == "02") {
$month1 = "FEBRUARY";
}
else if ($monthkeep == "03") {
$month1 = "MARCH";
}
else if ($monthkeep == "04") {
$month1 = "APRIL";
}
else if ($monthkeep == "05") {
$month1 = "MAY";
}
else if ($monthkeep == "06") {
$month1 = "JUNE";
}
else if ($monthkeep == "07") {
$month1 = "JULY";
}
else if ($monthkeep == "08") {
$month1 = "AUGUST";
}
else if ($monthkeep == "09") {
$month1 = "SEPTEMBER";
}
else if ($monthkeep == "10") {
$month1 = "OCTOBER";
}
else if ($monthkeep == "11") {
$month1 = "NOVEMBER";
}
else if ($monthkeep == "12") {
$month1 = "DECEMBER";
}


if(isset($_POST['btn_action']))
{
	
if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO purchase (itemname, itemsupplier, itemquantity,amount,paymentmode,approvedby,purchasedate,clientid,itemunit,confirmby,status,comment,dept,month1,year1,purchaseid,user_id) 
		VALUES (:itemname, :itemsupplier, :itemquantity,:amount,:paymentmode,:approvedby,:purchasedate,:clientid,:itemunit,:confirmby,:status,:comment,:dept,:month1,:year1,:purchaseid,:user_id)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':itemname'		=>	$_POST["itemname"],
				':itemsupplier'		=>	$_POST["itemsupplier"],
				':itemquantity'		=>	$_POST["itemquantity"],
				':amount'		=>	$_POST["amount"],
				':paymentmode'		=>	$_POST["paymentmode"],
				':approvedby'		=>	$_POST["approvedby"],
				':purchasedate'		=>	date('Y-m-d'),
				':clientid'		=>	$clientid,
				':itemunit'		=>	$_POST["itemunit"],
				':confirmby'		=>	$user_name,
				':status'		=>	'Active',
				':comment'		=>	$_POST["comment"],
				':dept'		=>	$_POST["dept"],
				':month1'		=>	$month1,
				':year1'		=>	date('Y'),
				':purchaseid'		=>	$supplyid,
				':user_id'		=>	$user_id
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
		$credit = "0";
$debit = $_POST["amount"];
$transdate = date('Y-m-d');
$transtime = date("h:i:sa");
$paymenttype = "debit";
$user_id = $_SESSION['user_id'];
$itemname = $_POST['itemname'];
$itemquantity = $_POST['itemquantity'];
$itemunit = $_POST['itemunit'];
$year1 = date('Y');
$narration = "Purchase : " . $itemquantity . $itemunit .  " " . $itemname ;
$sql2="INSERT INTO profitloss1 (credit,debit,paymenttype,clientid,transdate,transtime,confirmby,transid,user_id,month1,year1,narration)
VALUES
('$credit','$debit', '$paymenttype','$clientid','$transdate','$transtime','$user_name','$supplyid','$user_id','$month1','$year1','$narration')";
$result1=mysqli_query($conn,$sql2);
//------generate new id-----------------
a:
function GeraHash($qtd){
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
$Caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
$QuantidadeCaracteres = strlen($Caracteres);
$QuantidadeCaracteres--;

$Hash=NULL;
    for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
    }

return $Hash;
}

//Here you specify how many characters the returning string must have
$supplyid = GeraHash(8);
$_SESSION['supplyid'] = $supplyid;


//===== check if orderid exist
	

$sql="SELECT * FROM supply WHERE supplyid='$supplyid'";

			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
if($count==1){

goto a;
}
else{
goto b;
}

exit ;

b:
$sql1="SELECT * FROM purchase WHERE purchaseid='$supplyid'";

			$result1=mysqli_query($conn,$sql1);
			$count1=mysqli_num_rows($result1);
if($count1==1){

goto a;
}
else{
echo "<script>
window.location.href='purchase.php';
</script>";
}

//---------------------------end------------
			echo 'New Purchase Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM purchase 
	    WHERE pid = '".$_POST["pid"]."' AND
		clientid = '".$_SESSION["clientid"]."' 
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';
		foreach($result as $row)
		{
			$status = '';
			if($row['status'] == 'Active')
			{
				$status = '<span class="label label-success">Active</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Inactive</span>';
			}
			$output .= '
			<tr>
				<td>Item Name</td>
				<td>'.$row["itemname"].'</td>
			</tr>
			<tr>
				<td>Supplied By</td>
				<td>'.$row["itemsupplier"].'</td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td>'.$row["itemquantity"].' '.$row["itemunit"].'</td>
			</tr>
			<tr>
				<td>Amount</td>
				<td>'.$row["amount"].'</td>
			</tr>
			<tr>
				<td>Payment Mode</td>
				<td>'.$row["paymentmode"].'</td>
			</tr>
			<tr>
				<td>Comment</td>
				<td>'.$row["comment"].'</td>
			</tr>
			<tr>
				<td>Approved By</td>
				<td>'.$row["approvedby"].'</td>
			</tr>
			<tr>
				<td>Enter By</td>
				<td>'.$row["confirmby"].'</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>'.$status.'</td>
			</tr>
			<tr>
				<td>Purchase Date</td>
				<td>'.$row["purchasedate"].'</td>
			</tr>
			';
		}
		$output .= '
			</table>
		</div>
		';
		echo $output;
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM purchase WHERE pid = :pid
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':pid'	=>	$_POST["pid"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['itemname'] = $row['itemname'];
			$output['itemsupplier'] = $row['itemsupplier'];
			$output['itemquantity'] = $row['itemquantity'];
			$output['itemunit'] = $row['itemunit'];
			$output['amount'] = $row['amount'];
			$output['paymentmode'] = $row['paymentmode'];
			$output['comment'] = $row['comment'];
			$output['approvedby'] = $row['approvedby'];
			$output['dept'] = $row['dept'];
			
			
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['itemname'] != '')
		{
			$query = "
			UPDATE purchase SET 
				itemname = '".$_POST["itemname"]."', 
				itemsupplier = '".$_POST["itemsupplier"]."',
				itemquantity = '".$_POST["itemquantity"]."',
				itemunit = '".$_POST["itemunit"]."',
				amount = '".$_POST["amount"]."',
				paymentmode = '".$_POST["paymentmode"]."',
				comment = '".$_POST["comment"]."',
				approvedby = '".$_POST["approvedby"]."',
				dept = '".$_POST["dept"]."'	
				WHERE pid = '".$_POST["pid"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE purchase SET 
				itemname = '".$_POST["itemname"]."', 
				itemsupplier = '".$_POST["itemsupplier"]."',
				itemquantity = '".$_POST["itemquantity"]."',
				itemunit = '".$_POST["itemunit"]."',
				amount = '".$_POST["amount"]."',
				paymentmode = '".$_POST["paymentmode"]."',
				comment = '".$_POST["comment"]."',
				approvedby = '".$_POST["approvedby"]."',
				dept = '".$_POST["dept"]."'	
				WHERE pid = '".$_POST["pid"]."' 
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
		$sql="SELECT * FROM purchase WHERE pid='".$_POST["pid"]."' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {
 $transid= $rowval['purchaseid'];
}
}
$debit = $_POST["amount"];
$itemname = $_POST['itemname'];
$itemquantity = $_POST['itemquantity'];
$itemunit = $_POST['itemunit'];
$narration = "Purchase : " . $itemquantity . $itemunit .  " " . $itemname ;
		$sql3 = "UPDATE profitloss1 SET debit='$debit',narration = '$narration' WHERE transid='$transid' and clientid='$clientid'"; 
$result3 = mysqli_query($conn,$sql3);
			echo 'Purchase details has been Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'active';
		if($_POST['status'] == 'active')
		{
			$status = 'inactive';
		}
		$query = "
		UPDATE product 
		SET product_status = :product_status 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':product_status'	=>	$status,
				':product_id'		=>	$_POST["product_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Product status change to ' . $status;
		}
	}
}


?>