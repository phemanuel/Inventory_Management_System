<?php
session_start();

$clientid= $_SESSION['clientid'];

if ($clientid=="ISPIMS") {
    
    echo "<script>
window.location.href='staffaccess.php';
</script>";

}
elseif ($clientid=="COINMARTIMS") {
    
    echo "<script>
window.location.href='staffaccess.php';
</script>";

}
else {
    
    echo "<script>
window.location.href='staffaccesso.php';
</script>";

}

?>