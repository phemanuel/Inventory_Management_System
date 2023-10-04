<?php
 

include('database_connection.php');
include('function.php');

if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

}

$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$clientstatus = $_SESSION['clientstatus'];
$clientplan = $_SESSION['clientplan'];
$clienttype = $_SESSION['clienttype'];
$clientsize = $_SESSION['clientsize'];



?>
<link rel="icon" type="image/png" href="images/favicon.png">
<?php
//user.php


//if($_SESSION["type"] != 'master')
//{
//	header("location:index.php");
//}

include('expenseheader.php');


?>
        <span id='alert_action'></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Expense ID : <?php echo $supplyid ; ?></h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align='right'>
                                <button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="product_data" class="table table-bordered table-striped">
                                <thead><tr>
                                <th>Dept</th>
                                <th>Purchase ID</th>
                                <th>Item Name</th>
                                          <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Date</th>
                                    <th>Approved by</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="productModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Expense</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                        <label>Expense Name</label>
							<select name="expensename" id="expensename" class="form-control" required>
                                    <?php 
									require "dbconfig.php";
									echo '<option value="">'.'--- Select Expense Name ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT expensename FROM expensesetup where expensestatus = 'Active' and clientid = '$clientid' order by expensename asc");
$query_display = mysqli_query($conn,"SELECT * FROM expensesetup");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['expensename']."'>".$row['expensename']
 .'</option>';
}?><br>
                                </select><u><a href="expensesetup.php">Create <strong>Expense Name</strong> that are unavailable.</a></u><br>
                                
						</div>
                        <div class="form-group">
                        <label>Department</label>
                            <select name="dept" id="dept" class="form-control" required>
                                    <?php 
                                    require "dbconfig.php";
                                    echo '<option value="">'.'--- Select Department ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT deptname FROM deptsetup where deptstatus = 'Active' and clientid = '$clientid' order by deptname asc");
$query_display = mysqli_query($conn,"SELECT * FROM deptsetup");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['deptname']."'>".$row['deptname']
 .'</option>';
}?>
                                </select><br>
                                
                        </div>
                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" name="itemname" id="itemname" class="form-control" required />
                            </div>
                            
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                            <div class="form-group">
                                <label>Payment Mode</label>
                                <select name="paymentmode" id="paymentmode" class="form-control" required>
                                    <option selected>TRANSFER</option>
                                     <option>CHEQUE</option>
                       <option>CASH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea name="comment" id="comment" class="form-control" rows="5" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Approved By</label>
                               <input type="text" name="approvedby" id="approvedby" class="form-control" required />
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="pid" id="pid" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="productdetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Expense Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="product_details"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<script>
$(document).ready(function(){
    var productdataTable = $('#product_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"expense_fetch.php",
            type:"POST"
        },
        "columnDefs":[
            {
                "targets":[4,5],
                "orderable":false,
            },
        ],
        "pageLength": 25
    });

    $('#add_button').click(function(){
        $('#productModal').modal('show');
        $('#product_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Expense");
        $('#action').val("Add");
        $('#btn_action').val("Add");
    });

   

    $(document).on('submit', '#product_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url:"expense_action.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
                $('#product_form')[0].reset();
                $('#productModal').modal('hide');
                $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                $('#action').attr('disabled', false);
                productdataTable.ajax.reload();
            }
        })
    });

    $(document).on('click', '.view', function(){
        var pid = $(this).attr("id");
        var btn_action = 'product_details';
        $.ajax({
            url:"expense_action.php",
            method:"POST",
            data:{pid:pid, btn_action:btn_action},
            success:function(data){
                $('#productdetailsModal').modal('show');
                $('#product_details').html(data);
            }
        })
    });

    $(document).on('click', '.update', function(){
        var pid = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
            url:"expense_action.php",
            method:"POST",
            data:{pid:pid, btn_action:btn_action},
            dataType:"json",
            success:function(data){
                $('#productModal').modal('show');
				 $('#itemname').val(data.itemname);
                $('#itemsupplier').val(data.itemsupplier);
                $('#itemquantity').val(data.itemquantity);
                $('#itemunit').val(data.itemunit);
                $('#amount').val(data.amount);
                $('#paymentmode').val(data.paymentmode);
                $('#comment').val(data.comment);
				$('#approvedby').val(data.approvedby);
				$('#dept').val(data.dept);
                $('#expensename').val(data.expensename);
                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Expense");
                $('#pid').val(pid);
               $('#action').val("Update");
                $('#btn_action').val("Edit");
            }
        })
    });


    $(document).on('click', '.delete', function(){
        var pid = $(this).attr("id");
        var status = $(this).data("status");
        var btn_action = 'delete';
        if(confirm("Are you sure you want to change status?"))
        {
            $.ajax({
                url:"expense_action.php",
                method:"POST",
                data:{product_id:product_id, status:status, btn_action:btn_action},
                success:function(data){
                    $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                    productdataTable.ajax.reload();
                }
            });
        }
        else
        {
            return false;
        }
    });

});
</script>
