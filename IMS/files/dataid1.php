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
$dataid = GeraHash(8);
$_SESSION['dataid'] = $dataid;



$sql="SELECT * FROM trading WHERE tradeid='$dataid'";

			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
if($count==1){

goto a;
}
else {
goto b;
}

exit;


b:
$sql2="SELECT * FROM airtime_info WHERE dataid='$dataid'";

			$result2=mysqli_query($conn,$sql2);
			$count2=mysqli_num_rows($result2);
if($count2==1){

goto a;
}
else {
goto c ;
}

exit;
c:

$sql1="SELECT * FROM datainfo1 WHERE dataid='$dataid'";

			$result1=mysqli_query($conn,$sql1);
			$count1=mysqli_num_rows($result1);
if($count==1){

goto a;
}
else{
echo "<script>
window.location.href='ainfo.php';
</script>";
}
?>
