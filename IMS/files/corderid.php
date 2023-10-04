<?php
include ("dbconfig.php");

//Generate random password. $c = quantity of character. $n = quantity of numeric.

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

b :
$sql1="SELECT * FROM purchase WHERE purchaseid='$supplyid'";

			$result1=mysqli_query($conn,$sql1);
			$count1=mysqli_num_rows($result1);
if($count1==1){

goto a;
}
else{
goto c;
}

exit ;
c:
$sql2="SELECT * FROM purchase1 WHERE purchaseid='$supplyid'";

			$result2=mysqli_query($conn,$sql2);
			$count2=mysqli_num_rows($result2);
if($count2==1){

goto a;
}
else{
goto d;
}

exit ;

d:
$sql3="SELECT * FROM corder WHERE supplyid='$supplyid'";

			$result3=mysqli_query($conn,$sql3);
			$count3=mysqli_num_rows($result3);
if($count3==1){

goto a;
}
else{
goto h ;
}

exit ;

h:
$sql6="SELECT * FROM cuorder WHERE supplyid='$supplyid'";

			$result6=mysqli_query($conn,$sql6);
			$count6=mysqli_num_rows($result6);
if($count6==1){

goto a;
}
else{
echo "<script>
window.location.href='cuorder.php';
</script>";
}
?>
