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

include('theader.php');


?>

<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

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
                                        <th>Department</th>
										<th>Post Held</th>
                                        <th>Course</th>
                                        <th>Duration</th>
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
						<h4 class="modal-title"><i class="fa fa-plus"></i> Staff Training</h4>
        			</div>
        			<div class="modal-body">
        				<div class="form-group">
                                <label>Applicant Name</label>
                                <select name="applicantname" id="applicantname" class="form-control" required>
                                    <?php 
									require "dbconfig.php";
									echo '<option value="">'.'--- Select Applicant Name ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT applicantname FROM recruitment where status = 'Active' and clientid = '$clientid' order by applicantname asc");
$query_display = mysqli_query($conn,"SELECT * FROM recruitment");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['applicantname']."'>".$row['applicantname']
 .'</option>';
}?>
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Applicant ID</label>
                                <select name="applicantno" id="applicantno" class="form-control" required>
                                    </select>
                            </div>
                       <div class="form-group">
                                <label>Department</label>
                                <select name="dept" id="dept" class="form-control" required>
                                    
                                </select>
                            </div>
                              <div class="form-group">
                                <label>Post Held</label>
                                <select name="postapplied" id="postapplied" class="form-control" required>
                                    
                                </select>
                            </div>
                         <div class="form-group">
							<label>Course</label>
							<input type="text" name="course" id="course" class="form-control" value="" required />
						</div>
                        <div class="form-group">
							<label>Duration</label>
							<input type="text" name="duration" id="duration" class="form-control" value="" required />
						</div>
                         <div class="form-group">
							<label>Start Date</label>
							<input type="text" name="startdate" id="startdate" class="form-control" value="" required />
                             
						</div>
                         <div class="form-group">
							<label>End Date</label>
							<input type="text" name="enddate" id="enddate" class="form-control" value="" required />
                            
						</div>
                         <div class="form-group">
							<label>Approved By</label>
							<input type="text" name="approvedby" id="approvedby" class="form-control" value="" required />
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
		$('.modal-title').html("<i class='fa fa-plus'></i> Staff Training");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	var userdataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"t_fetch.php",
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
	$('#applicantname').change(function(){
        var applicantname = $('#applicantname').val();
        var btn_action = 'load_applicantno';
        $.ajax({
            url:"t_action.php",
            method:"POST",
            data:{applicantname:applicantname, btn_action:btn_action},
            success:function(data)
            {
                $('#applicantno').html(data);
				
            }
        });
    });
	$('#applicantname').change(function(){
        var applicantname = $('#applicantname').val();
        var btn_action = 'load_dept1';
        $.ajax({
            url:"t_action.php",
            method:"POST",
            data:{applicantname:applicantname, btn_action:btn_action},
            success:function(data)
            {
                $('#dept').html(data);
            }
        });
    });
	$('#applicantname').change(function(){
        var applicantname = $('#applicantname').val();
        var btn_action = 'load_post1';
        $.ajax({
            url:"t_action.php",
            method:"POST",
            data:{applicantname:applicantname, btn_action:btn_action},
            success:function(data)
            {
                $('#postapplied').html(data);
            }
        });
    });
	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"t_action.php",
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
			url:"t_action.php",
			method:"POST",
			data:{rid:rid, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#course').val(data.course);
				$('#duration').val(data.duration);
				$('#startdate').val(data.startdate);
				$('#enddate').val(data.enddate);
				$('#approvedby').val(data.approvedby);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Staff Training");
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
				url:"t_action.php",
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
