<?php
//function.php

function fill_category_list($connect)
{
	$query = "
	SELECT * FROM clientcategory 
	WHERE status = 'Active' AND clientid = '".$_SESSION['clientid']."' 
	ORDER BY category_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["category_name"].'">'.$row["category_name"].'</option>';
	}
	return $output;
}

function fill_dept_list($connect)
{
	$query = "
	SELECT * FROM deptsetup 
	WHERE deptstatus = 'Active' AND clientid = '".$_SESSION['clientid']."'
	ORDER BY deptname ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["deptname"].'">'.$row["deptname"].'</option>';
	}
	return $output;
}
function fill_cable_list($connect)
{
	$query = "
	SELECT * FROM cable_name 
	WHERE cablestatus = 'Active' AND clientid = '".$_SESSION['clientid']."'
	ORDER BY cablename ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["cablename"].'">'.$row["cablename"].'</option>';
	}
	return $output;
}

function fill_cableplan_list($connect, $cablename)
{
	$query = "SELECT * FROM cabletv_plan 
	WHERE  cablename = '".$cablename."' AND clientid = '".$_SESSION['clientid']."'
	ORDER BY cableplan ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value=""></option>';
	foreach($result as $row)
	{
	
		$output .= '<option value="'.$row["cableplan"].'">'.$row["cableplan"].'</option>';
	}
	return $output;
} 

function fill_hod_list($connect, $dept)
{
	$query = "SELECT * FROM deptsetup 
	WHERE  deptname = '".$dept."' AND clientid = '".$_SESSION['clientid']."'
	ORDER BY depthod ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value=""></option>';
	foreach($result as $row)
	{
	
		$output .= '<option value="'.$row["depthod"].'">'.$row["depthod"].'</option>';
	}
	return $output;
}

function fill_brand_list($connect, $category_id)
{
	$query = "SELECT * FROM brand 
	WHERE brand_status = 'Active' 
	AND category_id = '".$category_id."'
	ORDER BY brand_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select Brand</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["brand_id"].'">'.$row["brand_name"].'</option>';
	}
	return $output;
}

function fill_appno_list($connect, $applicantname)
{
	$query = "SELECT * FROM recruitment 
	WHERE status = 'Active' AND clientid = '".$_SESSION['clientid']."'
	AND applicantname = '".$applicantname."'
	ORDER BY applicantname ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value=""></option>';
	foreach($result as $row)
	{
	
		$output .= '<option value="'.$row["applicantno"].'">'.$row["applicantno"].'</option>';
		
	}
	return $output;
	
}

function fill_dept1_list($connect, $applicantname)
{
	$query = "SELECT * FROM recruitment 
	WHERE status = 'Active' AND clientid = '".$_SESSION['clientid']."'
	AND applicantname = '".$applicantname."'
	ORDER BY dept ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value=""></option>';
	foreach($result as $row)
	{
	
		$output .= '<option value="'.$row["dept"].'">'.$row["dept"].'</option>';
		
	}
	return $output;
}

function fill_post1_list($connect, $applicantname)
{
	$query = "SELECT * FROM recruitment 
	WHERE status = 'Active' AND clientid = '".$_SESSION['clientid']."'
	AND applicantname = '".$applicantname."'
	ORDER BY postapplied ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value=""></option>';
	foreach($result as $row)
	{
	
		$output .= '<option value="'.$row["postapplied"].'">'.$row["postapplied"].'</option>';
		
	}
	return $output;
}

function fill_salary_list($connect, $applicantname)
{
	$query = "SELECT * FROM recruitment 
	WHERE status = 'Active' AND clientid = '".$_SESSION['clientid']."'
	AND applicantname = '".$applicantname."'
	ORDER BY salarymonth ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value=""></option>';
	foreach($result as $row)
	{
	
		$output .= '<option value="'.$row["salarymonth"].'">'.$row["salarymonth"].'</option>';
		
	}
	return $output;
}

function get_user_name($connect, $user_id)
{
	$query = "
	SELECT user_name FROM user_details WHERE user_id = '".$user_id."' AND clientid = '".$_SESSION['clientid']."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['user_name'];
	}
}

function fill_product_list($connect)
{
	$query = "
	SELECT * FROM product 
	WHERE product_status = 'Active' AND clientid = '".$_SESSION['clientid']."'
	ORDER BY product_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["product_id"].'">'.$row["product_name"].'</option>';
	}
	return $output;
}

function fetch_product_details($product_id, $connect)
{
	$query = "
	SELECT * FROM product 
	WHERE product_id = '".$product_id."' AND clientid = '".$_SESSION['clientid']."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['product_name'] = $row["product_name"];
		$output['quantity'] = $row["product_quantity"];
		$output['price'] = $row['product_base_price'];
		$output['tax'] = $row['product_tax'];
	}
	return $output;
}

