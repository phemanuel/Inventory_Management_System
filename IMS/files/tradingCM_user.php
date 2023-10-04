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
$tradeid = $_SESSION['tradeid'];
if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

} 

if ($clientid=="ISPIMS") {
    
    $vkeep = "Rate" ;
    $vkeep1 = "RMB Value";
}
else if ($clientid=="COINMARTIMS") {
    $vkeep = "RMB Value" ;
    $vkeep1 = "RMB Rate";
}
else {
     $vkeep = "Rate" ;
    $vkeep1 = "RMB Value";
}
?>
<link rel="icon" type="image/png" href="images/favicon.png">
<?php
//user.php


//if($_SESSION["type"] != 'master')
//{
//	header("location:index.php");
//}

include('tradingheader_user.php');


?>
        <span id='alert_action'></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Trading List</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align='right'>
                                 <strong><?php echo  $tradeid ;  ?> </strong>| <button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="product_data" class="table table-bordered table-striped">
                                <thead><tr>
                                <th>Card Name</th>
                                <th>Card Amount</th>
                                <th>Vendor Name</th>
                                <th>Rate</th>
                                    <th>RMB Value </th>
                                    <th>Customer Name</th>
                                     <th>Customer Rate </th> 
                                     <th>Amount Sold </th>
                                     <th>Date</th>
                                    <th>Status</th>
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
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Trading</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Card Name</label>
                                <input type="text" name="card_name" id="card_name" class="form-control" required />
                            </div>
                             <div class="form-group">
                                <label>Card Amount</label>
                                <input type="text" name="card_amount" id="card_amount" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div> 
                            
                            <div class="form-group">
                                <label>Vendor Name</label>
                                <input type="text" name="vendor_name" id="vendor_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label><?php echo $vkeep ; ?></label>
                                <input type="text" name="card_rate" id="card_rate" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                            <div class="form-group">
                                <label><?php echo $vkeep1 ; ?></label>
                                <input type="text" name="rmb_value" id="rmb_value" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                                   <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" required />
                            </div>                                                                        
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                            <div class="form-group">
                                <label>Customer Rate</label>
                                <input type="text" name="customer_rate" id="customer_rate" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
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
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Trading Details</h4>
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
            url:"trading_user_fetch.php",
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
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Trading");
        $('#action').val("Add");
        $('#btn_action').val("Add");
    });

   

    $(document).on('submit', '#product_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url:"trading_actionCM.php",
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
            url:"trading_actionCM.php",
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
            url:"trading_actionCM.php",
            method:"POST",
            data:{product_id:product_id, btn_action:btn_action},
            dataType:"json",
            success:function(data){
                $('#productModal').modal('show');
				 $('#vendor_name').val(data.vendor_name);
                $('#card_rate').val(data.card_rate);
                $('#rmb_value').val(data.rmb_value);
                $('#customer_name').val(data.customer_name);
                $('#mobile_no').val(data.mobile_no);
                $('#customer_rate').val(data.customer_rate);
                $('#card_name').val(data.card_name);
				$('#card_amount').val(data.card_amount);
                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Trading info");
                $('#product_id').val(product_id);
                $('#action').val("Update");
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
                url:"trading_actionCM.php",
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
