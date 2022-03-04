<br>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard">Home</a></li>
  <li>Dashboard</li>
  <li>FSC</li>
  <li><a href="dashboard.php?page=fsc001">Mix Paper Cups</a></li>
  <li><a href="dashboard.php?page=fsc001">Job Ticket Details (<?php echo $_GET["jt"] ?>) </a></li>
  <li>Input of Origin</li>
</ol>

<h1>Mix Paper Cups| Input of Origin (<?php echo $_GET["jt"] ?>) </h1>

<button type="button" class="btn btn-success create-new">Add New Data</button><br><br>
<table class="table table-bordered responsive nowrap" id="example" width="100%">
	<thead> 
		<tr>
			<th width="3%">No</th>
			<th width="6%">Po#</th>
			<th width="6%">Recieved Date</th>
			<th width="6%">Issued Date</th>
			<th width="6%">Roll No.</th>			
			<th width="6%">Lot No.</th>		
			<th width="6%">Quantity(m)</th>
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
			<th width="6%">Po#</th>
			<th width="6%">Recieved Date</th>
			<th width="6%">Issued Date</th>
			<th width="6%">Roll No.</th>			
			<th width="6%">Lot No.</th>		
			<th width="6%">Quantity(m)</th>
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
								<label for="">Schedule Number</label>
								<input type="text" class="form-control" placeholder="Schedule Number" name="fsc001p2_ponum" id="fsc001p2_ponum" />
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Recieved Date</label>		
                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" id="fsc001p2_recieveddate" name="fsc001p2_recieveddate" placeholder="Recieved Date" />
                                    <span class="input-group-addon" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>					
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
                        
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Issued Date</label>                                	
                                <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker5" id="fsc001p2_issueddate" name="fsc001p2_issueddate" placeholder="Issued Date" />
                                    <span class="input-group-addon" data-target="#datetimepicker5" data-toggle="datetimepicker">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>					
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Roll Num.</label>
								<input type="text" class="form-control" placeholder="Roll Num." name="fsc001p2_rollnum" id="fsc001p2_rollnum" />
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Lot Num.</label>
								<input type="text" class="form-control" placeholder="Lot Num." name="fsc001p2_lotnum" id="fsc001p2_lotnum" />
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Quantity(m)</label>
								<input type="text" class="form-control" placeholder="Quantity(m)" name="fsc001p2_qtym" id="fsc001p2_qtym" />
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Quantity(kg)</label>
								<input type="text" class="form-control" placeholder="Quantity(kg)" name="fsc001p2_qtykg" id="fsc001p2_qtykg" />
							</div>
						</div>
						
						<!--ID-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
							<div class="form-group">
								<label for="">JTID</label>
								<input type="text" class="form-control" placeholder="JTID" name="fsc001p2_jtid" id="fsc001p2_jtid" value="<?php echo $_GET["id"]; ?>" />
								<span id="check-e"></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
							<div class="form-group">
								<label for="">ID</label>
								<input type="text" class="form-control" placeholder="ID" name="fsc001p2_id" id="fsc001p2_id" value="" />
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
    $('#datetimepicker4').datetimepicker({
        format: 'L'
    });
    $('#datetimepicker5').datetimepicker({
        format: 'L',
        useCurrent: false
    });
    $("#datetimepicker4").on("change.datetimepicker", function (e) {
        $('#datetimepicker5').datetimepicker('minDate', e.date);
    });
    $("#datetimepicker5").on("change.datetimepicker", function (e) {
        $('#datetimepicker4').datetimepicker('maxDate', e.date);
    });

    var filterID = $('#fsc001p2_jtid').val();
    //add filterID to json for datatable



    //Reading
    var dataTable = $('#example').DataTable({        
        "processing": true,
        "serverSide": true,

        "ajax": {
            url: "pages_exe/sys_user_dashboard/fsc001p2_exe_dt.php",
            data: {
                filterID: filterID
            },
            type: "POST",/* 
			success: function(response) {
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

        //empty form
        $("#fsc001p2_ponum").val('');
        $("#fsc001p2_recieveddate").val('');
        $("#fsc001p2_issueddate").val('');
        $("#fsc001p2_rollnum").val('');
        $("#fsc001p2_id").val('');

        // /theform.resetForm();

        $("#modal-id").modal("show");
    });

    //Adding Validation
    $("#section-form").validate({
        rules: {
            fsc001p2_jtid: {
                required: true
            },
            fsc001p2_ponum: {
                required: true
            },
            fsc001p2_recieveddate: {
                required: true
            },
            fsc001p2_issueddate: {
                required: true
            },
            fsc001p2_rollnum: {
                required: true
            },
            fsc001p2_lotnum: {
                required: true
            },
            fsc001p2_qtym: {
                required: true,
                number: true
            },
            fsc001p2_qtykg: {
                required: true,
                number: true
            }
        },
        messages: {
            fsc001p2_ponum: {
                required: "Please enter your employee id"
            },
            fsc001p2_recieveddate: {
                required: "Please enter your full name"
            },
            fsc001p2_rollnum: {
                required: "Please enter your department"
            },
        },
        submitHandler: submitForm
    });

    function submitForm() {

		//get the value of input box		
		var fsc001p2_jtid =$('#fsc001p2_jtid').val();
		var fsc001p2_ponum =$('#fsc001p2_ponum').val();
		var fsc001p2_recieveddate =$('#fsc001p2_recieveddate').val();
		var fsc001p2_issueddate =$('#fsc001p2_issueddate').val();
		var fsc001p2_rollnum =$('#fsc001p2_rollnum').val();
		var fsc001p2_lotnum =$('#fsc001p2_lotnum').val();
		var fsc001p2_qtym =$('#fsc001p2_qtym').val();
        var fsc001p2_qtypcs = (fsc001p2_qtym/0.42545)*10;
		var fsc001p2_qtykg =$('#fsc001p2_qtykg').val();

		var data = $("#section-form").serialize() + '&fsc001p2_qtypcs=' + fsc001p2_qtypcs;
		console.log(data);

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
                $("#fsc001p2_ponum").val(cruddata.fsc001p2_ponum);
                $("#fsc001p2_recieveddate").val(cruddata.fsc001p2_recieveddate);
                $("#fsc001p2_issueddate").val(cruddata.fsc001p2_issueddate);
                $("#fsc001p2_rollnum").val(cruddata.fsc001p2_rollnum);
                $("#fsc001p2_lotnum").val(cruddata.fsc001p2_lotnum);
                $("#fsc001p2_qtym").val(cruddata.fsc001p2_qtym);
                $("#fsc001p2_qtypcs").val(cruddata.fsc001p2_qtypcs);
                $("#fsc001p2_qtykg").val(cruddata.fsc001p2_qtykg);                
		        $('#fsc001p2_jtid').val(cruddata.fsc001p2_jtid);
                $("#fsc001p2_id").val(cruddata.fsc001p2_id);

                $("#section_btn").attr('name', 'update_btn');
                $("#section_btn").attr('data-id', cruddata.fsc001p2_id);
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
