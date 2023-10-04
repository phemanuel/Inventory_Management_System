<?php

//user_action.php

include('database_connection.php');
include('function.php');
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];

$date1 = date('Y-m-d');
if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'load_hod')
	{
		echo fill_hod_list($connect, $_POST['dept']);
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM recruitment 
		WHERE rid= '".$_POST["rid"]."'
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
    <td><img src="uploads/'.$row["picturename"].'" width="100" height="100" alt="" /></td>
  </tr>
			<tr>
				<td>Staff ID</td>
				<td>'.$row["applicantno"].'</td>
			</tr>
			<tr>
				<td>Staff Name</td>
				<td>'.$row["applicantname"].'</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>'.$row["gender"].'</td>
			</tr>
			<tr>
				<td>Age</td>
				<td>'.$row["age"].'</td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td>'.$row["emailaddy"].'</td>
			</tr>
			<tr>
				<td>Mobile No</td>
				<td>'.$row["mobileno"].'</td>
			</tr>
			<tr>
				<td>Marital Status</td>
				<td>'.$row["maritalstatus"].'</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>'.$row["address"].'</td>
			</tr>
			<tr>
				<td>Department</td>
				<td>'.$row["dept"].'</td>
			</tr>
			<tr>
				<td>Post Held</td>
				<td>'.$row["postapplied"].'</td>
			</tr>
			<tr>
				<td>Qualification</td>
				<td>'.$row["qualification"].'</td>
			</tr>
			<tr>
				<td>Institution</td>
				<td>'.$row["college"].'</td>
			</tr>
			<tr>
				<td>Year Obtained</td>
				<td>'.$row["collegeyear"].'</td>
			</tr>
			<tr>
				<td>Nationality</td>
				<td>'.$row["nationality"].'</td>
			</tr>
			<tr>
				<td>State</td>
				<td>'.$row["state"].'</td>
			</tr>
			<tr>
				<td>Salary</td>
				<td>'.$row["salarymonth"].'</td>
			</tr>
			<tr>
				<td>Bank Name</td>
				<td>'.$row["bankname"].'</td>
			</tr>
			<tr>
				<td>Bank Account No</td>
				<td>'.$row["bankacct"].'</td>
			</tr>
			<tr>
				<td>Approved By</td>
				<td>'.$row["confirmby"].'</td>
			</tr>
			<tr>
				<td>Appointment Date</td>
				<td>'.$row["appointmentdate"].'</td>
			</tr>
			<tr>
				<td>Next of Kin Name</td>
				<td>'.$row["kinname"].'</td>
			</tr>
			<tr>
				<td>Next of Kin Mobile No</td>
				<td>'.$row["kinphone"].'</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>'.$status.'</td>
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
		SELECT * FROM recruitment WHERE rid = :rid 
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':rid'	=>	$_POST["rid"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['applicantname'] = $row['applicantname'];
			$output['address'] = $row['address'];
			$output['age'] = $row['age'];
			$output['qualification'] = $row['qualification'];
			$output['postapplied'] = $row['postapplied'];
			$output['dept'] = $row['dept'];
			$output['hod'] = $row['hod'];
			$output['mobileno'] = $row['mobileno'];
			$output['emailaddy'] = $row['emailaddy'];
			$output['nationality'] = $row['nationality'];
			$output['state'] = $row['state'];
			$output['gender'] = $row['gender'];
			$output['maritalstatus'] = $row['maritalstatus'];
			$output['kinname'] = $row['kinname'];
			$output['kinphone'] = $row['kinphone'];
			$output['salarymonth'] = $row['salarymonth'];
			$output['salaryannual'] = $row['salaryannual'];
			$output['bankname'] = $row['bankname'];
			$output['bankacct'] = $row['bankacct'];
			$output['college'] = $row['college'];
			$output['collegeyear'] = $row['collegeyear'];
		}
		echo json_encode($output);
	}
	
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['applicantname'] != '')
		{
			$query = "
			UPDATE recruitment SET 
				applicantname = '".$_POST["applicantname"]."', 
				address = '".$_POST["address"]."',
				age = '".$_POST["age"]."',
				qualification = '".$_POST["qualification"]."',
				postapplied = '".$_POST["postapplied"]."',
				dept = '".$_POST["dept"]."',
				hod = '".$_POST["hod"]."',
				mobileno = '".$_POST["mobileno"]."',
				emailaddy = '".$_POST["emailaddy"]."',
				nationality = '".$_POST["nationality"]."',
				state = '".$_POST["state"]."',
				gender = '".$_POST["gender"]."',
				maritalstatus = '".$_POST["maritalstatus"]."',
				kinname = '".$_POST["kinname"]."',
				kinphone = '".$_POST["kinphone"]."',
				salarymonth = '".$_POST["salarymonth"]."',
				salaryannual = '".$_POST["salaryannual"]."',
				bankname = '".$_POST["bankname"]."',
				bankacct = '".$_POST["bankacct"]."',
				college = '".$_POST["college"]."',
				collegeyear = '".$_POST["collegeyear"]."',
				appointmentdate = '".$date1."',
				status = 'Active',
				confirmby = '".$user_name."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		else
		{
			$query = "
			UPDATE recruitment SET 
				applicantname = '".$_POST["applicantname"]."', 
				address = '".$_POST["address"]."',
				age = '".$_POST["age"]."',
				qualification = '".$_POST["qualification"]."',
				postapplied = '".$_POST["postapplied"]."',
				dept = '".$_POST["dept"]."',
				hod = '".$_POST["hod"]."',
				mobileno = '".$_POST["mobileno"]."',
				emailaddy = '".$_POST["emailaddy"]."',
				nationality = '".$_POST["nationality"]."',
				state = '".$_POST["state"]."',
				gender = '".$_POST["gender"]."',
				maritalstatus = '".$_POST["maritalstatus"]."',
				kinname = '".$_POST["kinname"]."',
				kinphone = '".$_POST["kinphone"]."',
				salarymonth = '".$_POST["salarymonth"]."',
				salaryannual = '".$_POST["salaryannual"]."',
				bankname = '".$_POST["bankname"]."',
				bankacct = '".$_POST["bankacct"]."',
				college = '".$_POST["college"]."',
				collegeyear = '".$_POST["collegeyear"]."',
				appointmentdate = '".$date1."',
				status = 'Active',
				confirmby = '".$user_name."'
				WHERE rid = '".$_POST["rid"]."'  
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Staff details has been Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'Active';
		if($_POST['status'] == 'Active')
		{
			$status = 'Inactive';
		}
		else if($_POST['status'] == 'Inactive')
		{
			$status = 'Active';
		}
		$query = "
		UPDATE recruitment 
		SET status = :status 
		WHERE rid = :rid
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'	=>	$status,
				':rid'		=>	$_POST["rid"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Recruitment Status change to ' . $status;
		}
	}
}

?>