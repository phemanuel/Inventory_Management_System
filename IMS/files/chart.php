<?php
session_start();
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];



if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

} 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS :: </title>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
	<script>
	$(document).ready(function(){
		$('#startdate').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
	</script>
    <script>
	$(document).ready(function(){
		$('#enddate').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
	</script>
    <style type="text/css">
<!--
.style12 {color: #FF0000; font-weight: bold; }
.style13 {color: #FF0000}
-->
    </style>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="delivery_report_check.php">
  <table width="100%" border="0">
    <tr>
      <td width="285">&nbsp;</td>
      <td width="433"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i>Chart</h4>
        </div>
        <div class="modal-body"></div>
        <div class="modal-body">
          <div class="form-group">
            <div style="width: 80%; margin: auto;">
        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    </div>
          </div>
          </div>         
          
            <div class="modal-body">
          <div class="form-group">
            <div style="width: 80%; margin: auto;">
    <canvas id="myLineChart" style="width:100%;max-width:700px"></canvas>
</div>
          </div>
          </div> 
        
        <div class="modal-body"></div>
        
      </div></td>
      <td width="287">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

<script>
//--colors
const backgroundColors = [
    'rgba(75, 192, 192, 0.6)', // January
    'rgba(255, 99, 132, 0.6)', // February
    'rgba(54, 162, 235, 0.6)', // March
    'rgba(255, 206, 86, 0.6)', // April
    'rgba(153, 102, 255, 0.6)', // May
    'rgba(255, 159, 64, 0.6)', // June
    'rgba(255, 99, 132, 0.6)', // July
    'rgba(75, 192, 192, 0.6)', // August
    'rgba(54, 162, 235, 0.6)', // September
    'rgba(255, 206, 86, 0.6)', // October
    'rgba(153, 102, 255, 0.6)', // November
    'rgba(255, 159, 64, 0.6)'  // December
];

        function fetchDataAndPopulateChart() {
            fetch('chart_data.php')
                .then(response => response.json())
                .then(data => {
                    // Ensure data has both 'months' and 'amounts' properties
                    if (data && data.months && data.amounts) {
                        populateChart(data);
                    } else {
                        console.error('Data format is incorrect.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        function populateChart(data) {
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.months,
                    datasets: [{
                        label: 'Sales Amount',
                        data: data.amounts,
                        backgroundColor: backgroundColors,
                    }]
                },
                options: {}
            });
        }

        // Call the fetchDataAndPopulateChart function to get data and populate the chart
        fetchDataAndPopulateChart();
		//----line chart
		
		function fetchDataAndPopulateLineChart() {
            fetch('chart_data.php')
                .then(response => response.json())
                .then(data => {
                    // Ensure data has both 'months' and 'amounts' properties
                    if (data && data.months && data.amounts) {
                        populateLineChart(data);
                    } else {
                        console.error('Data format is incorrect.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        function populateLineChart(data) {
           const lineCtx = document.getElementById('myLineChart').getContext('2d');
			const myLineChart = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: data.months,
                    datasets: [{
                        label: 'Sales Amount',
                        data: data.amounts,
                        backgroundColor: backgroundColors,
                    }]
                },
                options: {}
            });
        }

        // Call the fetchDataAndPopulateChart function to get data and populate the chart
        fetchDataAndPopulateLineChart();
    </script>
    
    