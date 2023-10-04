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


include('staffexitheader.php');


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
										<th>Applicant ID</th>
										<th>Name</th>
                                        <th>Department</th>
										<th>Post Held</th>
                                        <th>Exit Reason</th>
                                        
                                       
										
                                        
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
						<h4 class="modal-title"><i class="fa fa-plus"></i> Staff Exit</h4>
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
							<label>Reason for Exit</label>
							<input type="textarea" name="exitreason" id="exitreason" class="form-control" value="" required />
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
		$('.modal-title').html("<i class='fa fa-plus'></i> Staff Leave");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	var userdataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"staffexit_fetch.php",
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
            url:"staffexit_action.php",
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
            url:"staffexit_action.php",
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
            url:"staffexit_action.php",
            method:"POST",
            data:{applicantname:applicantname, btn_action:btn_action},
            success:function(data)
            {
                $('#postapplied').html(data);
            }
        });
    });
	$('#applicantname').change(function(){
        var applicantname = $('#applicantname').val();
        var btn_action = 'load_salary';
        $.ajax({
            url:"staffexit_action.php",
            method:"POST",
            data:{applicantname:applicantname, btn_action:btn_action},
            success:function(data)
            {
                $('#psalary').html(data);
            }
        });
    });
	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"staffexit_action.php",
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
			url:"staffexit_action.php",
			method:"POST",
			data:{rid:rid, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#exitreason').val(data.exitreason);
				$('#approvedby').val(data.approvedby);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Staff Leave");
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
				url:"staffexit_action.php",
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
