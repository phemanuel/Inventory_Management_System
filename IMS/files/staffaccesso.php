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


include('staffaccessoheader.php');


?>
		<span id="alert_action"></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Staff Access List</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            	
                        	</div>
                        </div>
                       
                        <div class="clear:both"></div>
                   	</div>
                   	<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="user_data" class="table table-bordered table-striped">
                   				<thead>
									<tr>
										
										<th>Full Name</th>
										<th>User ID</th>
										<th>Status</th>
										<th>Edit</th>
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
						<h4 class="modal-title"><i class="fa fa-plus"></i> Staff Access</h4>
        			</div>
        			<div class="modal-body">
        				
                            <div class="form-group">
                                <label>User Level</label>
                                <select name="user_type" id="user_type" class="form-control" required>
                                   
    <option selected>master</option>
    <option>user</option> 
                                </select>
                            </div>
						<div class="form-group">
							<label>User ID</label>
							<input type="text" name="user_email" id="user_email" class="form-control" required />
						</div>
						<div class="form-group">
							<label>User Password</label>
							<input type="password" name="user_password" id="user_password" class="form-control" required />
						</div>
                        <div class="form-group">
							<label>== Grant Access ==</label><br/>
							
						</div>
                         <div class="form-group">
                                <label>Admin Management</label>
                                <select name="checkbox1" id="checkbox1" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Account Management</label>
                                <select name="checkbox2" id="checkbox2" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Product Management</label>
                                <select name="checkbox3" id="checkbox3" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Purchase</label>
                                <select name="checkbox4" id="checkbox4" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Sales</label>
                                <select name="checkbox8" id="checkbox8" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Customer Management</label>
                                <select name="checkbox5" id="checkbox5" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>HR Management</label>
                                <select name="checkbox6" id="checkbox6" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Report Management</label>
                                <select name="checkbox7" id="checkbox7" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                             
                              <div class="form-group">
                                <label>Discount</label>
                                <select name="checkbox12" id="checkbox12" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rebate</label>
                                <select name="checkbox13" id="checkbox13" class="form-control" required>
                                   
    <option selected>Enable</option>
    <option>Disable</option> 
                                </select>
                            </div>
        			</div>
        			<div class="modal-footer">
        				<input type="hidden" name="user_id" id="user_id" />
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
		$('.modal-title').html("<i class='fa fa-plus'></i> Staff Access");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	var userdataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"staffaccesso_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"target":[3,4],
				"orderable":false
			}
		],
		"pageLength": 25
	});
$('#applicantname').change(function(){
        var applicantname = $('#applicantname').val();
        var btn_action = 'load_dept1';
        $.ajax({
            url:"staffaccesso_action.php",
            method:"POST",
            data:{applicantname:applicantname, btn_action:btn_action},
            success:function(data)
            {
                $('#dept').html(data);
            }
        });
    });
	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"staffaccesso_action.php",
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
		var user_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"staffaccesso_action.php",
			method:"POST",
			data:{user_id:user_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#user_type').val(data.user_type);
				$('#user_email').val(data.user_email);
				$('#user_password').val(data.user_password);
				$('#checkbox1').val(data.checkbox1);
				$('#checkbox2').val(data.checkbox2);
				$('#checkbox3').val(data.checkbox3);
				$('#checkbox4').val(data.checkbox4);
				$('#checkbox5').val(data.checkbox5);
				$('#checkbox6').val(data.checkbox6);
				$('#checkbox7').val(data.checkbox7);
				$('#checkbox8').val(data.checkbox8);              
                $('#checkbox12').val(data.checkbox12);
                $('#checkbox13').val(data.checkbox13);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Staff Access");
				$('#user_id').val(user_id);
				$('#action').val('Update');
				$('#btn_action').val('Edit');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		var status = $(this).data('status');
		var btn_action = "delete";
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"staffaccesso_action.php",
				method:"POST",
				data:{user_id:user_id, status:status, btn_action:btn_action},
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
