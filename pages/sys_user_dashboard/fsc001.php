<br>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard">Home</a></li>
  <li>Dashboard</li>
  <li>FSC</li>
  <li><a href="dashboard.php?page=fsc001">Mix Paper Cups</a></li>
  <li>Job Ticket Details</li>
</ol>

<h1>Mix Paper Cups | Job Ticket Details</h1>

<button type="button" class="btn btn-success create-new">Add New Data</button><br><br>
<table class="table table-bordered responsive nowrap" id="example" width="100%">
	<thead> 
		<tr>
			<th width="3%">No</th>
			<th width="30%">Sch.No.</th>
			<th width="15%">Item Description</th>
			<th width="6%">Weight(g/pcs)</th>
			<th width="6%">Total Quantity(pcs)</th>			
			<th width="6%">Total Quantity(kg)</th>		
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
			<th width="30%">Sch.No.</th>
			<th width="15%">Item Description</th>
			<th width="6%">Weight(g/pcs)</th>
			<th width="6%">Total Quantity(pcs)</th>			
			<th width="6%">Total Quantity(kg)</th>		
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
								<label for="">Category</label>                                
                                <select name="" id="input" class="form-control" required="required">
                                    <option value="">Select Category</option>
                                </select>                                
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Schedule Number</label>
								<input type="text" class="form-control" placeholder="Schedule Number" name="fsc001_number" id="fsc001_number" />
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Description</label>								
                                <textarea name="fsc001_desc" id="fsc001_desc" class="form-control" rows="3" placeholder="Description" ></textarea>                                
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Weight(kg)</label>
								<input type="text" class="form-control" placeholder="Weight(kg)" name="fsc001_weight" id="fsc001_weight" />
								<span id="check-e" class="check-e-schednumber"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Weight(qty/pcs)</label>
								<input type="text" class="form-control" placeholder="Weight(qty/pcs)" name="fsc001_qtypcs" id="fsc001_qtypcs" />
							</div>
						</div>
						
						<!--ID-->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
							<div class="form-group">
								<label for="">ID</label>
								<input type="text" class="form-control" placeholder="ID" name="fsc001_id" id="fsc001_id" value="" />
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
            url: "pages_exe/sys_user_dashboard/fsc001_exe_dt.php",
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

        //empty form
        $("#fsc001_number").val('');
        $("#fsc001_desc").val('');
        $("#fsc001_weight").val('');
        $("#fsc001_qtypcs").val('');
        $("#fsc001_id").val('');

        // /theform.resetForm();

        $("#modal-id").modal("show");
    });

    //Adding Validation
    $("#section-form").validate({
        rules: {
            fsc001_number: {
                required: true
            },
            fsc001_desc: {
                required: true
            },
            fsc001_weight: {
                required: false,
                number: true

            },
            fsc001_qtypcs: {
                required: true,
                number: true
            }
        },
        messages: {
            fsc001_number: {
                required: "Please enter your employee id"
            },
            fsc001_desc: {
                required: "Please enter your full name"
            },
            fsc001_qtypcs: {
                required: "Please enter your department"
            },
        },
        submitHandler: submitForm
    });

    function submitForm() {

		//get the value of input box		
		var fsc001_number =$('#fsc001_number').val();
		var fsc001_desc =$('#fsc001_desc').val();
		var fsc001_weight =$('#fsc001_weight').val();
		var fsc001_qtypcs =$('#fsc001_qtypcs').val();

        //if fsc001_weight is empty
        if (fsc001_weight == '') {
            fsc001_weight = 0;
            fsc001_totalkg = 0;
        } else {
            fsc001_weight = fsc001_weight;
            fsc001_totalkg = (fsc001_weight/1000)*fsc001_qtypcs;
        }

			
		var data = $("#section-form").serialize() + '&fsc001_totalkg=' + fsc001_totalkg;
		console.log(data);

		$.ajax({
            type: 'POST',
            url: 'pages_exe/sys_user_dashboard/fsc001_exe_crud.php ',
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
            url: 'pages_exe/sys_user_dashboard/fsc001_exe_crud.php',
            data: {
                read_selected: action,
                crud_id: id
            },
            success: function(data, status) {
                //console.log(data);
                var cruddata = JSON.parse(data);
                //add the values from the database into the textboxes
                $("#fsc001_number").val(cruddata.fsc001_number);
                $("#fsc001_desc").val(cruddata.fsc001_desc);
                $("#fsc001_weight").val(cruddata.fsc001_weight);
                $("#fsc001_qtypcs").val(cruddata.fsc001_qtypcs);
                $("#fsc001_id").val(cruddata.fsc001_id);

                $("#section_btn").attr('name', 'update_btn');
                $("#section_btn").attr('data-id', cruddata.machid);
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
                url: 'pages_exe/sys_user_dashboard/fsc001_exe_crud.php',
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
