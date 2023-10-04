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

include('rheader.php');


?>
<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

	<script>
	$(document).ready(function(){
		$('#inventory_order_date').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
	</script>
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
										<th>Applicant ID</th>
										<th>Name</th>
										<th>Post Applied for</th>
                                        <th>Interview Date</th>
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
						<h4 class="modal-title"><i class="fa fa-plus"></i> Recruitment</h4>
        			</div>
        			<div class="modal-body">
        				<div class="form-group">
							<label>Applicant Name</label>
							<input type="text" name="applicantname" id="applicantname" class="form-control" required />
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
							<label>Age</label>
							<input type="text" name="age" id="age" class="form-control" required />
						</div>
                        <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option selected>MALE</option>
                                     <option>FEMALE</option>
                       
                                </select>
                            </div>
                        <div class="form-group">
							<label>Address</label>
							<input type="text" name="address" id="address" class="form-control" required />
						</div>
                        <div class="form-group">
                                <label>Nationality</label>
                                <select name="nationality" id="nationality" class="form-control" required>
                                    <option selected>NIGERIA</option>
                        <option>OTHERS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <select name="state" id="state" class="form-control" required>
                                     <option selected>ABIA</option>
                            <option>ADAMAWA</option>
                            <option>AKWAIBOM</option>
                            <option>ANAMBRA</option>
                            <option>BAUCHI</option>
                            <option>BAYELSA</option>
                            <option>BENUE</option>
                            <option>BORNO</option>
                            <option>CROSSRIVER</option>
                            <option>DELTA</option>
                            <option>EBONYI</option>
                            <option>EDO</option>
                            <option>EKITI</option>
                            <option>ENUGU</option>
                            <option>GOMBE</option>
                            <option>IMO</option>
                            <option>JIGAWA</option>
                            <option>KADUNA </option>
                            <option>KANO</option>
                            <option>KASTINA </option>
                            <option>KEBBI</option>
                            <option>KOGI</option>
                            <option>KWARA</option>
                            <option>LAGOS</option>
                            <option>NASSARAWA</option>
                            <option>NIGER</option>
                            <option>OGUN</option>
                            <option>ONDO</option>
                            <option>OSUN</option>
                            <option>OYO</option>
                            <option>PLATEAU</option>
                            <option>RIVERS</option>
                            <option>SOKOTO</option>
                            <option>TARABA</option>
                            <option>YOBE</option>
                            <option>ZAMFARA</option>
                            <option>ABUJA</option>
                                </select>
                            </div>
                            
                        <div class="form-group">
							<label>Qualification</label>
							<input type="text" name="qualification" id="qualification" class="form-control" required />
						</div>
                        <div class="form-group">
							<label>Post Applied For</label>
							<input type="text" name="postapplied" id="postapplied" class="form-control" required />
						</div>
                       <div class="form-group">
                                <label>Department</label>
                                <select name="dept" id="dept" class="form-control" required>
                                    <option value="">Select Department</option>
                                    <?php echo fill_dept_list($connect);?>
                                </select>
                            </div>
                        <div class="form-group">
                                <label>HOD</label>
                                <select name="hod" id="hod" class="form-control">
                                   
                                </select>
                            </div>
                     
								
								<div class="form-group">
									<label>Interview Date</label>
									<input type="text" name="inventory_order_date" id="inventory_order_date" class="form-control" required />
								</div>
							
							
						
        			<div class="modal-footer">
        				<input type="hidden" name="rid" id="rid" />
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
                </div>
                
        		</form>
					
        	</div>
        </div>
<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Recruitment");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	var userdataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"r_fetch.php",
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
$('#dept').change(function(){
        var dept = $('#dept').val();
        var btn_action = 'load_hod';
        $.ajax({
            url:"r_action.php",
            method:"POST",
            data:{dept:dept, btn_action:btn_action},
            success:function(data)
            {
                $('#hod').html(data);
            }
        });
    });
	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"r_action.php",
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
			url:"r_action.php",
			method:"POST",
			data:{rid:rid, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#applicantname').val(data.applicantname);
				$('#address').val(data.address);
				$('#age').val(data.age);
				$('#qualification').val(data.qualification);
				$('#postapplied').val(data.postapplied);
				$('#dept').val(data.dept);
				$('#hod').val(data.hod);
				$('#inventory_order_date').val(data.inventory_order_date);
				$('#mobileno').val(data.mobileno);
				$('#emailaddy').val(data.emailaddy);
				$('#nationality').val(data.nationality);
				$('#state').val(data.state);
				$('#gender').val(data.gender);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Recruitment");
				$('#rid').val(rid);
				$('#action').val('Update');
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
				url:"r_action.php",
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
