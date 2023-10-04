<?php
include('database_connection.php');
include('function.php');
$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$clientstatus = $_SESSION['clientstatus'];
$clientplan = $_SESSION['clientplan'];
$clienttype = $_SESSION['clienttype'];
$clientsize = $_SESSION['clientsize'];

if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

} 

?>
<link rel="icon" type="image/png" href="images/favicon.png">
<?php
//user.php


//if($_SESSION["type"] != 'master')
//{
//	header("location:index.php");
//}

include('cheader.php');


?>
		<span id="alert_action"></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title"></h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            	<button type="button" name="add" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-xs">Add</button>
                        	</div>
                        </div>
                       
                        <div class="clear:both"></div>
                   	</div>
                   	<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="user_data" class="table table-bordered table-striped">
                   				<thead>
									<tr>
										<th>Name</th>
										<th>Email Address</th>
                                        <th>Mobile No</th>
                                        <th>Status</th>
										<th>Edit</th>
                                        <th></th>
										<th></th>
                                        
									</tr>
								</thead>
                   			</table>
                   		</div>
                   	</div>
               	</div>
           	</div>
        </div>
        <div id="userModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="user_form">
        			<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Customer Setup</h4>
        			</div>
        			<div class="modal-body">
        				<div class="form-group">
							<label>Customer Name</label>
							<input type="text" name="customername" id="customername" class="form-control" required />
						</div>
                        
                        <div class="form-group">
							<label>Mobile No</label>
							<input type="text" name="mobileno" id="mobileno" class="form-control" required />
						</div>
                        <div class="form-group">
							<label>Email Address</label>
							<input type="email" name="emailaddy" id="emailaddy" class="form-control" required />
						</div>
                        <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option selected>Male</option>
                                     <option>Female</option>
                                </select>
                            </div>
                          <div class="form-group">
                                <label>Birth Month</label>
                                <select name="birthmonth" id="birthmonth" class="form-control" required>
                                    <option selected>January</option>
                                     <option>February</option>
                                     <option>March</option>
                                     <option>April</option>
                                     <option>May</option>
                                     <option>June</option>
                                     <option>July</option>
                                     <option>August</option>
                                     <option>September</option>
                                     <option>October</option>
                                     <option>November</option>
                                     <option>December</option>
                       
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Birth Day</label>
                                <select name="birthday" id="birthday" class="form-control" required>
                                    <option selected>1</option>
                                     <option>2</option>
                                     <option>3</option>
                                     <option>4</option>
                                     <option>5</option>
                                     <option>6</option>
                                     <option>7</option>
                                     <option>8</option>
                                     <option>9</option>
                                     <option>10</option>
                                     <option>11</option>
                                     <option>12</option>
                                      <option>13</option>
                                     <option>14</option>
                                     <option>15</option>
                                     <option>16</option>
                                     <option>17</option>
                                     <option>18</option>
                                     <option>19</option>
                                     <option>20</option>
                                     <option>21</option>
                                     <option>22</option>
                                     <option>23</option>
                                     <option>24</option>
                                     <option>25</option>
                                     <option>26</option>
                                     <option>27</option>
                                     <option>28</option>
                                       <option>29</option>
                                     <option>30</option>
                                     <option>31</option>
                                                           
                                </select>
                            </div>
                     
						</div>
        			<div class="modal-footer">
        				<input type="hidden" name="rid" id="rid" />
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
        		</form>

					
        	</div>
        </div>
<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Customer Setup");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	var userdataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"c_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"target":[5,6],
				"orderable":false
			}
		],
		"pageLength": 25
	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"c_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#user_form')[0].reset();
				$('#userModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				userdataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var rid = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"c_action.php",
			method:"POST",
			data:{rid:rid, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#customername').val(data.customername);
				$('#emailaddy').val(data.emailaddy);
				$('#mobileno').val(data.mobileno);
				$('#birthmonth').val(data.birthmonth);
				$('#birthday').val(data.birthday);
				$('#gender').val(data.gender);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Customer Details");
				$('#rid').val(rid);
				$('#action').val('Edit');
				$('#btn_action').val('Edit');
				
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var rid = $(this).attr("id");
		var status = $(this).data('status');
		var btn_action = "delete";
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"c_action.php",
				method:"POST",
				data:{rid:rid, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					userdataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
	});

});
</script>

<?php
include('footer.php');
?>
