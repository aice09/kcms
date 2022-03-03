<?php
$query = "SELECT a.fsc001_number AS jt FROM fsc001_jt a INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid WHERE b.fsc001p2_id = '{$_GET['id']}'";
$result = mysqli_query($db, $query);
$jt = mysqli_query($db, $query);
$jt = '';
while($row = mysqli_fetch_array($result))
{
    $jt .= $row["jt"];
}
?>

<br>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard">Home</a></li>
  <li>Dashboard</li>
  <li>FSC</li>
  <li><a href="dashboard.php?page=fsc001">Mix Paper Cups</a></li>
  <li><a href="dashboard.php?page=fsc001">Job Ticket Details (<?php echo $jt; ?>) </a></li>
  <li>Input of Origin (<?php echo $_GET["ponum"] ?>)</li>
  <li>Output</li>
</ol>

<h1>Mix Paper Cups| Output (<?php echo $_GET["ponum"] ?>) </h1>

<button type="button" class="btn btn-success create-new">Add New Data</button><br><br>
<table class="table table-bordered responsive nowrap" id="example" width="100%">
	<thead> 
		<tr>
			<th width="3%">No</th>
			<th width="6%">Lot Code</th>
			<th width="6%">Quantity(pcs</th>			
			<th width="6%">Quantity(kg)</th>		
			<th width="6%">DTCreated</th>
			<th width="6%">CreatedBy</th>
			<th width="6%">DTUpdated</th>
			<th width="6%">UpdatedBy</th>
			<th width="6%">Status</th>
			<th></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th width="3%">No</th>
			<th width="6%">Lot Code</th>
			<th width="6%">Quantity(pcs</th>			
			<th width="6%">Quantity(kg)</th>		
			<th width="6%">DTCreated</th>
			<th width="6%">CreatedBy</th>
			<th width="6%">DTUpdated</th>
			<th width="6%">UpdatedBy</th>
			<th width="6%">Status</th>
			<th></th>
		</tr>
	</tfoot>
</table>

<div class="modal fade" id="modal-id">
  	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-section" method="POST" id="section-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Lot Code</label>
								<input type="text" class="form-control" placeholder="Lot Code" name="fsc001p3_lotcode" id="fsc001p3_lotcode" />
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Quantity(pcs)</label>
								<input type="text" class="form-control" placeholder="Quantity(pcs)" name="fsc001p3_qtypcs" id="fsc001p3_qtypcs" />
							</div>
						</div>
						
						<!--ID-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
							<div class="form-group">
								<label for="">IOOID</label>
								<input type="text" class="form-control" placeholder="IOOID" name="fsc001p3_iooid" id="fsc001p3_iooid" value="<?php echo $_GET["id"]; ?>" />
								<span id="check-e"></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
							<div class="form-group">
								<label for="">ID</label>
								<input type="text" class="form-control" placeholder="ID" name="fsc001p3_id" id="fsc001p3_id" value="" />
								<span id="check-e"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" name="section_btn" id="section_btn">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
      
<script type="text/javascript">
$(document).ready(function() {

    
    //Reading
    var dataTable = $('#example').DataTable({        
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "pages_exe/sys_user_dashboard/fsc001p2_exe_dt.php",
            type: "POST",
			/* success: function(response) {
				console.log(response);
			},
			error: function(response) {
				console.log(response);
			} */
        }
    });

    //Adding
    $('.create-new').click(function() {
        var action = $(this).attr("id");
        var theform = $("#section-form").validate();

        $(".modal-title").text('Create');
        $("#section_btn").text('Submit');
        $("#section_btn").attr('name', 'submit_btn');
        $("#section_btn").attr('data-id', '');

        // /theform.resetForm();

        $("#modal-id").modal("show");
    });

    //Adding Validation
    $("#section-form").validate({
        rules: {
            fsc001p3_iooid: {
                required: true
            },
            fsc001p3_lotcode: {
                required: true
            },
            fsc001p3_qtypcs: {
                required: true,
                number: true
            }
        },
        messages: {
            fsc001p3_lotcode: {
                required: "Please enter your employee id"
            },
            fsc001p3_lotcode: {
                required: "Please enter your full name"
            },
            fsc001p3_qtypcs: {
                required: "Please enter your department"
            },
        },
        submitHandler: submitForm
    });

    function submitForm() {

		//get the value of input box		
		var fsc001p3_iooid =$('#fsc001p3_iooid').val();
		var fsc001p3_lotcode =$('#fsc001p3_lotcode').val();
		var fsc001p3_qtypcs =$('#fsc001p3_qtypcs').val();

        
        //var fsc001p3_qtykg = (fsc001p2_qtym/0.42545)*10;

		//var data = $("#section-form").serialize() + '&fsc001p3_qtykg=' + fsc001p3_qtykg;
		//console.log(data);

		$.ajax({
            type: 'POST',
            url: 'pages_exe/sys_user_dashboard/fsc001p2_exe_crud.php ',
            data: data,
            success: function(data, status) {
                console.log(data);
                if (data != 999) {
                    $("#modal-id").modal("hide");
                    //reload server-side datatable
                    setTimeout(function() {
                        $('#example').DataTable().ajax.reload();
                    }, 1000);
                } else {
                    alert('error');
                }
            }
        });
        return false; 
    }

    //Update
    $(document).on('click', '#update', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        action = 'read_selected';

        $.ajax({
            type: 'POST',
            url: 'pages_exe/sys_user_dashboard/fsc001p2_exe_crud.php',
            data: {
                read_selected: action,
                crud_id: id
            },
            success: function(data, status) {
                //console.log(data);
                var cruddata = JSON.parse(data);
                //add the values from the database into the textboxes
                $("#fsc001p3_lotcode").val(cruddata.fsc001p3_lotcode);
                $("#fsc001p3_qtypcs").val(cruddata.fsc001p3_qtypcs);             
		        $('#fsc001p3_iooid').val(cruddata.fsc001p3_iooid);
                $("#fsc001p3_id").val(cruddata.fsc001p3_id);

                $("#section_btn").attr('name', 'update_btn');
                $("#section_btn").attr('data-id', cruddata.fsc001p3_id);
                $(".modal-title").text('Edit');
                $("#section_btn").text('Save Changes');
                $("#modal-id").modal("show");
            }
        });
    });

    //Delete
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var conf = confirm("Are you sure, do you really want to delete these?");
        if (conf == true) {
            var action = "delete";
            $.ajax({
                type: 'POST',
                url: 'pages_exe/sys_user_dashboard/fsc001p2_exe_crud.php',
                data: {
                    delete_selected: action,
                    crud_id: id,
                },
                success: function(data, status) {
                    //reload server-side datatable
                    setTimeout(function() {
                        $('#example').DataTable().ajax.reload();
                    }, 1000);
                }
            });
        }
    });
});
</script>
