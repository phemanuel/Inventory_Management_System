<?php

include('dbconfig.php');

$clientid = $_SESSION['clientid'];
$username = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

$datekeep= date('Y-m-d');
$monthkeep = date('m');
$yearkeep = date('Y');
// $datekeep= "2021-08-14";

//==========daily transaction summary=======

//=====trading=====

$sql1="SELECT * FROM trading WHERE clientid='$clientid' and confirm_by = '$username' and date1='$datekeep' ";
$result1=mysqli_query($conn,$sql1);
// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

//=======================================================
$sql2="SELECT * FROM tradingbtc WHERE clientid='$clientid' and confirm_by = '$username' and date1='$datekeep' ";
$result2=mysqli_query($conn,$sql2);
// Mysql_num_row is counting table row
$count2=mysqli_num_rows($result2);

//=====sales=====

$sql3="SELECT * FROM supply1 WHERE clientid='$clientid' and confirmby = '$username' and supplydate='$datekeep' ";
$result3=mysqli_query($conn,$sql3);
// Mysql_num_row is counting table row
$count3=mysqli_num_rows($result3);

//======delivery====
$sql4="SELECT * FROM delivery WHERE clientid='$clientid' and confirm_by = '$username' and date1='$datekeep' ";
$result4=mysqli_query($conn,$sql4);
// Mysql_num_row is counting table row
$count4=mysqli_num_rows($result4);

//=====airtime=========

$sql5="SELECT * FROM airtime_info WHERE clientid='$clientid' and confirm_by = '$username' and date1='$datekeep' ";
$result5=mysqli_query($conn,$sql5);
// Mysql_num_row is counting table row
$count5=mysqli_num_rows($result5);

//=====data=============

$sql6="SELECT * FROM datainfo1 WHERE clientid='$clientid' and confirm_by = '$username' and date1='$datekeep' ";
$result6=mysqli_query($conn,$sql6);
// Mysql_num_row is counting table row
$count6=mysqli_num_rows($result6);

//---Expense==========

$sql7="SELECT * FROM purchase1 WHERE clientid='$clientid' and confirmby = '$username' and purchasedate='$datekeep' ";
$result7=mysqli_query($conn,$sql7);
// Mysql_num_row is counting table row
$count7=mysqli_num_rows($result7);

//=======================

$daily_trad_trans = ($count1 + $count2 + $count3 + $count4 + $count5 +$count6 + $count7);
$daily_trad_trans_perc = round(($daily_trad_trans * 100)/10);
//========================================

//==========Monthly transaction summary=======

$start_date = $yearkeep . "-" . $monthkeep . "-". "01";
$end_date = $yearkeep . "-" . $monthkeep . "-". "31";

//=====trading=====

$sql11="SELECT * FROM trading WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ";
$result11=mysqli_query($conn,$sql11);
// Mysql_num_row is counting table row
$count11=mysqli_num_rows($result11);

//=======================================================
$sql12="SELECT * FROM tradingbtc WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ";
$result12=mysqli_query($conn,$sql12);
// Mysql_num_row is counting table row
$count12=mysqli_num_rows($result12);

//=====sales=====

$sql13="SELECT * FROM supply1 WHERE clientid='$clientid' and confirmby = '$username' and supplydate BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ";
$result13=mysqli_query($conn,$sql13);
// Mysql_num_row is counting table row
$count13=mysqli_num_rows($result13);

//======delivery====
$sql14="SELECT * FROM delivery WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ";
$result14=mysqli_query($conn,$sql14);
// Mysql_num_row is counting table row
$count14=mysqli_num_rows($result14);

//=====airtime=========

$sql15="SELECT * FROM airtime_info WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ";
$result15=mysqli_query($conn,$sql15);
// Mysql_num_row is counting table row
$count15=mysqli_num_rows($result15);

//=====data=============

$sql16="SELECT * FROM datainfo1 WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ";
$result16=mysqli_query($conn,$sql16);
// Mysql_num_row is counting table row
$count16=mysqli_num_rows($result16);

//---Expense==========

$sql17="SELECT * FROM purchase1 WHERE clientid='$clientid' and confirmby = '$username' and purchasedate BETWEEN '" . $start_date . "' AND  '" . $end_date . "' ";
$result17=mysqli_query($conn,$sql17);
// Mysql_num_row is counting table row
$count17=mysqli_num_rows($result17);


//=======================

$monthly_trad_trans = ($count11 + $count12 + $count13 + $count14 + $count15 + $count16 + $count17);
$monthly_trad_trans_perc = round(($monthly_trad_trans * 100)/60);

//===========================

//==========Yearly transaction summary=======

