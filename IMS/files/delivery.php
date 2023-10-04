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

include('deliveryheader.php');


?>
        <span id='alert_action'></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Delivery List</h3>
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
                                <th>Customer Name</th>
                                <th>Item</th>
                                 <th>Agent Name</th>
                                <th>Pickup Location</th>
                                <th>Delivery Location</th>
                                    <th>Price </th>
                                     <th>Payment Mode </th>    
                                     <th>Date </th> 
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
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Delivery</h4>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                             <label>Customer Name</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" required />
                            </div>                                                                        
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                            
                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" name="item_name" id="item_name" class="form-control" required />
                            </div>  
                             <div class="form-group">
                                <label>Agent Name</label>
                                <input type="text" name="agent_name" id="agent_name" class="form-control" required />
                            </div>                      
                              <div class="form-group">
                                <label>Pick-Up Location</label>
                                <input type="text" name="pickup_location" id="pickup_location" class="form-control" required />
                            </div>  
                            <div class="form-group">
                                <label>Delivery Location</label>
                                <input type="text" name="delivery_location" id="delivery_location" class="form-control" required />
                            </div>                                                                       
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" id="price" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                            <div class="form-group">
                                <label>Mode of Payment</label>
                                <select name="payment_mode" id="payment_mode" class="form-control" required>
                                    <option value="Cash">Cash</option>
                                   <option value="E-Transfer">E-Transfer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Payment Status</label>
                                <select name="payment_status" id="payment_status" class="form-control" required>
                                    <option value="Paid">Paid</option>
                                   <option value="Not Paid">Not Paid</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pick-Up Time</label>
                                <input type="text" name="pickup_time" id="pickup_time" class="form-control" required />
                            </div>  
                            <div class="form-group">
                                <label>Delivery Time</label>
                                <input type="text" name="delivery_time" id="delivery_time" class="form-control" required />
                            </div>  
                                <div class="form-group">
                                <label>Remark</label>
                                <textarea name="remark" id="remark" class="form-control" rows="3" required></textarea>
                            </div> 
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control" required>
                                   <option value="Delivered" >Delivered</option>
                                   <option value="Not delivered" selected="selected">Not delivered</option>
                                </select>
                            </div>             
                             <div class="form-group">
                                <label>Referal Code</label>
                                <?php
require "dbconfig1.php";// Database connection
//////////////////////////////
echo "<select name= 'refcode' class='form-control' required>";
echo '<option value="">'.'--- Select Referal Code ---'.'</option>';
//$query=mysqli_query($con,"SELECT id,FirstName FROM persons");
$query = mysqli_query($conn,"SELECT refcode FROM referal_code WHERE clientid = '$clientid' order by refcode asc");
$query_display = mysqli_query($conn,"SELECT * FROM referal_code");
while($row=mysqli_fetch_array($query))
{
    echo "<option value='". $row['refcode']."'>".$row['refcode']
 .'</option>';
}
echo '</select>';
?>
                                
                            </div>
                        </div>
                        
                            
                        <div class="modal-footer">
                            <input type="hidden" name="product_id" id="product_id" />
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
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Delivery Details</h4>
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
            url:"delivery_fetch.php",
            type:"POST"
        },
        "columnDefs":[
            {
                "targets":[8,9],
                "orderable":false,
            },
        ],
        "pageLength": 25
    });

    $('#add_button').click(function(){
        $('#productModal').modal('show');
        $('#product_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Delivery");
        $('#action').val("Add");
        $('#btn_action').val("Add");
    });

   

    $(document).on('submit', '#product_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url:"delivery_action.php",
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
        var product_id = $(this).attr("id");
        var btn_action = 'product_details';
        $.ajax({
            url:"delivery_action.php",
            method:"POST",
            data:{product_id:product_id, btn_action:btn_action},
            success:function(data){
                $('#productdetailsModal').modal('show');
                $('#product_details').html(data);
            }
        })
    });

    $(document).on('click', '.update', function(){
        var product_id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
            url:"delivery_action.php",
            method:"POST",
            data:{product_id:product_id, btn_action:btn_action},
            dataType:"json",
            success:function(data){
               $('#productModal').modal('show');
				 $('#customer_name').val(data.customer_name);
                $('#item_name').val(data.item_name);
                $('#pickup_location').val(data.pickup_location);
                $('#delivery_location').val(data.delivery_location);
                $('#price').val(data.price);
                $('#pickup_time').val(data.pickup_time);
                $('#delivery_time').val(data.delivery_time);
				$('#payment_mode').val(data.payment_mode);
				$('#payment_status').val(data.payment_status);
				$('#date1').val(data.date1);
				$('#agent_name').val(data.agent_name);
				$('#remark').val(data.remark);
				$('#confirm_by').val(data.confirm_by);
				$('#mobile_no').val(data.mobile_no);
				$('#refcode').val(data.refcode);
				$('#status').val(data.status);
                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Delivery info");
                $('#product_id').val(product_id);
                $('#action').val("Edit");
                $('#btn_action').val("Edit");
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var product_id = $(this).attr("id");
        var status = $(this).data("status");
        var btn_action = 'delete';
        if(confirm("Are you sure you want to change status?"))
        {
            $.ajax({
                url:"delivery_action.php",
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