function available_product_quantity($connect, $product_id)
{
	$product_data = fetch_product_details($product_id, $connect);
	$query = "
	SELECT 	inventory_order_product.quantity FROM inventory_order_product 
	INNER JOIN inventory_order ON inventory_order.inventory_order_id = inventory_order_product.inventory_order_id
	WHERE inventory_order_product.product_id = '".$product_id."' AND
	inventory_order.inventory_order_status = 'active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total = 0;
	foreach($result as $row)
	{
		$total = $total + $row['quantity'];
	}
	$available_quantity = intval($product_data['quantity']) - intval($total);
	if($available_quantity == 0)
	{
		$update_query = "
		UPDATE product SET 
		product_status = 'inactive' 
		WHERE product_id = '".$product_id."'
		";
		$statement = $connect->prepare($update_query);
		$statement->execute();
	}
	return $available_quantity;
}

function count_total_user($connect)
{
	$query = "
	SELECT * FROM user_details WHERE user_status='Active' AND clientid = '".$_SESSION['clientid']."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_category($connect)
{
	$query = "
	SELECT * FROM clientcategory WHERE status='Active' AND clientid = '".$_SESSION['clientid']."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}
function count_total_staff($connect)
{
	$query = "
	SELECT * FROM recruitment WHERE status='Active' AND clientid = '".$_SESSION['clientid']."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}
function count_total_brand($connect)
{
	$query = "
	SELECT * FROM brand WHERE brand_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_product($connect)
{
	$query = "
	SELECT * FROM product WHERE product_status='Active' AND clientid = '".$_SESSION['clientid']."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_stockout($connect)
{
$stockout = 0 ;
	$query = "
	SELECT * FROM product WHERE product_status='Active' AND product_type='Product' AND product_quantity = 0 AND clientid = '".$_SESSION['clientid']."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_stocklow($connect)
{
	$query = "
	SELECT * FROM product WHERE product_status='Active' AND product_type='Product' AND product_quantity < 5 AND clientid = '".$_SESSION['clientid']."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_order_value($connect)
{
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_cash_order_value($connect)
{
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_value($connect)
{
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function get_user_wise_total_order($connect)
{
	$query = "
	SELECT sum(supply1.finalamount) as order_total, 
	SUM(CASE WHEN supply1.status = 'Paid' THEN supply1.finalamount ELSE 0 END) AS cash_order_total, 
	SUM(CASE WHEN supply1.status = 'Not Paid' THEN supply1.finalamount ELSE 0 END) AS credit_order_total, 
	user_details.user_name 
	FROM supply1 
	INNER JOIN user_details ON user_details.user_id = supply1.user_id 
	WHERE supply1.transstatus = 'Active' AND supply1.status <> 'Pre-order' AND supply1.clientid = '".$_SESSION['clientid']."' GROUP BY supply1.user_id
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>User Name</th>
				<th>Total Order Value</th>
				<th>Total Cash Order</th>
				<th>Total Credit Order</th>
			</tr>
	';

	$total_order = 0;
	$total_cash_order = 0;
	$total_credit_order = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right"> '.$row["order_total"].'</td>
			<td align="right"> '.$row["cash_order_total"].'</td>
			<td align="right"> '.$row["credit_order_total"].'</td>
		</tr>
		';

		$total_order = $total_order + $row["order_total"]. ".00";
		$total_cash_order = $total_cash_order + $row["cash_order_total"]. ".00";
		$total_credit_order = $total_credit_order + $row["credit_order_total"]. ".00";
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b>=N= '.$total_order.'</b></td>
		<td align="right"><b>=N= '.$total_cash_order.'</b></td>
		<td align="right"><b>=N= '.$total_credit_order.'</b></td>
	</tr></table></div>
	';
	return $output;
}
//=================ADMIN SECTION==================
//==========by date==============
function count_total_order_valuedate($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'AND supplydate = '$datekeep'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_cash_order_valuedate($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'AND supplydate = '$datekeep'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valuedate($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND supplydate = '$datekeep'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function get_user_wise_total_orderdate($connect)
{

$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(supply1.finalamount) as order_total, 
	SUM(CASE WHEN supply1.status = 'Paid' THEN supply1.finalamount ELSE 0 END) AS cash_order_total, 
	SUM(CASE WHEN supply1.status = 'Not Paid' THEN supply1.finalamount ELSE 0 END) AS credit_order_total, 
	user_details.user_name 
	FROM supply1 
	INNER JOIN user_details ON user_details.user_id = supply1.user_id 
	WHERE supply1.transstatus = 'Active' AND supply1.status <> 'Pre-order' AND supply1.clientid = '".$_SESSION['clientid']."' AND supplydate = '$datekeep' GROUP BY supply1.user_id 
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>User Name</th>
				<th>Total Order Value</th>
				<th>Total Cash Order</th>
				<th>Total Credit Order</th>
			</tr>
	';

	$total_order = 0;
	$total_cash_order = 0;
	$total_credit_order = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right"> '.$row["order_total"].'</td>
			<td align="right"> '.$row["cash_order_total"].'</td>
			<td align="right"> '.$row["credit_order_total"].'</td>
		</tr>
		';

		$total_order = $total_order + $row["order_total"]. ".00";
		$total_cash_order = $total_cash_order + $row["cash_order_total"]. ".00";
		$total_credit_order = $total_credit_order + $row["credit_order_total"]. ".00";
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b>=N= '.$total_order.'</b></td>
		<td align="right"><b>=N= '.$total_cash_order.'</b></td>
		<td align="right"><b>=N= '.$total_credit_order.'</b></td>
	</tr></table></div>
	';
	return $output;
}
//====================by month=================

function count_total_order_valuemonthly($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'AND month1 = '".$_SESSION['monthkeep']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_cash_order_valuemonthly($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."'AND month1 = '".$_SESSION['monthkeep']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valuemonthly($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND month1 = '".$_SESSION['monthkeep']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function get_user_wise_total_ordermonthly($connect)
{

$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(supply1.finalamount) as order_total, 
	SUM(CASE WHEN supply1.status = 'Paid' THEN supply1.finalamount ELSE 0 END) AS cash_order_total, 
	SUM(CASE WHEN supply1.status = 'Not Paid' THEN supply1.finalamount ELSE 0 END) AS credit_order_total, 
	user_details.user_name 
	FROM supply1 
	INNER JOIN user_details ON user_details.user_id = supply1.user_id 
	WHERE supply1.transstatus = 'Active' AND supply1.status <> 'Pre-order' AND supply1.clientid = '".$_SESSION['clientid']."' AND supply1.month1 = '".$_SESSION['monthkeep']."' AND year1 = '".$_SESSION['yearkeep']."' GROUP BY supply1.user_id 
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>User Name</th>
				<th>Total Order Value</th>
				<th>Total Cash Order</th>
				<th>Total Credit Order</th>
			</tr>
	';

	$total_order = 0;
	$total_cash_order = 0;
	$total_credit_order = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right"> '.$row["order_total"].'</td>
			<td align="right"> '.$row["cash_order_total"].'</td>
			<td align="right"> '.$row["credit_order_total"].'</td>
		</tr>
		';

		$total_order = $total_order + $row["order_total"]. ".00";
		$total_cash_order = $total_cash_order + $row["cash_order_total"]. ".00";
		$total_credit_order = $total_credit_order + $row["credit_order_total"]. ".00";
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b>=N= '.$total_order.'</b></td>
		<td align="right"><b>=N= '.$total_cash_order.'</b></td>
		<td align="right"><b>=N= '.$total_credit_order.'</b></td>
	</tr></table></div>
	';
	return $output;
}

//====================by Year=================

function count_total_order_valueyearly($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_cash_order_valueyearly($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."'AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valueyearly($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function get_user_wise_total_orderyearly($connect)
{

$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(supply1.finalamount) as order_total, 
	SUM(CASE WHEN supply1.status = 'Paid' THEN supply1.finalamount ELSE 0 END) AS cash_order_total, 
	SUM(CASE WHEN supply1.status = 'Not Paid' THEN supply1.finalamount ELSE 0 END) AS credit_order_total, 
	user_details.user_name 
	FROM supply1 
	INNER JOIN user_details ON user_details.user_id = supply1.user_id 
	WHERE supply1.transstatus = 'Active' AND supply1.status <> 'Pre-order' AND supply1.clientid = '".$_SESSION['clientid']."' AND supply1.year1 = '".$_SESSION['yearkeep']."' GROUP BY supply1.user_id 
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>User Name</th>
				<th>Total Order Value</th>
				<th>Total Cash Order</th>
				<th>Total Credit Order</th>
			</tr>
	';

	$total_order = 0;
	$total_cash_order = 0;
	$total_credit_order = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right"> '.$row["order_total"].'</td>
			<td align="right"> '.$row["cash_order_total"].'</td>
			<td align="right"> '.$row["credit_order_total"].'</td>
		</tr>
		';

		$total_order = $total_order + $row["order_total"]. ".00";
		$total_cash_order = $total_cash_order + $row["cash_order_total"]. ".00";
		$total_credit_order = $total_credit_order + $row["credit_order_total"]. ".00";
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b>=N= '.$total_order.'</b></td>
		<td align="right"><b>=N= '.$total_cash_order.'</b></td>
		<td align="right"><b>=N= '.$total_credit_order.'</b></td>
	</tr></table></div>
	';
	return $output;
}

//==============USER================
// ================ALL
function count_total_order_valueuser($connect)
{
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_cash_order_valueuser($connect)
{
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valueuser($connect)
{
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}


//==========by date==============
function count_total_order_valuedateuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'AND supplydate = '$datekeep' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_cash_order_valuedateuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."'AND supplydate = '$datekeep' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valuedateuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND supplydate = '$datekeep' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

//====================by month=================

function count_total_order_valuemonthlyuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'AND month1 = '".$_SESSION['monthkeep']."' AND year1 = '".$_SESSION['yearkeep']."' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_cash_order_valuemonthlyuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."'AND month1 = '".$_SESSION['monthkeep']."' AND confirmby = '".$_SESSION['user_name']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valuemonthlyuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND month1 = '".$_SESSION['monthkeep']."' AND confirmby = '".$_SESSION['user_name']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

//==============by year

function count_total_order_valueyearlyuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."' AND year1 = '".$_SESSION['yearkeep']."' AND confirmby = '".$_SESSION['user_name']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_cash_order_valueyearlyuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND confirmby = '".$_SESSION['user_name']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valueyearlyuser($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND confirmby = '".$_SESSION['user_name']."' AND year1 = '".$_SESSION['yearkeep']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

//==============customer orders=============
//====================ALL=================

function count_total_order_valuecustomer($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE transstatus='Active' AND status <> 'Pre-order' AND clientid = '".$_SESSION['clientid']."'AND mobileno = '".$_SESSION['customerid']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_cash_order_valuecustomer($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 
	WHERE status = 'Paid' 
	AND transstatus='active' AND clientid = '".$_SESSION['clientid']."'AND mobileno = '".$_SESSION['customerid']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_valuecustomer($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(finalamount) as total_order_value FROM supply1 WHERE status = 'Not Paid' AND transstatus='active' AND clientid = '".$_SESSION['clientid']."' AND mobileno = '".$_SESSION['customerid']."'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function get_user_wise_total_ordercustomer($connect)
{

$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(supply1.finalamount) as order_total, 
	SUM(CASE WHEN supply1.status = 'Paid' THEN supply1.finalamount ELSE 0 END) AS cash_order_total, 
	SUM(CASE WHEN supply1.status = 'Not Paid' THEN supply1.finalamount ELSE 0 END) AS credit_order_total, 
	user_details.user_name 
	FROM supply1 
	INNER JOIN user_details ON user_details.user_id = supply1.user_id 
	WHERE supply1.transstatus = 'Active' AND supply1.status <> 'Pre-order' AND supply1.clientid = '".$_SESSION['clientid']."' AND supply1.mobileno = '".$_SESSION['customerid']."' GROUP BY supply1.user_id 
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>User Name</th>
				<th>Total Order Value</th>
				<th>Total Cash Order</th>
				<th>Total Credit Order</th>
			</tr>
	';

	$total_order = 0;
	$total_cash_order = 0;
	$total_credit_order = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right"> '.$row["order_total"].'</td>
			<td align="right"> '.$row["cash_order_total"].'</td>
			<td align="right"> '.$row["credit_order_total"].'</td>
		</tr>
		';

		$total_order = $total_order + $row["order_total"]. ".00";
		$total_cash_order = $total_cash_order + $row["cash_order_total"]. ".00";
		$total_credit_order = $total_credit_order + $row["credit_order_total"]. ".00";
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b>=N= '.$total_order.'</b></td>
		<td align="right"><b>=N= '.$total_cash_order.'</b></td>
		<td align="right"><b>=N= '.$total_credit_order.'</b></td>
	</tr></table></div>
	';
	return $output;
}

//============profit and loss account==============
function count_total_creditorder_valuepl($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(credit) as total_order_value FROM profitloss
	WHERE clientid = '".$_SESSION['clientid']."' AND transstatus = 'Active'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}
//------------------------------------

function count_total_debitorder_valuepl($connect)
{
$datekeep = date('Y-m-d');
	$query = "
	SELECT sum(debit) as total_order_value FROM profitloss 
	WHERE  clientid = '".$_SESSION['clientid']."' AND transstatus = 'Active'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}


?>