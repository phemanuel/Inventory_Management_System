<?php

if ( empty ( $_SESSION['paymentstatus'])) {
echo "<script>
alert('Select the payment status.');
window.location.href='checkout1.php';
</script>";
}
else {
goto f ;
}

exit ;

f:
$itemsupplier = $_REQUEST['itemsupplier'];
$paymentmode = $_REQUEST['paymentmode'];
$status = $_REQUEST['paymentstatus'];
$comment = $_REQUEST['comment'];
$_SESSION['itemsupplier'] = $itemsupplier;
$_SESSION['paymentmode'] = $paymentmode;
$_SESSION['status'] = $status;
$_SESSION['comment'] = $comment;
		echo "<script>
window.location.href='saveitem.php';
</script>";


?>