$start_date1 = $yearkeep . "-" . "01" . "-". "01";
$end_date1 = $yearkeep . "-" . "12" . "-". "31";

//=====trading=====

$sql21="SELECT * FROM trading WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date1 . "' AND  '" . $end_date1 . "' ";
$result21=mysqli_query($conn,$sql21);
// Mysql_num_row is counting table row
$count21=mysqli_num_rows($result21);

//=======================================================
$sql22="SELECT * FROM tradingbtc WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date1 . "' AND  '" . $end_date1 . "' ";
$result22=mysqli_query($conn,$sql22);
// Mysql_num_row is counting table row
$count22=mysqli_num_rows($result22);

//=====sales=====

$sql23="SELECT * FROM supply1 WHERE clientid='$clientid' and confirmby = '$username' and supplydate BETWEEN '" . $start_date1 . "' AND  '" . $end_date1 . "' ";
$result23=mysqli_query($conn,$sql23);
// Mysql_num_row is counting table row
$count23=mysqli_num_rows($result23);

//======delivery====
$sql24="SELECT * FROM delivery WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date1 . "' AND  '" . $end_date1 . "' ";
$result24=mysqli_query($conn,$sql24);
// Mysql_num_row is counting table row
$count24=mysqli_num_rows($result24);

//=====airtime=========

$sql25="SELECT * FROM airtime_info WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date1 . "' AND  '" . $end_date1 . "' ";
$result25=mysqli_query($conn,$sql25);
// Mysql_num_row is counting table row
$count25=mysqli_num_rows($result25);

//=====data=============

$sql26="SELECT * FROM datainfo1 WHERE clientid='$clientid' and confirm_by = '$username' and date1 BETWEEN '" . $start_date1 . "' AND  '" . $end_date1 . "' ";
$result26=mysqli_query($conn,$sql26);
// Mysql_num_row is counting table row
$count26=mysqli_num_rows($result26);

//---Expense==========

$sql27="SELECT * FROM purchase1 WHERE clientid='$clientid' and confirmby = '$username' and purchasedate BETWEEN '" . $start_date1 . "' AND  '" . $end_date1 . "' ";
$result27=mysqli_query($conn,$sql27);
// Mysql_num_row is counting table row
$count27=mysqli_num_rows($result27);


//=======================
$yearly_trad_trans = ($count21 + $count22 + $count23 + $count24 + $count25 + $count26 + $count27);
$yearly_trad_trans_perc = round(($yearly_trad_trans * 100)/365);
//================================

//==========All transaction summary=======

// $start_date1 = $yearkeep . "-" . "01" . "-". "01";
// $end_date1 = $yearkeep . "-" . "12" . "-". "31";

//=====trading=====

$sql31="SELECT * FROM trading WHERE clientid='$clientid' and confirm_by = '$username' ";
$result31=mysqli_query($conn,$sql31);
// Mysql_num_row is counting table row
$count31=mysqli_num_rows($result31);

//=======================================================
$sql32="SELECT * FROM tradingbtc WHERE clientid='$clientid' and confirm_by = '$username' ";
$result32=mysqli_query($conn,$sql32);
// Mysql_num_row is counting table row
$count32=mysqli_num_rows($result32);

//=====sales=====

$sql33="SELECT * FROM supply1 WHERE clientid='$clientid' and confirmby = '$username'  ";
$result33=mysqli_query($conn,$sql33);
// Mysql_num_row is counting table row
$count33=mysqli_num_rows($result33);

//======delivery====
$sql34="SELECT * FROM delivery WHERE clientid='$clientid' and confirm_by = '$username' ";
$result34=mysqli_query($conn,$sql34);
// Mysql_num_row is counting table row
$count34=mysqli_num_rows($result34);

//=====airtime=========

$sql35="SELECT * FROM airtime_info WHERE clientid='$clientid' and confirm_by = '$username'  ";
$result35=mysqli_query($conn,$sql35);
// Mysql_num_row is counting table row
$count35=mysqli_num_rows($result35);

//=====data=============

$sql36="SELECT * FROM datainfo1 WHERE clientid='$clientid' and confirm_by = '$username'  ";
$result36=mysqli_query($conn,$sql36);
// Mysql_num_row is counting table row
$count36=mysqli_num_rows($result36);

//---Expense==========

$sql37="SELECT * FROM purchase1 WHERE clientid='$clientid' and confirmby = '$username'  ";
$result37=mysqli_query($conn,$sql37);
// Mysql_num_row is counting table row
$count37=mysqli_num_rows($result37);


//=======================
$all_trad_trans = ($count31 + $count32 + $count33 + $count34 + $count35 + $count36 + $count37);
$all_trad_trans_perc = round(($yearly_trad_trans * 100)/100);
//==================================
?>