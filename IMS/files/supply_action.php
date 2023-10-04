<?php

//product_action.php

include('database_connection.php');

include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];

$date1 = date('d-m-Y');
if(isset($_POST['btn_action']))
{
	
if($_POST['btn_action'] == 'Add')
	{
	$supplyid = $_SESSION['supplyid'];
$itemname = $_SESSION['itemname'];
$itembarcode = $_SESSION['itembarcode'];
$quantitykeep = $_SESSION['quantitykeep'];
$itemquantity = $_POST['itemquantity'];
$itemunit = $_SESSION['itemunit'];

		$query = "
		INSERT INTO supply (supplyid,itembarcode, itemname, itemquantity,itemunit,supplydate,amount,confirmby,clientid) 
		VALUES (:supplyid, :itembarcode,:itemname, :itemquantity,:itemunit,:supplydate,:amount,:confirmby,:clientid)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':supplyid'		=>	$supplyid,
				':itembarcode'		=>	$itembarcode,
				':itemname'		=>	$itemname,
				':itemquantity'		=>	$itemquantity,
				':itemunit'		=>	$itemunit,
				':supplydate'		=>	date("d-m-Y"),
				':amount'		=>	'0',
				':confirmby'		=>	$user_name,
				':clientid'		=>	$clientid
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Item added to cart';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM product 
	    WHERE product_id = '".$_POST["product_id"]."' AND
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
			if($row['product_status'] == 'Active')
			{
				$status = '<span class="label label-success">Active</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Inactive</span>';
			}
			
			$_SESSION['itembarcode'] = $row["product_barcode"];
			$_SESSION['itemname'] = $row["product_name"];
			$_SESSION['quantitykeep'] = $row["product_quantity"];
			$_SESSION['itemunit'] = $row["product_unit"];
			$output .= '
			<tr>
				<td>Item Barcode</td>
				<td>'.$row["product_barcode"].'</td>
			</tr>
			<tr>
				<td>Item Name</td>
				<td>'.$row["product_name"].'</td>
			</tr>
			<tr>
				<td>Item Unit</td>
				<td>'.$row["product_unit"].'</td>
			</tr>
			<tr>
				<td>Item Unit</td>
				<td><input name="itemquantity" type="text" id="itemquantity" size="10" /></td>
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
		SELECT * FROM product WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':product_id'	=>	$_POST["product_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['category_name'] = $row['category_name'];
			$output['product_name'] = $row['product_name'];
			$output['product_description'] = $row['product_description'];
			$output['product_quantity'] = $row['product_quantity'];
			$output['product_unit'] = $row['product_unit'];

			$output['product_base_price'] = $row['product_base_price'];
			$output['product_barcode'] = $row['product_barcode'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE product 
		set category_name = :category_name,
		product_name = :product_name,
		product_description = :product_description, 
		product_quantity = :product_quantity, 
		product_unit = :product_unit, 
		product_base_price = :product_base_price, 
		product_barcode = :product_barcode 
		WHERE product_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_name'			=>	$_POST['category_name'],
				':product_name'			=>	$_POST['product_name'],
				':product_description'	=>	$_POST['product_description'],
				':product_quantity'		=>	$_POST['product_quantity'],
				':product_unit'			=>	$_POST['product_unit'],
				':product_base_price'	=>	$_POST['product_base_price'],
				':product_barcode'			=>	$_POST['product_barcode'],
				':product_id'			=>	$_POST['product_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Product Details Edited';
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