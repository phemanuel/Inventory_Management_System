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
$tradeid = GeraHash(8);
$_SESSION['tradeid'] = $tradeid;



b:

$sql="SELECT * FROM trading WHERE tradeid='$tradeid'";

			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
if($count==1){

goto a;
}
else{
echo "<script>
window.location.href='trading1.php';
</script>";
}
?>
