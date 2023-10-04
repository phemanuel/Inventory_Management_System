<?php
include ('dbconfig.php');

$cardname= $_REQUEST['cardname'];
$cardamount= $_REQUEST['cardamount'];
$cardrate= $_REQUEST['rate'];
$rmbvalue= $_REQUEST['rmbvalue'];
$crate= $_REQUEST['crate'];
$datekeep = date('Y-m-d');
$time1 = date("h:i:sa");
$user_name = $_SESSION['user_name'];
$clientid=$_SESSION['clientid']; 
//--------calculate-----------

	$customer_rate1= ($crate * $cardamount);
	$amount_sold = ($cardamount * $cardrate * $rmbvalue) ;
	$profit = ($amount_sold - $customer_rate1);

$_SESSION['cardname'] = $cardname ;
$_SESSION['cardamount'] = $cardamount ;
$_SESSION['cardrate'] = $cardrate ;
$_SESSION['rmbvalue'] = $rmbvalue ;
$_SESSION['crate'] = $crate ;
$_SESSION['amountsold'] = $amount_sold ;

//-------------


//============generate transid=-===============
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
$tradeid = GeraHash(8);
$_SESSION['tradeid'] = $tradeid;


//===== check if orderid exist
	

$sql="SELECT * FROM trading WHERE tradeid='$tradeid'";

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
$sql1="SELECT * FROM tradingcal WHERE tradeid='$tradeid'";

			$result1=mysqli_query($conn,$sql1);
			$count1=mysqli_num_rows($result1);
if($count1==1){

goto a;
}
else{
goto c ;
}

exit;
//============================================

c:
//================
$sql2="INSERT INTO tradingcal (tradeid,card_name,card_amount,card_rate,rmb_value,amount_sold,customer_rate,clientid,ratetype,date1,time1,status,confirmby)
VALUES
('$tradeid','$cardname', '$cardamount','$cardrate','$rmbvalue','$amount_sold','$crate','$clientid','RMB/USDT','$datekeep','$time1','Active','$user_name')";

$result2 = mysqli_query($conn,$sql2);
echo "<script>
alert('Calculation completed.');
window.location.href='trdusdcal1.php';
</script>";

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
</body>

</html>
