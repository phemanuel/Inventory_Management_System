<?php

//user_action.php

include('database_connection.php');
include('function.php');
$clientid = $_SESSION['clientid'];

//-------generate application no----------
a:
$min = 100001 ; 
$max = 999999 ;
 
$femi = rand ( $min, $max );

$yearkeep = date("Y") ; 
$applicantno =  $yearkeep . $femi;
$_SESSION['applicantno']= $applicantno ;

include('dbconfig1.php');

//check for available email
$sql1="SELECT * FROM recruitment WHERE applicantno='$applicantno' ";
$result=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

goto a;
//header("location:createghexist.html");
}
else {
goto b;

}
exit ;
//-----------------------------------------

b:
$date1 = date('Y-m-d');
if(isset($_POST['btn_action']))
{
if($_POST['btn_action'] == 'load_hod')
	{
		echo fill_hod_list($connect, $_POST['dept']);
	}
	if($_POST['btn_action'] == 'Add')
	{
	$datekeep1 = $_POST["inventory_order_date"];
	$datekeep = date("Y-m-d", strtotime($datekeep1)); 
		$query = "
		INSERT INTO recruitment (applicantno, applicantname, address,age,qualification,postapplied,dept,hod,interviewdate,status,date1,mobileno,emailaddy,clientid,nationality,state,gender,maritalstatus,kinname,kinphone,salarymonth,salaryannual,appointmentdate,confirmby,bankname,bankacct,college,collegeyear,picturename) 
		VALUES (:applicantno, :applicantname, :address,:age,:qualification,:postapplied,:dept,:hod,:interviewdate,:status,:date1,:mobileno,:emailaddy,:clientid,:nationality,:state,:gender,:maritalstatus,:kinname,:kinphone,:salarymonth,:salaryannual,:appointmentdate,:confirmby,:bankname,:bankacct,:college,:collegeyear,:picturename)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':applicantno'		=>	$applicantno,
				':applicantname'		=>	$_POST["applicantname"],
				':address'		=>	$_POST["address"],
				':age'		=>	$_POST["age"],
				':qualification'		=>	$_POST["qualification"],
				':postapplied'		=>	$_POST["postapplied"],
				':dept'		=>	$_POST["dept"],
				':hod'		=>	$_POST["hod"],
				':interviewdate'		=>	$datekeep,
				':status'		=>	'Inactive',
				':date1'		=>	$date1,
				':mobileno'		=>	$_POST["mobileno"],
				':emailaddy'		=>	$_POST["emailaddy"],
				':clientid'		=>	$clientid,
				':nationality'		=>	$_POST["nationality"],
				':state'		=>	$_POST["state"],
				':gender'		=>	$_POST["gender"],				
				':maritalstatus'		=>	'NILL',
				':kinname'		=>	'NILL',
				':kinphone'		=>	'NILL',
				':salarymonth'		=>	'NILL',
				':salaryannual'		=>	'NILL',
				':appointmentdate'		=>	$date1,
				':confirmby'		=>	'NILL',
				':bankname'		=>	'NILL',
				':bankacct'		=>	'NILL',
				':college'		=>	'NILL',
				':collegeyear'		=>	'NILL',
				':picturename'		=>	'blank.jpg'
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Recruitment Added';
		}
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
			$output['inventory_order_date'] = $row['interviewdate'];
			$output['mobileno'] = $row['mobileno'];
			$output['emailaddy'] = $row['emailaddy'];
			$output['nationality'] = $row['nationality'];
			$output['state'] = $row['state'];
			$output['gender'] = $row['gender'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['applicantname'] != '')
		{
		//$datekeep1 = $_POST["inventory_order_date"];
	//$datekeep = date("d-m-Y", strtotime($datekeep1)); 
			$query = "
			UPDATE recruitment SET 
				applicantname = '".$_POST["applicantname"]."', 
				address = '".$_POST["address"]."',
				age = '".$_POST["age"]."',
				qualification = '".$_POST["qualification"]."',
				postapplied = '".$_POST["postapplied"]."',
				dept = '".$_POST["dept"]."',
				hod = '".$_POST["hod"]."',
				interviewdate = '".$_POST["inventory_order_date"]."',
				mobileno = '".$_POST["mobileno"]."',
				emailaddy = '".$_POST["emailaddy"]."',
				nationality = '".$_POST["nationality"]."',
				state = '".$_POST["state"]."',
				gender = '".$_POST["gender"]."'
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
				interviewdate = '".$_POST["inventory_order_date"]."',
				mobileno = '".$_POST["mobileno"]."',
				emailaddy = '".$_POST["emailaddy"]."',
				nationality = '".$_POST["nationality"]."',
				state = '".$_POST["state"]."',
				gender = '".$_POST["gender"]."'
				WHERE rid = '".$_POST["rid"]."' 
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Recruitment Details has been Edited';
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